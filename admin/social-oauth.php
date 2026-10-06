<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: auth/login.php");
    exit();
}

require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Database.php';
require_once dirname(__DIR__) . '/lib/Logger.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;

Env::load(dirname(__DIR__) . '/.env');
date_default_timezone_set((string)Env::get('TIMEZONE', 'Asia/Kolkata'));

$pdo = Database::getConnection();
$logger = new Logger();

$message = '';
$messageType = 'info';

// CSRF token
if (empty($_SESSION['social_csrf_token'])) {
    $_SESSION['social_csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['social_csrf_token'];

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'nikhilworks.com';
$currentRedirectUri = $protocol . '://' . $host . '/admin/social-oauth.php?action=linkedin_callback';

// Handle LinkedIn OAuth 2.0 Authorization Callback
if (isset($_GET['action']) && $_GET['action'] === 'linkedin_callback') {
    $code = $_GET['code'] ?? '';
    $state = $_GET['state'] ?? '';
    $sessionState = $_SESSION['linkedin_oauth_state'] ?? '';

    if (empty($code) || empty($state) || !hash_equals($sessionState, $state)) {
        $message = "Invalid or expired OAuth state parameter. Please try authenticating again.";
        $messageType = "danger";
    } else {
        $clientId = (string)Env::get('LINKEDIN_CLIENT_ID', '');
        $clientSecret = (string)Env::get('LINKEDIN_CLIENT_SECRET', '');

        $ch = curl_init('https://www.linkedin.com/oauth/v2/accessToken');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'grant_type'    => 'authorization_code',
                'code'          => $code,
                'redirect_uri'  => $currentRedirectUri,
                'client_id'     => $clientId,
                'client_secret' => $clientSecret,
            ]),
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_TIMEOUT => 20,
            CURLOPT_SSL_VERIFYPEER => true
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr = curl_error($ch);
        curl_close($ch);

        if ($curlErr || $httpCode !== 200) {
            $message = "Failed to exchange authorization code with LinkedIn. HTTP {$httpCode}: {$response}";
            $messageType = "danger";
            $logger->error("LinkedIn OAuth exchange failed: " . $response);
        } else {
            $tokenData = json_decode($response, true);
            $accessToken = $tokenData['access_token'] ?? '';
            $expiresIn = (int)($tokenData['expires_in'] ?? 5184000); // 60 days
            $expiresAt = date('Y-m-d H:i:s', time() + $expiresIn);

            // Fetch member URN via /v2/userinfo
            $urn = '';
            $uCh = curl_init('https://api.linkedin.com/v2/userinfo');
            curl_setopt_array($uCh, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $accessToken
                ],
                CURLOPT_TIMEOUT => 15,
                CURLOPT_SSL_VERIFYPEER => true
            ]);
            $uResp = curl_exec($uCh);
            curl_close($uCh);
            $uData = json_decode((string)$uResp, true);
            if (!empty($uData['sub'])) {
                $urn = 'urn:li:person:' . $uData['sub'];
            }

            // Store in social_tokens table
            $stmt = $pdo->prepare("
                INSERT INTO social_tokens (platform, access_token, token_type, expires_at, author_urn, updated_at)
                VALUES ('linkedin', :token, 'Bearer', :expires_at, :urn, NOW())
                ON DUPLICATE KEY UPDATE 
                    access_token = VALUES(access_token),
                    expires_at = VALUES(expires_at),
                    author_urn = COALESCE(VALUES(author_urn), author_urn),
                    updated_at = NOW()
            ");
            $stmt->execute([
                ':token'      => $accessToken,
                ':expires_at' => $expiresAt,
                ':urn'        => $urn ?: (Env::get('LINKEDIN_AUTHOR_URN') ?: null)
            ]);

            $message = "LinkedIn connected successfully! Access token valid until " . date('d M Y, h:i A', strtotime($expiresAt)) . " (approx " . round($expiresIn / 86400) . " days).";
            $messageType = "success";
            $logger->info("LinkedIn OAuth token refreshed via admin dashboard until {$expiresAt}");
        }
    }
}

