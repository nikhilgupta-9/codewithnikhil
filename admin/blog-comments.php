<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: auth/login.php");
    exit();
}

require_once dirname(__DIR__) . '/config/connect.php';

// Generate CSRF token
if (empty($_SESSION['comment_admin_csrf'])) {
    $_SESSION['comment_admin_csrf'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['comment_admin_csrf'];

$alertMessage = '';
$alertType = 'info';

// Handle Single / Bulk Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $submittedCsrf = $_POST['csrf_token'] ?? '';
    if (!hash_equals($csrfToken, $submittedCsrf)) {
        $alertMessage = 'Invalid security token. Please refresh.';
        $alertType = 'danger';
    } else {
        $action = $_POST['action'];
        $commentId = (int)($_POST['comment_id'] ?? 0);
        $selectedIds = $_POST['selected_ids'] ?? [];

        if (!empty($selectedIds) && is_array($selectedIds)) {
            // Bulk Actions
            $sanitizedIds = array_map('intval', $selectedIds);
            $idList = implode(',', $sanitizedIds);

            if ($action === 'bulk_approve') {
                $conn->query("UPDATE `blog_comments` SET `status` = 'approved' WHERE `id` IN ($idList)");
                $alertMessage = count($sanitizedIds) . ' comments approved successfully!';
                $alertType = 'success';
            } elseif ($action === 'bulk_spam') {
                $conn->query("UPDATE `blog_comments` SET `status` = 'spam' WHERE `id` IN ($idList)");
                $alertMessage = count($sanitizedIds) . ' comments marked as spam!';
                $alertType = 'warning';
            } elseif ($action === 'bulk_delete') {
                $conn->query("DELETE FROM `blog_comments` WHERE `id` IN ($idList)");
                $alertMessage = count($sanitizedIds) . ' comments permanently deleted!';
                $alertType = 'danger';
            }
        } elseif ($commentId > 0) {
            // Single Action
            if ($action === 'approve') {
                $stmt = $conn->prepare("UPDATE `blog_comments` SET `status` = 'approved' WHERE `id` = ?");
                $stmt->bind_param('i', $commentId);
                $stmt->execute();
                $stmt->close();
                $alertMessage = 'Comment approved and published!';
                $alertType = 'success';
            } elseif ($action === 'reject') {
                $stmt = $conn->prepare("UPDATE `blog_comments` SET `status` = 'rejected' WHERE `id` = ?");
                $stmt->bind_param('i', $commentId);
                $stmt->execute();
                $stmt->close();
                $alertMessage = 'Comment rejected.';
                $alertType = 'secondary';
            } elseif ($action === 'spam') {
                $stmt = $conn->prepare("UPDATE `blog_comments` SET `status` = 'spam' WHERE `id` = ?");
                $stmt->bind_param('i', $commentId);
                $stmt->execute();
                $stmt->close();
                $alertMessage = 'Comment marked as spam.';
                $alertType = 'warning';
            } elseif ($action === 'delete') {
                $stmt = $conn->prepare("DELETE FROM `blog_comments` WHERE `id` = ?");
                $stmt->bind_param('i', $commentId);
                $stmt->execute();
                $stmt->close();
                $alertMessage = 'Comment deleted permanently.';
                $alertType = 'danger';
            }
        }
    }
}

// Filter Status
$filterStatus = $_GET['status'] ?? 'all';

$sql = "SELECT c.*, b.title AS blog_title 
        FROM `blog_comments` c 
        LEFT JOIN `blogs` b ON c.blog_slug = b.slug_url 
        WHERE 1=1 ";

if (in_array($filterStatus, ['pending', 'approved', 'spam', 'rejected'], true)) {
    $escapedStatus = mysqli_real_escape_string($conn, $filterStatus);
    $sql .= "AND c.status = '$escapedStatus' ";
}

$sql .= "ORDER BY c.created_at DESC";
$result = $conn->query($sql);
$comments = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// Counts
$counts = ['all' => 0, 'pending' => 0, 'approved' => 0, 'spam' => 0, 'rejected' => 0];
$countRes = $conn->query("SELECT `status`, COUNT(*) as cnt FROM `blog_comments` GROUP BY `status`");
if ($countRes) {
    while ($r = $countRes->fetch_assoc()) {
        $st = $r['status'];
        if (isset($counts[$st])) {
            $counts[$st] = (int)$r['cnt'];
        }
        $counts['all'] += (int)$r['cnt'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Blog Comments Moderation - NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    <?php include "links.php"; ?>
    <style>
        .comment-text-box {
            max-width: 450px;
            font-size: 13.5px;
            line-height: 1.5;
            color: #334155;
            word-break: break-word;
        }
        .badge-pending { background-color: #f59e0b; color: #fff; }
        .badge-approved { background-color: #10b981; color: #fff; }
        .badge-spam { background-color: #ef4444; color: #fff; }
        .badge-rejected { background-color: #64748b; color: #fff; }
        .commenter-avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #104041;
            color: #ADFF1C;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
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

                <?php if (!empty($alertMessage)): ?>
                    <div class="alert alert-<?= $alertType ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-info-circle me-2"></i> <?= htmlspecialchars($alertMessage) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Page Header -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1 fw-bold text-dark"><i class="fas fa-comments text-primary me-2"></i>Blog Comments Moderation</h2>
                        <p class="text-muted mb-0">Review, verify, approve, and protect your blog against spam bots and malicious attacks.</p>
                    </div>
                    <div>
                        <a href="view-all-blog.php" class="btn btn-outline-secondary">
                            <i class="fas fa-blog me-1"></i> View Blogs
                        </a>
                    </div>
                </div>

                <!-- Status Filter Pills -->
                <div class="white_card p-3 mb-4">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="fw-bold text-muted me-2"><i class="fas fa-filter me-1"></i>Filter by:</span>
                        <a href="blog-comments.php?status=all" class="btn btn-sm <?= $filterStatus === 'all' ? 'btn-primary' : 'btn-outline-secondary' ?>">
                            All Comments <span class="badge bg-light text-dark ms-1"><?= $counts['all'] ?></span>
                        </a>
                        <a href="blog-comments.php?status=pending" class="btn btn-sm <?= $filterStatus === 'pending' ? 'btn-warning text-dark' : 'btn-outline-warning' ?>">
                            Pending Approval <span class="badge bg-warning text-dark ms-1"><?= $counts['pending'] ?></span>
                        </a>
                        <a href="blog-comments.php?status=approved" class="btn btn-sm <?= $filterStatus === 'approved' ? 'btn-success' : 'btn-outline-success' ?>">
                            Approved / Live <span class="badge bg-success ms-1"><?= $counts['approved'] ?></span>
                        </a>
                        <a href="blog-comments.php?status=spam" class="btn btn-sm <?= $filterStatus === 'spam' ? 'btn-danger' : 'btn-outline-danger' ?>">
                            Spam <span class="badge bg-danger ms-1"><?= $counts['spam'] ?></span>
                        </a>
                        <a href="blog-comments.php?status=rejected" class="btn btn-sm <?= $filterStatus === 'rejected' ? 'btn-secondary' : 'btn-outline-secondary' ?>">
                            Rejected <span class="badge bg-secondary ms-1"><?= $counts['rejected'] ?></span>
                        </a>
                    </div>
                </div>

                <!-- Comments Table with Bulk Form -->
                <div class="white_card mb_30">
                    <div class="white_card_header py-3 border-bottom">
                        <form method="POST" id="bulkActionForm" onsubmit="return confirmBulkAction();">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <select name="action" class="form-select form-select-sm w-auto" required>
                                        <option value="">Bulk Actions</option>
                                        <option value="bulk_approve">Approve Selected</option>
                                        <option value="bulk_spam">Mark Selected as Spam</option>
                                        <option value="bulk_delete">Delete Selected</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                </div>
                                <span class="text-muted small">Showing <?= count($comments) ?> comments</span>
                            </div>
                    </div>

                    <div class="white_card_body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 40px;" class="text-center">
                                            <input type="checkbox" id="selectAllCheckbox" onclick="toggleAllCheckboxes(this)">
                                        </th>
                                        <th>Author &amp; IP</th>
                                        <th>Comment &amp; Article</th>
                                        <th>Status</th>
                                        <th>Submitted Date</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($comments)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <i class="fas fa-inbox fa-3x mb-2 d-block opacity-50"></i>
                                                No comments found under this filter.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($comments as $c): 
                                            $st = (string)$c['status'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="selected_ids[]" value="<?= $c['id'] ?>" class="comment-checkbox">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="commenter-avatar-sm">
                                                            <?= strtoupper(mb_substr($c['name'], 0, 1)) ?>
                                                        </div>
                                                        <div>
                                                            <div class="fw-bold text-dark"><?= htmlspecialchars($c['name']) ?></div>
                                                            <small class="text-muted d-block">
                                                                <a href="mailto:<?= htmlspecialchars($c['email']) ?>" class="text-decoration-none text-muted">
                                                                    <i class="fas fa-envelope fa-xs"></i> <?= htmlspecialchars($c['email']) ?>
                                                                </a>
                                                            </small>
                                                            <?php if (!empty($c['website'])): ?>
                                                                <small class="text-muted d-block">
                                                                    <a href="<?= htmlspecialchars($c['website']) ?>" target="_blank" rel="nofollow noopener" class="text-primary text-decoration-none">
                                                                        <i class="fas fa-link fa-xs"></i> <?= htmlspecialchars(substr($c['website'], 0, 30)) ?>
                                                                    </a>
                                                                </small>
                                                            <?php endif; ?>
                                                            <?php if (!empty($c['ip_address'])): ?>
                                                                <small class="text-muted font-monospace" style="font-size:11px;">
                                                                    <i class="fas fa-network-wired fa-xs"></i> <?= htmlspecialchars($c['ip_address']) ?>
                                                                </small>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="comment-text-box mb-1">
                                                        <?= nl2br(htmlspecialchars($c['comment'])) ?>
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="fas fa-file-alt me-1"></i> In: 
                                                        <a href="/blog/<?= urlencode($c['blog_slug']) ?>/" target="_blank" class="fw-semibold text-primary text-decoration-none">
                                                            <?= htmlspecialchars($c['blog_title'] ?: $c['blog_slug']) ?>
                                                        </a>
                                                    </small>
                                                </td>
                                                <td>
                                                    <span class="badge badge-<?= $st ?> px-2 py-1 text-uppercase" style="font-size: 11px;">
                                                        <?= $st ?>
                                                    </span>
                                                </td>
                                                <td class="text-muted small">
                                                    <?= date('d M Y, h:i A', strtotime($c['created_at'])) ?>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-inline-flex gap-1">
                                                        <?php if ($st !== 'approved'): ?>
                                                            <button type="button" class="btn btn-sm btn-success" title="Approve & Publish" onclick="submitSingleAction('approve', <?= $c['id'] ?>)">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <?php if ($st !== 'spam'): ?>
                                                            <button type="button" class="btn btn-sm btn-warning text-dark" title="Mark as Spam" onclick="submitSingleAction('spam', <?= $c['id'] ?>)">
                                                                <i class="fas fa-shield-alt"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <?php if ($st !== 'rejected'): ?>
                                                            <button type="button" class="btn btn-sm btn-secondary" title="Reject" onclick="submitSingleAction('reject', <?= $c['id'] ?>)">
                                                                <i class="fas fa-ban"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <button type="button" class="btn btn-sm btn-danger" title="Delete Permanently" onclick="submitSingleAction('delete', <?= $c['id'] ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Hidden form for single actions -->
    <form id="singleActionForm" method="POST" style="display: none;">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
        <input type="hidden" name="action" id="singleActionInput" value="">
        <input type="hidden" name="comment_id" id="singleCommentIdInput" value="">
    </form>

    <?php include "footer.php"; ?>

    <script>
    function toggleAllCheckboxes(master) {
        const checkboxes = document.querySelectorAll('.comment-checkbox');
        checkboxes.forEach(cb => cb.checked = master.checked);
    }

    function confirmBulkAction() {
        const checked = document.querySelectorAll('.comment-checkbox:checked');
        if (checked.length === 0) {
            alert('Please select at least one comment to perform bulk action.');
            return false;
        }
        return confirm('Are you sure you want to perform this action on ' + checked.length + ' comment(s)?');
    }

    function submitSingleAction(action, commentId) {
        const confirmMsg = action === 'delete' ? 'Are you sure you want to delete this comment permanently?' :
                           action === 'spam' ? 'Mark this comment as spam?' :
                           action === 'approve' ? 'Approve and publish this comment?' : 'Reject this comment?';
        if (!confirm(confirmMsg)) return;

        document.getElementById('singleActionInput').value = action;
        document.getElementById('singleCommentIdInput').value = commentId;
        document.getElementById('singleActionForm').submit();
    }
    </script>
</body>
</html>
