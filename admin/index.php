<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: auth/login.php");
    exit();
}

require_once "db-conn.php";

$adminUser = $_SESSION['admin_user'] ?? 'Admin';

// Fetch Live Database Metrics
$metrics = [
    'blogs_count'          => 0,
    'social_pending'       => 0,
    'social_posted'        => 0,
    'inquiries_new'        => 0,
    'inquiries_total'      => 0,
    'comments_pending'     => 0,
    'comments_approved'    => 0,
    'testimonials_count'   => 0,
    'projects_count'       => 0,
];

if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    // Blogs
    $q = $conn->query("SELECT COUNT(*) FROM `blogs`");
    if ($q) $metrics['blogs_count'] = (int)$q->fetch_row()[0];

    // Social Jobs
    $q = $conn->query("SELECT status, COUNT(*) FROM `social_jobs` GROUP BY status");
    if ($q) {
        while ($r = $q->fetch_row()) {
            if ($r[0] === 'draft') $metrics['social_pending'] = (int)$r[1];
            if ($r[0] === 'posted') $metrics['social_posted'] = (int)$r[1];
        }
    }

    // Inquiries / Leads
    $q = $conn->query("SELECT status, COUNT(*) FROM `inquiries` GROUP BY status");
    if ($q) {
        while ($r = $q->fetch_row()) {
            if ($r[0] === 'new') $metrics['inquiries_new'] = (int)$r[1];
            $metrics['inquiries_total'] += (int)$r[1];
        }
    }

    // Comments
    $q = $conn->query("SELECT status, COUNT(*) FROM `blog_comments` GROUP BY status");
    if ($q) {
        while ($r = $q->fetch_row()) {
            if ($r[0] === 'pending') $metrics['comments_pending'] = (int)$r[1];
            if ($r[0] === 'approved') $metrics['comments_approved'] = (int)$r[1];
        }
    }

    // Testimonials
    $q = $conn->query("SELECT COUNT(*) FROM `testimonials`");
    if ($q) $metrics['testimonials_count'] = (int)$q->fetch_row()[0];

    // Projects / Products
    $q = $conn->query("SELECT COUNT(*) FROM `products`");
    if ($q) $metrics['projects_count'] = (int)$q->fetch_row()[0];

    // Recent Inquiries
    $recentInquiries = [];
    $qInq = $conn->query("SELECT * FROM `inquiries` ORDER BY `id` DESC LIMIT 5");
    if ($qInq) {
        while ($row = $qInq->fetch_assoc()) {
            $recentInquiries[] = $row;
        }
    }

    // Recent Blogs
    $recentBlogs = [];
    $qBlog = $conn->query("SELECT id, title, slug_url, image, created_at FROM `blogs` ORDER BY `id` DESC LIMIT 4");
    if ($qBlog) {
        while ($row = $qBlog->fetch_assoc()) {
            $recentBlogs[] = $row;
        }
    }

    // Recent Social Jobs
    $recentSocialJobs = [];
    $qSoc = $conn->query("
        SELECT j.*, b.title as blog_title 
        FROM `social_jobs` j 
        LEFT JOIN `blogs` b ON j.blog_id = b.id 
        ORDER BY j.id DESC LIMIT 5
    ");
    if ($qSoc) {
        while ($row = $qSoc->fetch_assoc()) {
            $recentSocialJobs[] = $row;
        }
    }

    // Recent Security Login Audit Logs
    $recentLogs = [];
    $qLogs = $conn->query("SELECT * FROM `admin_login_logs` ORDER BY id DESC LIMIT 5");
    if ($qLogs) {
        while ($row = $qLogs->fetch_assoc()) {
            $recentLogs[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NikhilWorks Executive Dashboard - Admin Suite</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    
    <!-- Core Links -->
    <?php include "links.php"; ?>

    <style>
        .dashboard-hero {
            background: linear-gradient(135deg, #051617 0%, #0d383a 100%);
            border-radius: 16px;
            color: #fff;
            padding: 28px 32px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(173, 255, 28, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .dashboard-hero::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(173, 255, 28, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .metric-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .metric-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08);
        }
        .metric-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .quick-action-btn {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            font-weight: 600;
            font-size: 0.92rem;
            color: #1e293b;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .quick-action-btn:hover {
            background: #104041;
            color: #ADFF1C;
            border-color: #104041;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 64, 65, 0.15);
        }
        .quick-action-btn i {
            font-size: 1.2rem;
            color: #104041;
            transition: color 0.2s ease;
        }
        .quick-action-btn:hover i {
            color: #ADFF1C;
        }
        .platform-tag {
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .platform-linkedin { background-color: #0077b5; color: #fff; }
        .platform-x { background-color: #000; color: #fff; }
        .platform-devto { background-color: #0a0a0a; color: #fff; }
        .platform-hashnode { background-color: #2942ff; color: #fff; }
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

                <!-- 1. Hero Welcome Banner -->
                <div class="dashboard-hero">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <span class="badge bg-success bg-opacity-25 text-white mb-2 px-3 py-1" style="border: 1px solid rgba(173,255,28,0.4); font-size: 12px;">
                                <i class="fas fa-bolt me-1 text-warning"></i> NIKHILWORKS AUTOMATION ACTIVE
                            </span>
                            <h2 class="text-white fw-bold mb-2">Welcome back, <?= htmlspecialchars($adminUser) ?>!</h2>
                            <p class="text-white text-opacity-75 mb-0" style="font-size: 0.95rem;">
                                Your multi-platform content engine, client lead center, and website ecosystem are running smoothly.
                            </p>
                        </div>
                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                            <a href="add-blog.php" class="btn btn-light fw-bold px-4 py-2 me-2 shadow-sm">
                                <i class="fas fa-plus-circle text-primary me-1"></i> New Blog
                            </a>
                            <a href="social-queue.php" class="btn btn-outline-light px-3 py-2">
                                <i class="fas fa-tasks me-1"></i> Queue
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2. Hero Metric Cards -->
                <div class="row g-3 mb-4">
                    <!-- Blogs Count -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="metric-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="text-muted small fw-semibold">Total Published Blogs</span>
                                    <h2 class="fw-bold text-dark mb-0 mt-1"><?= $metrics['blogs_count'] ?></h2>
                                </div>
                                <div class="metric-icon-box bg-primary bg-opacity-10 text-primary">
                                    <i class="fas fa-blog"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted"><i class="fas fa-eye me-1"></i>Live Technical Guides</small>
                                <a href="view-all-blog.php" class="small fw-semibold text-primary text-decoration-none">Manage &rarr;</a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Automation Pending Drafts -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="metric-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="text-muted small fw-semibold">Social Media Queue</span>
                                    <h2 class="fw-bold text-dark mb-0 mt-1"><?= $metrics['social_pending'] ?> <small class="text-muted" style="font-size:14px;">pending</small></h2>
                                </div>
                                <div class="metric-icon-box bg-info bg-opacity-10 text-info">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-success"><i class="fas fa-check-double me-1"></i><?= $metrics['social_posted'] ?> posted live</small>
                                <a href="social-queue.php" class="small fw-semibold text-info text-decoration-none">Review Queue &rarr;</a>
                            </div>
                        </div>
                    </div>

                    <!-- Client Leads / Inquiries -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="metric-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="text-muted small fw-semibold">Client Inquiries / Leads</span>
                                    <h2 class="fw-bold text-dark mb-0 mt-1"><?= $metrics['inquiries_new'] ?> <small class="text-muted" style="font-size:14px;">new</small></h2>
                                </div>
                                <div class="metric-icon-box bg-success bg-opacity-10 text-success">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted"><i class="fas fa-users me-1"></i><?= $metrics['inquiries_total'] ?> total received</small>
                                <a href="new-leads.php" class="small fw-semibold text-success text-decoration-none">View Leads &rarr;</a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Comments Moderation -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="metric-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="text-muted small fw-semibold">Pending Comments</span>
                                    <h2 class="fw-bold text-dark mb-0 mt-1"><?= $metrics['comments_pending'] ?></h2>
                                </div>
                                <div class="metric-icon-box bg-warning bg-opacity-10 text-warning">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                <small class="text-muted"><i class="fas fa-check me-1"></i><?= $metrics['comments_approved'] ?> approved live</small>
                                <a href="blog-comments.php?status=pending" class="small fw-semibold text-warning text-decoration-none">Moderate &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Quick Action Bar -->
                <div class="row g-3 mb-4">
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="add-blog.php" class="quick-action-btn">
                            <i class="fas fa-pen-nib text-primary"></i>
                            <span>Add Blog</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="social-queue.php" class="quick-action-btn">
                            <i class="fas fa-share-nodes text-info"></i>
                            <span>Social Queue</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="blog-comments.php" class="quick-action-btn">
                            <i class="fas fa-comment-dots text-warning"></i>
                            <span>Comments</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="new-leads.php" class="quick-action-btn">
                            <i class="fas fa-user-tie text-success"></i>
                            <span>Client Leads</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="testimonials-social.php" class="quick-action-btn">
                            <i class="fas fa-quote-right text-danger"></i>
                            <span>Testimonials</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <a href="social-oauth.php" class="quick-action-btn">
                            <i class="fas fa-key text-secondary"></i>
                            <span>API &amp; OAuth</span>
                        </a>
                    </div>
                </div>

                <!-- 4. Row 1: Recent Inquiries & Social Media Queue Status -->
                <div class="row g-4 mb-4">
                    <!-- Left: Recent Inquiries -->
                    <div class="col-lg-7">
                        <div class="white_card h-100 shadow-sm border-0">
                            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-inbox text-success me-2"></i>Recent Client Inquiries</h5>
                                <a href="new-leads.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Client</th>
                                                <th>Subject / Message</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($recentInquiries)): ?>
                                                <tr>
                                                    <td colspan="4" class="text-center py-4 text-muted">No client inquiries found.</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($recentInquiries as $inq): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-bold text-dark"><?= htmlspecialchars($inq['name']) ?></div>
                                                            <small class="text-muted"><i class="fas fa-envelope fa-xs"></i> <?= htmlspecialchars($inq['email']) ?></small>
                                                        </td>
                                                        <td>
                                                            <div class="fw-semibold text-dark small"><?= htmlspecialchars($inq['subject'] ?: 'Project Inquiry') ?></div>
                                                            <small class="text-muted text-truncate d-inline-block" style="max-width:220px;">
                                                                <?= htmlspecialchars(substr($inq['message'] ?? '', 0, 45)) ?>...
                                                            </small>
                                                        </td>
                                                        <td class="text-muted small">
                                                            <?= date('d M Y', strtotime($inq['created_at'])) ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($inq['status'] === 'new'): ?>
                                                                <span class="badge bg-success">New</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-secondary">Read</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Social Media Automation Queue -->
                    <div class="col-lg-5">
                        <div class="white_card h-100 shadow-sm border-0">
                            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-share-alt text-primary me-2"></i>Social Media Queue</h5>
                                <a href="social-queue.php" class="btn btn-sm btn-outline-primary">Approval Queue</a>
                            </div>
                            <div class="card-body p-3">
                                <?php if (empty($recentSocialJobs)): ?>
                                    <p class="text-center text-muted py-4">No social media jobs generated yet.</p>
                                <?php else: ?>
                                    <div class="d-flex flex-column gap-3">
                                        <?php foreach ($recentSocialJobs as $job): 
                                            $p = (string)$job['platform'];
                                            $st = (string)$job['status'];
                                        ?>
                                            <div class="p-2 border rounded d-flex align-items-center justify-content-between bg-light">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="platform-tag platform-<?= $p ?>"><?= $p ?></span>
                                                    <div>
                                                        <div class="fw-semibold text-dark small text-truncate" style="max-width: 200px;">
                                                            <?= htmlspecialchars($job['blog_title'] ?: 'Blog #' . $job['blog_id']) ?>
                                                        </div>
                                                        <small class="text-muted" style="font-size:11px;">
                                                            <?= date('d M, h:i A', strtotime($job['scheduled_at'])) ?>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php if ($st === 'draft'): ?>
                                                        <span class="badge bg-warning text-dark">Draft</span>
                                                    <?php elseif ($st === 'approved'): ?>
                                                        <span class="badge bg-info">Approved</span>
                                                    <?php elseif ($st === 'posted'): ?>
                                                        <span class="badge bg-success">Posted</span>
                                                    <?php elseif ($st === 'failed'): ?>
                                                        <span class="badge bg-danger">Failed</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Row 2: Recent Blogs & Security Activity Logs -->
                <div class="row g-4">
                    <!-- Left: Latest Published Blogs -->
                    <div class="col-lg-6">
                        <div class="white_card h-100 shadow-sm border-0">
                            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-newspaper text-info me-2"></i>Latest Blogs</h5>
                                <a href="view-all-blog.php" class="btn btn-sm btn-outline-primary">All Blogs</a>
                            </div>
                            <div class="card-body p-3">
                                <?php if (empty($recentBlogs)): ?>
                                    <p class="text-center text-muted py-4">No blogs found.</p>
                                <?php else: ?>
                                    <div class="d-flex flex-column gap-3">
                                        <?php foreach ($recentBlogs as $rb): ?>
                                            <div class="d-flex align-items-center justify-content-between p-2 border rounded">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="uploads/blogs/<?= htmlspecialchars($rb['image']) ?>" alt="Cover" class="rounded" width="54" height="42" style="object-fit:cover;" onerror="this.src='assets/img/logo_icon.jpg'">
                                                    <div>
                                                        <div class="fw-bold text-dark small text-truncate" style="max-width: 240px;">
                                                            <?= htmlspecialchars($rb['title']) ?>
                                                        </div>
                                                        <small class="text-muted" style="font-size:11px;">
                                                            <?= date('d M Y', strtotime($rb['created_at'])) ?>
                                                        </small>
                                                    </div>
                                                </div>
                                                <a href="edit-blog.php?id=<?= $rb['id'] ?>" class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Security Audit Logs -->
                    <div class="col-lg-6">
                        <div class="white_card h-100 shadow-sm border-0">
                            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-shield-alt text-danger me-2"></i>Security &amp; Auth Logs</h5>
                                <span class="badge bg-light text-dark border">Live Monitor</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Attempted User</th>
                                                <th>IP Address</th>
                                                <th>Status</th>
                                                <th>Timestamp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($recentLogs)): ?>
                                                <tr>
                                                    <td colspan="4" class="text-center py-4 text-muted">No auth logs recorded yet.</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($recentLogs as $log): 
                                                    $st = $log['status'];
                                                ?>
                                                    <tr>
                                                        <td class="fw-semibold text-dark small"><?= htmlspecialchars($log['username_attempted']) ?></td>
                                                        <td class="font-monospace text-muted small"><?= htmlspecialchars($log['ip_address']) ?></td>
                                                        <td>
                                                            <?php if ($st === 'success'): ?>
                                                                <span class="badge bg-success">Success</span>
                                                            <?php elseif ($st === 'failed'): ?>
                                                                <span class="badge bg-warning text-dark">Failed</span>
                                                            <?php elseif ($st === 'locked_out'): ?>
                                                                <span class="badge bg-danger">Locked</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-secondary"><?= htmlspecialchars($st) ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-muted small">
                                                            <?= date('d M, h:i A', strtotime($log['attempt_time'])) ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>
</html>