<?php
declare(strict_types=1);

// Security session settings
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_samesite', 'Lax');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__) . '/db-conn.php';

// Redirect if already authenticated
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: ../index.php");
    exit();
}

$error = '';
$warning = '';
$userIp = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
$userAgent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', 0, 250);
$now = time();

// Rate limiting: Max 10 attempts per 5 minutes per IP
if (!isset($_SESSION['admin_login_rate_count']) || ($_SESSION['admin_login_rate_window'] ?? 0) < ($now - 300)) {
    $_SESSION['admin_login_rate_count'] = 0;
    $_SESSION['admin_login_rate_window'] = $now;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['admin_login_rate_count']++;

    // 1. Honeypot check
    $honeypot = trim((string)($_POST['admin_auth_hp'] ?? ''));
    if (!empty($honeypot)) {
        // Log bot attempt
        $stmtLog = $conn->prepare("INSERT INTO admin_login_logs (username_attempted, ip_address, user_agent, status) VALUES (?, ?, ?, 'blocked')");
        $stmtLog->bind_param('sss', $honeypot, $userIp, $userAgent);
        $stmtLog->execute();
        $stmtLog->close();
        // Delay and fake error
        usleep(300000);
        $error = "Authentication failed. Request was flagged by security filters.";
    }
    // 2. Rate limit check
    elseif ($_SESSION['admin_login_rate_count'] > 12) {
        $error = "Too many login attempts. For security reasons, please wait 5 minutes before trying again.";
    }
    // 3. CSRF Validation
    elseif (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['admin_auth_csrf'] ?? '', $_POST['csrf_token'])) {
        $error = "Security token mismatch or expired. Please refresh the page and try again.";
    } else {
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if (empty($username) || empty($password)) {
            $error = "Please enter both username and password.";
        } else {
            // Check account in admin_user
            $stmt = $conn->prepare("
                SELECT id, username, password, email, role, status, failed_attempts, locked_until 
                FROM admin_user 
                WHERE username = ? OR email = ?
                LIMIT 1
            ");
            $stmt->bind_param("ss", $username, $username);
            $stmt->execute();
            $res = $stmt->get_result();
            $admin = $res->fetch_assoc();
            $stmt->close();

            // Dummy hash to prevent timing attack / user enumeration
            $dummyHash = '$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOPQRSTUVWXYZ012345';

            if ($admin) {
                $adminId = (int)$admin['id'];
                $isLocked = !empty($admin['locked_until']) && strtotime($admin['locked_until']) > $now;

                if ($isLocked) {
                    $lockExpiresIn = ceil((strtotime($admin['locked_until']) - $now) / 60);
                    $error = "Account temporarily locked due to consecutive failed attempts. Try again in {$lockExpiresIn} minute(s).";

                    $stmtLog = $conn->prepare("INSERT INTO admin_login_logs (admin_id, username_attempted, ip_address, user_agent, status) VALUES (?, ?, ?, ?, 'locked_out')");
                    $stmtLog->bind_param('isss', $adminId, $username, $userIp, $userAgent);
                    $stmtLog->execute();
                    $stmtLog->close();
                } elseif ($admin['status'] !== 'active') {
                    $error = "This account is " . htmlspecialchars($admin['status']) . ". Please contact system administrator.";
                } else {
                    // Verify password
                    if (password_verify($password, $admin['password'])) {
                        // Success: Reset failed attempts & update last login
                        $upStmt = $conn->prepare("
                            UPDATE admin_user 
                            SET failed_attempts = 0, 
                                locked_until = NULL, 
                                last_login = NOW(), 
                                last_login_ip = ? 
                            WHERE id = ?
                        ");
                        $upStmt->bind_param('si', $userIp, $adminId);
                        $upStmt->execute();
                        $upStmt->close();

                        // Log success
                        $stmtLog = $conn->prepare("INSERT INTO admin_login_logs (admin_id, username_attempted, ip_address, user_agent, status) VALUES (?, ?, ?, ?, 'success')");
                        $stmtLog->bind_param('isss', $adminId, $username, $userIp, $userAgent);
                        $stmtLog->execute();
                        $stmtLog->close();

                        // Secure Session Fixation protection
                        session_regenerate_id(true);

                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_id']        = $adminId;
                        $_SESSION['admin_user']      = $admin['username'];
                        $_SESSION['admin_email']     = $admin['email'];
                        $_SESSION['admin_role']      = $admin['role'];
                        $_SESSION['admin_ip']        = $userIp;
                        $_SESSION['admin_last_act']  = time();

                        header("Location: ../index.php");
                        exit();
                    } else {
                        // Failed password
                        $newAttempts = (int)$admin['failed_attempts'] + 1;
                        $lockSql = "";

                        if ($newAttempts >= 5) {
                            // Lock for 15 minutes
                            $lockSql = ", locked_until = DATE_ADD(NOW(), INTERVAL 15 MINUTE)";
                            $error = "Account locked for 15 minutes due to 5 consecutive failed attempts.";
                        } else {
                            $remaining = 5 - $newAttempts;
                            $error = "Invalid credentials. {$remaining} attempt(s) remaining before security lockout.";
                        }

                        $upStmt = $conn->prepare("UPDATE admin_user SET failed_attempts = ? {$lockSql} WHERE id = ?");
                        $upStmt->bind_param('ii', $newAttempts, $adminId);
                        $upStmt->execute();
                        $upStmt->close();

                        // Log failed attempt
                        $stmtLog = $conn->prepare("INSERT INTO admin_login_logs (admin_id, username_attempted, ip_address, user_agent, status) VALUES (?, ?, ?, ?, 'failed')");
                        $stmtLog->bind_param('isss', $adminId, $username, $userIp, $userAgent);
                        $stmtLog->execute();
                        $stmtLog->close();
                    }
                }
            } else {
                // User not found: run dummy hash check to mitigate timing enumeration
                password_verify($password, $dummyHash);
                usleep(rand(100000, 250000));
                $error = "Invalid username or password.";

                $stmtLog = $conn->prepare("INSERT INTO admin_login_logs (username_attempted, ip_address, user_agent, status) VALUES (?, ?, ?, 'failed')");
                $stmtLog->bind_param('sss', $username, $userIp, $userAgent);
                $stmtLog->execute();
                $stmtLog->close();
            }
        }
    }
}

// Generate new CSRF token
$_SESSION['admin_auth_csrf'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal Authentication | NikhilWorks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo/preloader4.png" type="image/png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #104041;
            --brand-accent: #ADFF1C;
            --brand-cyan: #38bdf8;
            --brand-dark: #051617;
            --card-bg: rgba(12, 38, 40, 0.75);
            --border-glow: rgba(173, 255, 28, 0.25);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--brand-dark);
            background-image: 
                radial-gradient(circle at 85% 15%, rgba(173, 255, 28, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.7) 0%, transparent 50%),
                linear-gradient(135deg, #030d0e 0%, #082122 50%, #030d0e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }

        /* Subtle Animated Tech Grid Overlay */
        .grid-bg {
            position: absolute;
            inset: 0;
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            pointer-events: none;
            z-index: 0;
        }

        .auth-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 440px;
        }

        .auth-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-glow);
            border-radius: 20px;
            padding: 2.5rem 2.2rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-card:hover {
            border-color: rgba(173, 255, 28, 0.45);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.7), 0 0 25px rgba(173, 255, 28, 0.1);
        }

        .brand-logo-badge {
            width: 68px;
            height: 68px;
            border-radius: 18px;
            background: linear-gradient(135deg, #104041, #082122);
            border: 2px solid var(--brand-accent);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: var(--brand-accent);
            box-shadow: 0 0 20px rgba(173, 255, 28, 0.25);
            margin-bottom: 1.2rem;
        }

        .auth-title {
            color: #ffffff;
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: -0.5px;
            margin-bottom: 0.3rem;
        }

        .auth-subtitle {
            color: #94a3b8;
            font-size: 0.88rem;
            margin-bottom: 1.8rem;
        }

        .form-label {
            color: #cbd5e1;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(4, 18, 19, 0.6);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            transition: all 0.25s ease;
        }

        .input-group-custom:focus-within {
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(173, 255, 28, 0.15);
            background: rgba(4, 18, 19, 0.85);
        }

        .input-group-custom .input-icon {
            color: #64748b;
            padding: 0 14px;
            font-size: 1rem;
            transition: color 0.2s;
        }

        .input-group-custom:focus-within .input-icon {
            color: var(--brand-accent);
        }

        .input-custom {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            padding: 12px 14px 12px 0;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .input-custom::placeholder {
            color: #64748b;
            font-size: 0.9rem;
        }

        .password-toggle-btn {
            background: transparent;
            border: none;
            color: #64748b;
            padding: 0 14px;
            cursor: pointer;
            transition: color 0.2s;
            outline: none;
        }

        .password-toggle-btn:hover {
            color: #cbd5e1;
        }

        /* Caps Lock Warning Alert */
        #capsLockAlert {
            display: none;
            font-size: 0.78rem;
            color: #f59e0b;
            margin-top: 5px;
        }

        .btn-auth-submit {
            background: linear-gradient(135deg, #ADFF1C 0%, #8ae600 100%);
            color: #051617;
            border: none;
            border-radius: 12px;
            padding: 13px;
            font-size: 0.98rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            width: 100%;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(173, 255, 28, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 1.4rem;
        }

        .btn-auth-submit:hover {
            background: linear-gradient(135deg, #baff33 0%, #9bf000 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(173, 255, 28, 0.45);
        }

        .btn-auth-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .auth-alert-box {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            color: #fca5a5;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            line-height: 1.4;
            margin-bottom: 1.4rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            animation: shake 0.4s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-6px); }
            40%, 80% { transform: translateX(6px); }
        }

        .security-badge-footer {
            margin-top: 2rem;
            padding-top: 1.2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            font-size: 0.76rem;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .security-badge-footer i {
            color: var(--brand-accent);
        }
    </style>
</head>
<body>
    <div class="grid-bg"></div>

    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="text-center">
                <div class="brand-logo-badge">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h1 class="auth-title">NikhilWorks Admin</h1>
                <p class="auth-subtitle">Secure Gateway &bull; Administrative Dashboard</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="auth-alert-box" role="alert">
                    <i class="fa-solid fa-triangle-exclamation mt-1 flex-shrink-0"></i>
                    <div><?= htmlspecialchars($error) ?></div>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" id="loginAuthForm">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['admin_auth_csrf']) ?>">
                
                <!-- Invisible Bot Honeypot Trap -->
                <input type="text" name="admin_auth_hp" style="position:absolute;left:-9999px;opacity:0;" tabindex="-1" autocomplete="off">

                <!-- Username / Email Field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username or Email</label>
                    <div class="input-group-custom">
                        <span class="input-icon"><i class="fa-solid fa-user-shield"></i></span>
                        <input type="text" class="input-custom" id="username" name="username" placeholder="Enter admin username" required autofocus autocomplete="username">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="input-group-custom">
                        <span class="input-icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password" class="input-custom" id="password" name="password" placeholder="••••••••••••" required autocomplete="current-password">
                        <button type="button" class="password-toggle-btn" id="togglePasswordBtn" title="Toggle visibility" aria-label="Toggle password visibility">
                            <i class="fa-regular fa-eye" id="pwdEyeIcon"></i>
                        </button>
                    </div>
                    <div id="capsLockAlert">
                        <i class="fa-solid fa-arrow-up-a-z me-1"></i> Warning: Caps Lock is ON
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-auth-submit" id="authSubmitBtn">
                    <span>Sign In to Dashboard</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="security-badge-footer">
                <i class="fa-solid fa-lock"></i>
                <span>256-Bit SSL Encrypted &bull; Brute-Force Protected</span>
            </div>
        </div>
    </div>

    <script>
        // Password Visibility Toggle
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const pwdInput = document.getElementById('password');
        const eyeIcon = document.getElementById('pwdEyeIcon');

        toggleBtn.addEventListener('click', function() {
            const isPassword = pwdInput.type === 'password';
            pwdInput.type = isPassword ? 'text' : 'password';
            eyeIcon.classList.toggle('fa-eye', !isPassword);
            eyeIcon.classList.toggle('fa-eye-slash', isPassword);
        });

        // Caps Lock Detection
        const capsAlert = document.getElementById('capsLockAlert');
        pwdInput.addEventListener('keyup', function(e) {
            if (e.getModifierState && e.getModifierState('CapsLock')) {
                capsAlert.style.display = 'block';
            } else {
                capsAlert.style.display = 'none';
            }
        });

        // Form Submit Spinner Prevention
        const loginForm = document.getElementById('loginAuthForm');
        const submitBtn = document.getElementById('authSubmitBtn');

        loginForm.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Authenticating...';
        });
    </script>
</body>
</html>