// Handle Manual Token Updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_tokens') {
    $submittedToken = $_POST['csrf_token'] ?? '';
    if (!hash_equals($csrfToken, $submittedToken)) {
        $message = "Invalid CSRF token.";
        $messageType = "danger";
    } else {
        $platform = $_POST['platform'] ?? '';
        $token = trim((string)($_POST['access_token'] ?? ''));
        $urn = trim((string)($_POST['author_urn'] ?? ''));
        $expiresAt = trim((string)($_POST['expires_at'] ?? ''));

        if (!empty($platform) && !empty($token)) {
            $stmt = $pdo->prepare("
                INSERT INTO social_tokens (platform, access_token, token_type, expires_at, author_urn, updated_at)
                VALUES (:platform, :token, 'Bearer', :expires_at, :urn, NOW())
                ON DUPLICATE KEY UPDATE 
                    access_token = VALUES(access_token),
                    expires_at = VALUES(expires_at),
                    author_urn = VALUES(author_urn),
                    updated_at = NOW()
            ");
            $stmt->execute([
                ':platform'   => $platform,
                ':token'      => $token,
                ':expires_at' => $expiresAt ?: null,
                ':urn'        => $urn ?: null
            ]);
            $message = strtoupper($platform) . " token saved successfully in database!";
            $messageType = "success";
        }
    }
}

// Fetch current token records from DB
$dbTokens = [];
$tStmt = $pdo->query("SELECT * FROM social_tokens");
while ($row = $tStmt->fetch()) {
    $dbTokens[$row['platform']] = $row;
}

