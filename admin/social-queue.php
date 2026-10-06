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

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;

Env::load(dirname(__DIR__) . '/.env');
date_default_timezone_set((string)Env::get('TIMEZONE', 'Asia/Kolkata'));

// Generate CSRF token if not exists
if (empty($_SESSION['social_csrf_token'])) {
    $_SESSION['social_csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['social_csrf_token'];

$pdo = Database::getConnection();

// Fetch filter parameters
$filterStatus = $_GET['status'] ?? 'all';
$filterPlatform = $_GET['platform'] ?? 'all';

// Fetch all jobs grouped by blog
$sql = "
    SELECT j.*, 
           b.title AS blog_title, 
           b.slug_url, 
           b.image AS blog_image,
           b.created_at AS blog_created_at
    FROM social_jobs j
    INNER JOIN blogs b ON j.blog_id = b.id
    WHERE 1=1
";

$params = [];
if ($filterStatus !== 'all') {
    $sql .= " AND j.status = :status";
    $params[':status'] = $filterStatus;
}
if ($filterPlatform !== 'all') {
    $sql .= " AND j.platform = :platform";
    $params[':platform'] = $filterPlatform;
}

$sql .= " ORDER BY b.id DESC, j.id ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$rawJobs = $stmt->fetchAll();

// Group by blog
$groupedJobs = [];
foreach ($rawJobs as $job) {
    $bId = (int)$job['blog_id'];
    if (!isset($groupedJobs[$bId])) {
        $groupedJobs[$bId] = [
            'blog_id' => $bId,
            'blog_title' => $job['blog_title'],
            'blog_slug' => $job['slug_url'],
            'blog_image' => $job['blog_image'],
            'blog_created_at' => $job['blog_created_at'],
            'jobs' => []
        ];
    }
    $groupedJobs[$bId]['jobs'][] = $job;
}

// Fetch count metrics
$counts = [
    'total' => 0,
    'draft' => 0,
    'approved' => 0,
    'posted' => 0,
    'failed' => 0
];
$countStmt = $pdo->query("SELECT status, COUNT(*) as cnt FROM social_jobs GROUP BY status");
while ($r = $countStmt->fetch()) {
    $counts[$r['status']] = (int)$r['cnt'];
    $counts['total'] += (int)$r['cnt'];
}

// Check blogs that have no social jobs yet
$unprocessedBlogsStmt = $pdo->query("
    SELECT b.id, b.title 
    FROM blogs b
    LEFT JOIN social_jobs j ON b.id = j.blog_id
    WHERE j.id IS NULL
    ORDER BY b.id DESC
    LIMIT 20
");
$unprocessedBlogs = $unprocessedBlogsStmt->fetchAll();

$dryRun = (bool)Env::get('DRY_RUN', false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Social Media Approval Queue - NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    <?php include "links.php"; ?>
    <meta name="csrf-token" content="<?= htmlspecialchars($csrfToken) ?>">
    
    <style>
        .social-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            margin-bottom: 24px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .social-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.08);
        }
        .blog-header {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 20px;
            border-radius: 12px 12px 0 0;
        }
        .job-item {
            border-bottom: 1px solid #edf2f7;
            padding: 18px 20px;
        }
        .job-item:last-child {
            border-bottom: none;
        }
        .platform-badge {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .platform-linkedin { background-color: #0077b5; color: #fff; }
        .platform-x { background-color: #000; color: #fff; }
        .platform-devto { background-color: #0a0a0a; color: #fff; }
        .platform-hashnode { background-color: #2942ff; color: #fff; }
        
        .status-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .status-draft { background-color: #fef3c7; color: #92400e; }
        .status-approved { background-color: #dbeafe; color: #1e40af; }
        .status-posted { background-color: #d1fae5; color: #065f46; }
        .status-failed { background-color: #fee2e2; color: #991b1b; }

        .cover-preview {
            width: 140px;
            height: 75px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            cursor: pointer;
        }
        .caption-textarea {
            font-family: inherit;
            font-size: 0.9rem;
            resize: vertical;
        }
        .stat-card {
            border-radius: 10px;
            padding: 16px 20px;
            color: #fff;
            margin-bottom: 20px;
        }
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999999;
            min-width: 320px;
            display: none;
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
                
                <!-- Toast for AJAX notifications -->
                <div id="toastNotification" class="toast-notification alert alert-success alert-dismissible fade show shadow-lg" role="alert">
                    <span id="toastMessage">Action completed successfully!</span>
                    <button type="button" class="btn-close ms-2" onclick="$('#toastNotification').fadeOut();" aria-label="Close"></button>
                </div>

                <!-- Header Title & Controls -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1 fw-bold text-dark"><i class="fas fa-share-alt text-primary me-2"></i>Social Media Approval Queue</h2>
                        <p class="text-muted mb-0">Human-in-the-loop approval: Review, edit, and approve auto-generated posts before they go live.</p>
                    </div>
                    <div class="d-flex gap-2 mt-2 mt-md-0">
                        <?php if ($dryRun): ?>
                            <span class="badge bg-warning text-dark d-flex align-items-center px-3 py-2">
                                <i class="fas fa-flask me-1"></i> DRY RUN MODE (Safe Simulation)
                            </span>
                        <?php endif; ?>
                        <a href="social-oauth.php" class="btn btn-outline-secondary">
                            <i class="fas fa-key me-1"></i> OAuth & Tokens
                        </a>
                    </div>
                </div>

                <!-- Unprocessed Blogs Prompt (if any) -->
                <?php if (!empty($unprocessedBlogs)): ?>
                    <div class="alert alert-info d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <i class="fas fa-info-circle me-2"></i>
                            <strong><?= count($unprocessedBlogs) ?> existing blog(s)</strong> do not have social posts generated yet.
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="genDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Generate Drafts for Blog
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="genDropdown">
                                <?php foreach ($unprocessedBlogs as $uBlog): ?>
                                    <li>
                                        <a class="dropdown-item btn-generate-blog" href="#" data-blog-id="<?= $uBlog['id'] ?>">
                                            #<?= $uBlog['id'] ?> - <?= htmlspecialchars(substr($uBlog['title'], 0, 45)) ?>...
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- KPI Metric Counters -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <a href="social-queue.php?status=draft" class="text-decoration-none">
                            <div class="stat-card bg-warning text-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-dark mb-1">Pending Approval (Drafts)</h6>
                                        <h3 class="mb-0 fw-bold"><?= $counts['draft'] ?></h3>
                                    </div>
                                    <i class="fas fa-clock fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <a href="social-queue.php?status=approved" class="text-decoration-none">
                            <div class="stat-card bg-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-white mb-1">Approved & Scheduled</h6>
                                        <h3 class="mb-0 fw-bold"><?= $counts['approved'] ?></h3>
                                    </div>
                                    <i class="fas fa-calendar-check fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <a href="social-queue.php?status=posted" class="text-decoration-none">
                            <div class="stat-card bg-success">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-white mb-1">Published Successfully</h6>
                                        <h3 class="mb-0 fw-bold"><?= $counts['posted'] ?></h3>
                                    </div>
                                    <i class="fas fa-check-circle fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <a href="social-queue.php?status=failed" class="text-decoration-none">
                            <div class="stat-card bg-danger">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-white mb-1">Failed / Needs Attention</h6>
                                        <h3 class="mb-0 fw-bold"><?= $counts['failed'] ?></h3>
                                    </div>
                                    <i class="fas fa-exclamation-triangle fa-2x opacity-50"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Filter Controls -->
                <div class="white_card mb_30 p-3">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="fw-bold text-muted me-2"><i class="fas fa-filter me-1"></i>Filters:</span>
                        <a href="social-queue.php?status=all" class="btn btn-sm <?= $filterStatus === 'all' ? 'btn-primary' : 'btn-outline-secondary' ?>">All Status</a>
                        <a href="social-queue.php?status=draft" class="btn btn-sm <?= $filterStatus === 'draft' ? 'btn-primary' : 'btn-outline-secondary' ?>">Drafts</a>
                        <a href="social-queue.php?status=approved" class="btn btn-sm <?= $filterStatus === 'approved' ? 'btn-primary' : 'btn-outline-secondary' ?>">Approved</a>
                        <a href="social-queue.php?status=posted" class="btn btn-sm <?= $filterStatus === 'posted' ? 'btn-primary' : 'btn-outline-secondary' ?>">Posted</a>
                        <a href="social-queue.php?status=failed" class="btn btn-sm <?= $filterStatus === 'failed' ? 'btn-primary' : 'btn-outline-secondary' ?>">Failed</a>
                        <div class="vr mx-2"></div>
                        <span class="text-muted small">Platform:</span>
                        <select id="platformFilter" class="form-select form-select-sm d-inline-block w-auto" onchange="location.href='social-queue.php?status=<?= urlencode($filterStatus) ?>&platform='+this.value">
                            <option value="all" <?= $filterPlatform === 'all' ? 'selected' : '' ?>>All Platforms</option>
                            <option value="linkedin" <?= $filterPlatform === 'linkedin' ? 'selected' : '' ?>>LinkedIn</option>
                            <option value="x" <?= $filterPlatform === 'x' ? 'selected' : '' ?>>X (Twitter)</option>
                            <option value="devto" <?= $filterPlatform === 'devto' ? 'selected' : '' ?>>dev.to</option>
                            <option value="hashnode" <?= $filterPlatform === 'hashnode' ? 'selected' : '' ?>>Hashnode</option>
                        </select>
                    </div>
                </div>

                <!-- Job List Grouped By Blog -->
                <?php if (empty($groupedJobs)): ?>
                    <div class="white_card p-5 text-center">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4 class="text-dark">No social jobs found</h4>
                        <p class="text-muted">No posts match your current filter criteria.</p>
                        <a href="social-queue.php" class="btn btn-primary btn-sm">Reset Filters</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($groupedJobs as $bId => $group): ?>
                        <div class="social-card" id="blog-group-<?= $bId ?>">
                            <div class="blog-header d-flex flex-wrap justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-primary text-white rounded p-2 text-center" style="width: 48px; height: 48px;">
                                        <i class="fas fa-file-alt fa-lg mt-2"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 fw-bold text-dark">
                                            <?= htmlspecialchars($group['blog_title']) ?>
                                        </h5>
                                        <small class="text-muted">
                                            Blog ID #<?= $bId ?> &bull; Published: <?= date('d M Y, h:i A', strtotime($group['blog_created_at'])) ?> &bull; 
                                            <a href="/blog-detail.php?slug=<?= urlencode($group['blog_slug']) ?>" target="_blank" class="text-primary text-decoration-none">
                                                View Live Blog <i class="fas fa-external-link-alt fa-xs"></i>
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                <div class="mt-2 mt-md-0">
                                    <span class="badge bg-secondary"><?= count($group['jobs']) ?> platform job(s)</span>
                                </div>
                            </div>

                            <div class="job-list">
                                <?php foreach ($group['jobs'] as $job): 
                                    $p = (string)$job['platform'];
                                    $st = (string)$job['status'];
                                    $payload = !empty($job['payload']) ? json_decode((string)$job['payload'], true) : [];
                                    $xEnabled = !empty($payload['x_enabled']);
                                ?>
                                    <div class="job-item" id="job-row-<?= $job['id'] ?>">
                                        <div class="row g-3">
                                            <!-- Column 1: Platform & Status -->
                                            <div class="col-lg-2 col-md-3">
                                                <div class="d-flex flex-column gap-2">
                                                    <div>
                                                        <span class="platform-badge platform-<?= $p ?>">
                                                            <?php if ($p === 'linkedin'): ?><i class="fab fa-linkedin"></i> LinkedIn
                                                            <?php elseif ($p === 'x'): ?><i class="fab fa-x-twitter"></i> X (Twitter)
                                                            <?php elseif ($p === 'devto'): ?><i class="fab fa-dev"></i> dev.to
                                                            <?php elseif ($p === 'hashnode'): ?><i class="fas fa-feather"></i> Hashnode
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="status-badge status-<?= $st ?>" id="job-status-badge-<?= $job['id'] ?>">
                                                            <?= htmlspecialchars($st) ?>
                                                        </span>
                                                    </div>
                                                    <small class="text-muted">
                                                        Attempts: <strong id="attempts-<?= $job['id'] ?>"><?= (int)$job['attempts'] ?></strong>/3
                                                    </small>

                                                    <?php if ($p === 'x'): ?>
                                                        <div class="form-check form-switch mt-2">
                                                            <input class="form-check-input x-toggle-switch" type="checkbox" id="x_toggle_<?= $job['id'] ?>" data-job-id="<?= $job['id'] ?>" <?= $xEnabled ? 'checked' : '' ?>>
                                                            <label class="form-check-label small text-muted" for="x_toggle_<?= $job['id'] ?>">
                                                                Enable X Posting (Paid)
                                                            </label>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Column 2: Caption & Tags Editor -->
                                            <div class="col-lg-6 col-md-5">
                                                <div class="mb-2">
                                                    <label class="form-label small fw-bold text-muted mb-1">Caption / Hook Content:</label>
                                                    <textarea class="form-control caption-textarea" id="caption-<?= $job['id'] ?>" rows="3" <?= $st === 'posted' ? 'readonly' : '' ?>><?= htmlspecialchars($job['caption'] ?? '') ?></textarea>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-md-7">
                                                        <label class="form-label small fw-bold text-muted mb-1">Tags (Comma-separated, max 4):</label>
                                                        <input type="text" class="form-control form-control-sm" id="tags-<?= $job['id'] ?>" value="<?= htmlspecialchars($job['tags'] ?? '') ?>" <?= $st === 'posted' ? 'readonly' : '' ?>>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="form-label small fw-bold text-muted mb-1">Scheduled At:</label>
                                                        <input type="datetime-local" class="form-control form-control-sm" id="scheduled-at-<?= $job['id'] ?>" value="<?= date('Y-m-d\TH:i', strtotime($job['scheduled_at'])) ?>" <?= $st === 'posted' ? 'readonly' : '' ?>>
                                                    </div>
                                                </div>

                                                <!-- Error output if failed -->
                                                <?php if (!empty($job['error'])): ?>
                                                    <div class="alert alert-danger p-2 mt-2 mb-0 small" id="error-box-<?= $job['id'] ?>">
                                                        <i class="fas fa-exclamation-circle me-1"></i>
                                                        <strong>Error:</strong> <?= htmlspecialchars($job['error']) ?>
                                                    </div>
                                                <?php endif; ?>

                                                <!-- External URL if posted -->
                                                <?php if (!empty($job['external_url'])): ?>
                                                    <div class="alert alert-success p-2 mt-2 mb-0 small" id="success-box-<?= $job['id'] ?>">
                                                        <i class="fas fa-check-circle me-1"></i>
                                                        <strong>Live Post:</strong> 
                                                        <a href="<?= htmlspecialchars($job['external_url']) ?>" target="_blank" class="fw-bold text-success text-decoration-underline ms-1">
                                                            <?= htmlspecialchars($job['external_url']) ?> <i class="fas fa-external-link-alt fa-xs"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Column 3: Cover Image Preview -->
                                            <div class="col-lg-2 col-md-2 text-center">
                                                <label class="form-label small fw-bold text-muted mb-1 d-block">Cover Image:</label>
                                                <?php $cImg = !empty($job['cover_image_url']) ? $job['cover_image_url'] : 'assets/img/logo_icon.jpg'; ?>
                                                <img src="<?= htmlspecialchars($cImg) ?>" alt="Cover" class="cover-preview mb-1" id="cover-img-<?= $job['id'] ?>" onclick="window.open(this.src, '_blank')">
                                                <input type="text" class="form-control form-control-sm mt-1 text-center" id="cover-url-<?= $job['id'] ?>" value="<?= htmlspecialchars($job['cover_image_url'] ?? '') ?>" placeholder="Image URL" <?= $st === 'posted' ? 'readonly' : '' ?>>
                                            </div>

                                            <!-- Column 4: Actions -->
                                            <div class="col-lg-2 col-md-2 d-flex flex-column justify-content-center gap-2">
                                                <?php if ($st === 'draft'): ?>
                                                    <button class="btn btn-success btn-sm btn-approve" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-check me-1"></i> Approve
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm btn-save" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-save me-1"></i> Save Edits
                                                    </button>
                                                    <button class="btn btn-outline-info btn-sm btn-regenerate" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-robot me-1"></i> Regenerate AI
                                                    </button>
                                                    <button class="btn btn-primary btn-sm btn-publish-now" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-paper-plane me-1"></i> Post Now
                                                    </button>
                                                <?php elseif ($st === 'approved'): ?>
                                                    <button class="btn btn-warning btn-sm btn-reject" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-undo me-1"></i> Revert to Draft
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm btn-save" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-save me-1"></i> Save Edits
                                                    </button>
                                                    <button class="btn btn-primary btn-sm btn-publish-now" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-paper-plane me-1"></i> Post Now
                                                    </button>
                                                <?php elseif ($st === 'failed'): ?>
                                                    <button class="btn btn-warning btn-sm btn-retry" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-redo me-1"></i> Retry Job
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm btn-save" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-save me-1"></i> Save Edits
                                                    </button>
                                                    <button class="btn btn-outline-info btn-sm btn-regenerate" data-job-id="<?= $job['id'] ?>">
                                                        <i class="fas fa-robot me-1"></i> Regenerate AI
                                                    </button>
                                                <?php elseif ($st === 'posted'): ?>
                                                    <button class="btn btn-outline-secondary btn-sm" disabled>
                                                        <i class="fas fa-check-double me-1"></i> Published
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <!-- Custom AJAX Handler Script -->
    <script>
    (function($) {
        'use strict';

        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const apiEndpoint = '../api/social-actions.php';

        function showToast(message, isSuccess = true) {
            const toast = $('#toastNotification');
            toast.removeClass('alert-success alert-danger')
                 .addClass(isSuccess ? 'alert-success' : 'alert-danger');
            $('#toastMessage').text(message);
            toast.stop(true, true).fadeIn(300);
            setTimeout(() => toast.fadeOut(400), 5000);
        }

        function sendAjax(action, data, onSuccess, buttonEl = null) {
            let originalHtml = '';
            if (buttonEl) {
                originalHtml = buttonEl.html();
                buttonEl.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
            }

            data.action = action;
            data.csrf_token = csrfToken;

            $.ajax({
                url: apiEndpoint,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        showToast(res.message, true);
                        if (typeof onSuccess === 'function') {
                            onSuccess(res);
                        }
                    } else {
                        showToast(res.message || 'Action failed.', false);
                    }
                },
                error: function(xhr) {
                    let errMsg = 'Network or server error occurred.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errMsg = xhr.responseJSON.message;
                    }
                    showToast(errMsg, false);
                },
                complete: function() {
                    if (buttonEl) {
                        buttonEl.prop('disabled', false).html(originalHtml);
                    }
                }
            });
        }

        // Save Edits
        $(document).on('click', '.btn-save', function(e) {
            e.preventDefault();
            const btn = $(this);
            const jobId = btn.data('job-id');
            const caption = $('#caption-' + jobId).val();
            const tags = $('#tags-' + jobId).val();
            const coverUrl = $('#cover-url-' + jobId).val();
            const scheduledAt = $('#scheduled-at-' + jobId).val();
            const xEnabled = $('#x_toggle_' + jobId).is(':checked') ? 1 : 0;

            sendAjax('update_job', {
                job_id: jobId,
                caption: caption,
                tags: tags,
                cover_image_url: coverUrl,
                scheduled_at: scheduledAt.replace('T', ' ') + ':00',
                x_enabled: xEnabled
            }, function(res) {
                if (coverUrl) {
                    $('#cover-img-' + jobId).attr('src', coverUrl);
                }
            }, btn);
        });

        // Approve Job
        $(document).on('click', '.btn-approve', function(e) {
            e.preventDefault();
            const btn = $(this);
            const jobId = btn.data('job-id');
            sendAjax('approve_job', { job_id: jobId }, function() {
                setTimeout(() => location.reload(), 1000);
            }, btn);
        });

        // Reject / Revert Job
        $(document).on('click', '.btn-reject', function(e) {
            e.preventDefault();
            const btn = $(this);
            const jobId = btn.data('job-id');
            sendAjax('reject_job', { job_id: jobId }, function() {
                setTimeout(() => location.reload(), 1000);
            }, btn);
        });

        // Retry Job
        $(document).on('click', '.btn-retry', function(e) {
            e.preventDefault();
            const btn = $(this);
            const jobId = btn.data('job-id');
            sendAjax('retry_job', { job_id: jobId }, function() {
                setTimeout(() => location.reload(), 1000);
            }, btn);
        });

        // Publish Now (Immediate Post)
        $(document).on('click', '.btn-publish-now', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure you want to publish this post immediately?')) return;
            const btn = $(this);
            const jobId = btn.data('job-id');
            sendAjax('publish_now', { job_id: jobId }, function(res) {
                setTimeout(() => location.reload(), 1200);
            }, btn);
        });

        // Regenerate AI Draft
        $(document).on('click', '.btn-regenerate', function(e) {
            e.preventDefault();
            if (!confirm('Regenerate caption and cover image using Gemini AI? Current unsaved edits will be overwritten.')) return;
            const btn = $(this);
            const jobId = btn.data('job-id');
            sendAjax('regenerate_gemini', { job_id: jobId }, function(res) {
                if (res.caption) $('#caption-' + jobId).val(res.caption);
                if (res.tags) $('#tags-' + jobId).val(res.tags);
                if (res.cover_image_url) {
                    $('#cover-url-' + jobId).val(res.cover_image_url);
                    $('#cover-img-' + jobId).attr('src', res.cover_image_url);
                }
            }, btn);
        });

        // Generate for existing blog
        $(document).on('click', '.btn-generate-blog', function(e) {
            e.preventDefault();
            const blogId = $(this).data('blog-id');
            const btn = $(this);
            sendAjax('generate_for_blog', { blog_id: blogId }, function() {
                setTimeout(() => location.reload(), 1200);
            }, btn);
        });

    })(jQuery);
    </script>
</body>
</html>
