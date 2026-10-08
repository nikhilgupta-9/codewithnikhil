<?php
header('Content-Type: application/json');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(dirname(__DIR__)) . '/config/connect.php';

$action = $_REQUEST['action'] ?? 'status';

// Helper to get or create guest session ID
function getGuestSessionId() {
    if (!isset($_SESSION['tool_guest_id'])) {
        $_SESSION['tool_guest_id'] = 'guest_' . bin2hex(random_bytes(16));
    }
    return $_SESSION['tool_guest_id'];
}

$guest_id = getGuestSessionId();

switch ($action) {
    case 'status':
        if (isset($_SESSION['tool_user']) && !empty($_SESSION['tool_user']['id'])) {
            echo json_encode([
                'status' => 'success',
                'logged_in' => true,
                'user' => $_SESSION['tool_user']
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'logged_in' => false,
                'guest_id' => $guest_id
            ]);
        }
        break;

    case 'login':
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'Email and password are required.']);
            exit;
        }

        $stmt = $conn->prepare("SELECT id, name, last_name, email, password, mobile, profile_pic FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();

        if ($user) {
            $valid = false;
            // Check password hash, fallback to md5/plaintext for legacy compatibility if needed
            if (password_verify($password, $user['password'])) {
                $valid = true;
            } elseif ($user['password'] === md5($password) || $user['password'] === $password) {
                $valid = true;
                // Upgrade to modern bcrypt hash
                $new_hash = password_hash($password, PASSWORD_DEFAULT);
                $u_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $u_stmt->bind_param("si", $new_hash, $user['id']);
                $u_stmt->execute();
                $u_stmt->close();
            }

            if ($valid) {
                $_SESSION['tool_user'] = [
                    'id' => (int)$user['id'],
                    'name' => trim(($user['name'] ?? '') . ' ' . ($user['last_name'] ?? '')) ?: 'Pro User',
                    'email' => $user['email'],
                    'mobile' => $user['mobile'] ?? '',
                    'profile_pic' => $user['profile_pic'] ?? ''
                ];

                // Sync any guest history created in this session to the logged-in user!
                $u_id = (int)$user['id'];
                $sync_stmt = $conn->prepare("UPDATE tool_user_history SET user_id = ? WHERE guest_session_id = ? AND (user_id IS NULL OR user_id = 0)");
                $sync_stmt->bind_param("is", $u_id, $guest_id);
                $sync_stmt->execute();
                $sync_stmt->close();

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Welcome back, ' . $_SESSION['tool_user']['name'] . '!',
                    'user' => $_SESSION['tool_user']
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No account found with this email.']);
        }
        break;

    case 'register':
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $mobile = trim($_POST['mobile'] ?? '');

        if (empty($name) || empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'Name, email, and password are required.']);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
            exit;
        }

        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $exists = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($exists) {
            echo json_encode(['status' => 'error', 'message' => 'An account already exists with this email. Please log in.']);
            exit;
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $name, $email, $password_hash, $mobile);
        
        if ($stmt->execute()) {
            $new_user_id = $conn->insert_id;
            $stmt->close();

            $_SESSION['tool_user'] = [
                'id' => (int)$new_user_id,
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'profile_pic' => ''
            ];

            // Sync guest history
            $sync_stmt = $conn->prepare("UPDATE tool_user_history SET user_id = ? WHERE guest_session_id = ? AND (user_id IS NULL OR user_id = 0)");
            $sync_stmt->bind_param("is", $new_user_id, $guest_id);
            $sync_stmt->execute();
            $sync_stmt->close();

            echo json_encode([
                'status' => 'success',
                'message' => 'Account created successfully! Welcome to Tools Studio.',
                'user' => $_SESSION['tool_user']
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to create account: ' . $conn->error]);
        }
        break;

    case 'logout':
        unset($_SESSION['tool_user']);
        echo json_encode(['status' => 'success', 'message' => 'Logged out successfully.']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