// Generate OAuth Start URL for LinkedIn
$linkedInState = bin2hex(random_bytes(16));
$_SESSION['linkedin_oauth_state'] = $linkedInState;
$linkedInClientId = (string)Env::get('LINKEDIN_CLIENT_ID', '');
$linkedInAuthUrl = "https://www.linkedin.com/oauth/v2/authorization?" . http_build_query([
    'response_type' => 'code',
    'client_id'     => $linkedInClientId,
    'redirect_uri'  => $currentRedirectUri,
    'state'         => $linkedInState,
    'scope'         => 'w_member_social openid profile email'
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Social Media API & OAuth Management - NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    <?php include "links.php"; ?>
    <style>
        .token-card {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        }
        .platform-icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #fff;
        }
    </style>
</head>

<body class="crm_body_bg">
    <?php include "header.php"; ?>

    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <?php include "top_nav.php"; ?>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid p-0 sm_padding_15px">

                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?= $messageType ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1 fw-bold text-dark"><i class="fas fa-key text-primary me-2"></i>Social Media OAuth & Tokens</h2>
                        <p class="text-muted mb-0">Manage API credentials, OAuth tokens, and 60-day expiration renewal.</p>
                    </div>
                    <div>
                        <a href="social-queue.php" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Back to Queue
                        </a>
                    </div>
                </div>

                <!-- 1. LinkedIn OAuth Section -->
                <div class="token-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="platform-icon-circle bg-primary">
                                <i class="fab fa-linkedin-in"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold">LinkedIn (REST Posts API)</h4>
                                <small class="text-muted">Requires 60-day user OAuth 2.0 token with <code>w_member_social</code> scope</small>
                            </div>
                        </div>
                        <div>
                            <?php 
                                $liToken = $dbTokens['linkedin']['access_token'] ?? Env::get('LINKEDIN_ACCESS_TOKEN');
                                $liExpires = $dbTokens['linkedin']['expires_at'] ?? null;
                                $daysRemaining = null;
                                if ($liExpires) {
                                    $diff = strtotime($liExpires) - time();
                                    $daysRemaining = round($diff / 86400);
                                }
                            ?>
                            <?php if ($daysRemaining !== null && $daysRemaining > 7): ?>
                                <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle me-1"></i> Valid (<?= $daysRemaining ?> days left)</span>
                            <?php elseif ($daysRemaining !== null && $daysRemaining > 0): ?>
                                <span class="badge bg-warning text-dark px-3 py-2"><i class="fas fa-exclamation-triangle me-1"></i> Expiring Soon (<?= $daysRemaining ?> days left)</span>
                            <?php elseif ($daysRemaining !== null && $daysRemaining <= 0): ?>
                                <span class="badge bg-danger px-3 py-2"><i class="fas fa-times-circle me-1"></i> Expired</span>
                            <?php elseif (!empty($liToken)): ?>
                                <span class="badge bg-info px-3 py-2"><i class="fas fa-key me-1"></i> Configured in .env</span>
                            <?php else: ?>
                                <span class="badge bg-secondary px-3 py-2">Not Connected</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="alert alert-light border">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="fw-bold mb-1">One-Click OAuth 2.0 Authorization</h6>
                                <p class="small text-muted mb-0">
                                    Clicking connect will redirect to LinkedIn to grant post permissions and automatically store the refreshed 60-day token.
                                </p>
                                <p class="small text-muted mb-0 mt-1">
                                    <strong>Redirect URL registered in LinkedIn Developer Portal:</strong> 
                                    <code><?= htmlspecialchars($currentRedirectUri) ?></code>
                                </p>
                            </div>
                            <div class="col-md-4 text-md-end mt-2 mt-md-0">
                                <?php if (!empty($linkedInClientId)): ?>
                                    <a href="<?= htmlspecialchars($linkedInAuthUrl) ?>" class="btn btn-primary">
                                        <i class="fab fa-linkedin me-1"></i> Connect / Renew LinkedIn
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-secondary" disabled title="Set LINKEDIN_CLIENT_ID in .env first">
                                        Set Client ID in .env
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="social-oauth.php" class="mt-3">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                        <input type="hidden" name="action" value="save_tokens">
                        <input type="hidden" name="platform" value="linkedin">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Manual LinkedIn Access Token:</label>
                                <input type="password" name="access_token" class="form-control form-control-sm" value="<?= htmlspecialchars($dbTokens['linkedin']['access_token'] ?? (string)Env::get('LINKEDIN_ACCESS_TOKEN', '')) ?>" placeholder="AQ...">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Author URN:</label>
                                <input type="text" name="author_urn" class="form-control form-control-sm" value="<?= htmlspecialchars($dbTokens['linkedin']['author_urn'] ?? (string)Env::get('LINKEDIN_AUTHOR_URN', '')) ?>" placeholder="urn:li:person:XXXXX">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Expires At:</label>
                                <input type="datetime-local" name="expires_at" class="form-control form-control-sm" value="<?= !empty($dbTokens['linkedin']['expires_at']) ? date('Y-m-d\TH:i', strtotime($dbTokens['linkedin']['expires_at'])) : '' ?>">
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save me-1"></i> Save LinkedIn Token</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 2. X (Twitter) API Section -->
                <div class="token-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="platform-icon-circle bg-dark">
                                <i class="fab fa-x-twitter"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold">X / Twitter (API v2)</h4>
                                <small class="text-muted">Requires OAuth 2.0 User Token (or OAuth 1.0a User Context) to POST tweets</small>
                            </div>
                        </div>
                        <div>
                            <?php if (Env::get('X_ACCESS_TOKEN') || !empty($dbTokens['x']['access_token'])): ?>
                                <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle me-1"></i> Configured</span>
                            <?php else: ?>
                                <span class="badge bg-secondary px-3 py-2">Not Configured</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <p class="small text-muted">
                        Note: Official X API v2 requires write permissions on your app. Because link tweets have pay-per-use costs on some developer tiers, X posts default to <strong>OFF</strong> per blog and must be explicitly enabled.
                    </p>

                    <form method="POST" action="social-oauth.php">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                        <input type="hidden" name="action" value="save_tokens">
                        <input type="hidden" name="platform" value="x">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">X OAuth Access Token (User Context):</label>
                                <input type="password" name="access_token" class="form-control form-control-sm" value="<?= htmlspecialchars($dbTokens['x']['access_token'] ?? (string)Env::get('X_ACCESS_TOKEN', '')) ?>" placeholder="User Access Token">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Token Expiration Date (Optional):</label>
                                <input type="datetime-local" name="expires_at" class="form-control form-control-sm" value="<?= !empty($dbTokens['x']['expires_at']) ? date('Y-m-d\TH:i', strtotime($dbTokens['x']['expires_at'])) : '' ?>">
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save me-1"></i> Save X Token</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 3. dev.to & Hashnode Status Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="token-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fab fa-dev fa-2x"></i>
                                    <h5 class="mb-0 fw-bold">dev.to (Forem API)</h5>
                                </div>
                                <?php if (Env::get('DEVTO_API_KEY')): ?>
                                    <span class="badge bg-success">Configured in .env</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Missing in .env</span>
                                <?php endif; ?>
                            </div>
                            <p class="small text-muted mb-0">
                                Uses permanent API Key in <code>.env</code> under <code>DEVTO_API_KEY</code>. Obtain from <a href="https://dev.to/settings/extensions" target="_blank">dev.to Settings &gt; Extensions</a>.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="token-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-feather fa-2x text-primary"></i>
                                    <h5 class="mb-0 fw-bold">Hashnode (GraphQL API v2)</h5>
                                </div>
                                <?php if (Env::get('HASHNODE_API_TOKEN') && Env::get('HASHNODE_PUBLICATION_ID')): ?>
                                    <span class="badge bg-success">Configured in .env</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Missing in .env</span>
                                <?php endif; ?>
                            </div>
                            <p class="small text-muted mb-0">
                                Uses Personal Access Token (<code>HASHNODE_API_TOKEN</code>) and Blog Publication ID (<code>HASHNODE_PUBLICATION_ID</code>) in <code>.env</code>.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>
</html>
