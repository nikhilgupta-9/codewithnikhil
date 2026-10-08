<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__) . '/admin/db-conn.php';

$admin_id = $_SESSION['admin_id'] ?? 0;
$adminUser = $_SESSION['admin_user'] ?? 'Admin';
$adminEmail = $_SESSION['admin_email'] ?? '';
$adminRole = ucfirst($_SESSION['admin_role'] ?? 'Super Admin');

// Fetch latest notifications (Pending Comments & Social Jobs & Leads)
$notifications = [];

if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    // 1. Pending comments
    $resC = $conn->query("SELECT id, name, blog_slug, created_at FROM `blog_comments` WHERE `status` = 'pending' ORDER BY id DESC LIMIT 3");
    if ($resC) {
        while ($r = $resC->fetch_assoc()) {
            $notifications[] = [
                'type' => 'comment',
                'title' => 'New Comment from ' . htmlspecialchars($r['name']),
                'desc' => 'On: ' . htmlspecialchars($r['blog_slug']),
                'time' => date('d M, h:i A', strtotime($r['created_at'])),
                'link' => 'blog-comments.php?status=pending',
                'icon' => 'fas fa-comment-dots text-warning'
            ];
        }
    }

    // 2. Pending social jobs
    $resS = $conn->query("SELECT id, platform, scheduled_at FROM `social_jobs` WHERE `status` = 'draft' ORDER BY id DESC LIMIT 3");
    if ($resS) {
        while ($r = $resS->fetch_assoc()) {
            $notifications[] = [
                'type' => 'social',
                'title' => 'Social Draft: ' . strtoupper($r['platform']),
                'desc' => 'Awaiting approval for cross-posting',
                'time' => date('d M, h:i A', strtotime($r['scheduled_at'])),
                'link' => 'social-queue.php?status=draft',
                'icon' => 'fas fa-share-alt text-primary'
            ];
        }
    }

    // 3. New inquiries
    $resI = $conn->query("SELECT id, name, subject, created_at FROM `inquiries` WHERE `status` = 'new' ORDER BY id DESC LIMIT 3");
    if ($resI) {
        while ($r = $resI->fetch_assoc()) {
            $notifications[] = [
                'type' => 'lead',
                'title' => 'Lead from ' . htmlspecialchars($r['name']),
                'desc' => htmlspecialchars($r['subject'] ?: 'New contact request'),
                'time' => date('d M, h:i A', strtotime($r['created_at'])),
                'link' => 'new-leads.php',
                'icon' => 'fas fa-user-plus text-success'
            ];
        }
    }
}
$notifCount = count($notifications);
?>

<div class="header_iner d-flex justify-content-between align-items-center py-2 px-3 shadow-sm bg-white" style="border-bottom: 1px solid #e2e8f0;">
    <!-- Left: Hamburger Toggle & Live Date -->
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" onclick="toggleMobileSidebar()" aria-label="Toggle Navigation">
            <i class="fas fa-bars fa-lg"></i>
        </button>
        <div class="d-none d-md-flex align-items-center gap-2 text-muted small">
            <i class="far fa-calendar-alt text-primary"></i>
            <span><?= date('l, d F Y') ?></span>
            <span class="badge bg-light text-dark border ms-1"><i class="far fa-clock text-info me-1"></i>Asia/Kolkata</span>
        </div>
    </div>

    <!-- Right: Notification Bell & Admin Profile Dropdown -->
    <div class="d-flex align-items-center gap-3">
        <!-- Live Quick View Site Link -->
        <a href="../" target="_blank" class="btn btn-sm btn-outline-primary d-none d-sm-inline-flex align-items-center gap-1 rounded-pill px-3">
            <i class="fas fa-external-link-alt fa-xs"></i> View Website
        </a>

        <!-- Notifications Dropdown -->
        <div class="dropdown">
            <button class="btn btn-light btn-sm position-relative rounded-circle p-2" type="button" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="width: 38px; height: 38px;">
                <i class="far fa-bell text-secondary"></i>
                <?php if ($notifCount > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                        <?= $notifCount ?>
                    </span>
                <?php endif; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 py-0" aria-labelledby="notifDropdown" style="width: 320px; max-width: 90vw;">
                <li class="p-3 bg-light border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold text-dark"><i class="fas fa-bell me-1 text-primary"></i> Action Center</h6>
                    <span class="badge bg-primary rounded-pill"><?= $notifCount ?> items</span>
                </li>
                <div style="max-height: 280px; overflow-y: auto;">
                    <?php if (empty($notifications)): ?>
                        <li class="p-3 text-center text-muted small">
                            <i class="fas fa-check-circle text-success fa-2x mb-1 d-block"></i>
                            All caught up! No pending actions.
                        </li>
                    <?php else: ?>
                        <?php foreach ($notifications as $n): ?>
                            <li>
                                <a class="dropdown-item p-3 border-bottom d-flex align-items-start gap-2 text-wrap" href="<?= htmlspecialchars($n['link']) ?>">
                                    <div class="rounded-circle bg-light p-2 text-center" style="width: 32px; height: 32px; line-height: 16px;">
                                        <i class="<?= $n['icon'] ?>"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold small text-dark"><?= $n['title'] ?></div>
                                        <div class="text-muted" style="font-size: 11.5px;"><?= $n['desc'] ?></div>
                                        <small class="text-muted opacity-75" style="font-size: 10px;"><?= $n['time'] ?></small>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <li class="p-2 text-center bg-light">
                    <a href="social-queue.php" class="text-primary small text-decoration-none fw-semibold">View Social Queue &rarr;</a>
                </li>
            </ul>
        </div>

        <!-- Admin Profile Dropdown -->
        <div class="dropdown">
            <button class="btn btn-light btn-sm d-flex align-items-center gap-2 rounded-pill px-2 py-1 border" type="button" id="adminUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/img/logo_icon.jpg" alt="Avatar" class="rounded-circle" width="28" height="28" style="object-fit:cover;">
                <span class="fw-bold text-dark d-none d-md-inline" style="font-size: 13px;"><?= htmlspecialchars($adminUser) ?></span>
                <i class="fas fa-chevron-down fa-xs text-muted"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 py-2" aria-labelledby="adminUserDropdown" style="min-width: 200px;">
                <li class="px-3 py-2 border-bottom">
                    <div class="fw-bold text-dark"><?= htmlspecialchars($adminUser) ?></div>
                    <small class="text-muted d-block"><?= htmlspecialchars($adminEmail ?: 'admin@nikhilworks.com') ?></small>
                    <span class="badge bg-primary bg-opacity-10 text-primary mt-1" style="font-size: 10px;"><?= htmlspecialchars($adminRole) ?></span>
                </li>
                <li><a class="dropdown-item py-2" href="all-admin.php"><i class="fas fa-user-cog me-2 text-muted"></i> Manage Admins</a></li>
                <li><a class="dropdown-item py-2" href="social-oauth.php"><i class="fas fa-key me-2 text-muted"></i> API Keys &amp; OAuth</a></li>
                <li><hr class="dropdown-divider my-1"></li>
                <li><a class="dropdown-item py-2 text-danger fw-semibold" href="auth/logout.php"><i class="fas fa-sign-out-alt me-2"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
</div>