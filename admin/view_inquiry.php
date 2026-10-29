<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db-conn.php";

// Admin Authentication Check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}

$success_msg = '';
$error_msg = '';

// Get Inquiry ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Handle Delete Action
if (isset($_POST['delete_inquiry']) || (isset($_GET['action']) && $_GET['action'] === 'delete')) {
    if ($id > 0) {
        $delStmt = $conn->prepare("DELETE FROM inquiries WHERE id = ?");
        $delStmt->bind_param("i", $id);
        if ($delStmt->execute()) {
            $delStmt->close();
            header("Location: new-leads.php?msg=" . urlencode("Inquiry #$id deleted successfully."));
            exit();
        } else {
            $error_msg = "Error deleting inquiry: " . $conn->error;
        }
        $delStmt->close();
    }
}

// Handle Status Update
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['update_status'])) {
    $new_status = trim($_POST['status'] ?? '');
    $allowed_statuses = ['new', 'read', 'contacted', 'in_progress', 'converted', 'closed'];
    if (in_array($new_status, $allowed_statuses, true)) {
        $updateStmt = $conn->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
        $updateStmt->bind_param("si", $new_status, $id);
        if ($updateStmt->execute()) {
            $success_msg = "Status successfully updated to <strong>" . htmlspecialchars(ucfirst(str_replace('_', ' ', $new_status))) . "</strong>.";
        } else {
            $error_msg = "Failed to update status: " . $conn->error;
        }
        $updateStmt->close();
    }
}

// Fetch Inquiry Details
$inquiry = null;
if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM inquiries WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $inquiry = $result->fetch_assoc();
        
        // Auto-mark as read if it is currently 'new'
        if ($inquiry['status'] === 'new' && !isset($_POST['update_status'])) {
            $readStmt = $conn->prepare("UPDATE inquiries SET status = 'read' WHERE id = ?");
            if ($readStmt) {
                $readStmt->bind_param("i", $id);
                $readStmt->execute();
                $readStmt->close();
                $inquiry['status'] = 'read';
            }
        }
    }
    $stmt->close();
}

// Fetch Previous and Next Inquiry IDs for quick navigation
$prev_id = null;
$next_id = null;
if ($id > 0) {
    $qPrev = $conn->prepare("SELECT id FROM inquiries WHERE id < ? ORDER BY id DESC LIMIT 1");
    if ($qPrev) {
        $qPrev->bind_param("i", $id);
        $qPrev->execute();
        $resP = $qPrev->get_result();
        if ($r = $resP->fetch_assoc()) $prev_id = $r['id'];
        $qPrev->close();
    }

    $qNext = $conn->prepare("SELECT id FROM inquiries WHERE id > ? ORDER BY id ASC LIMIT 1");
    if ($qNext) {
        $qNext->bind_param("i", $id);
        $qNext->execute();
        $resN = $qNext->get_result();
        if ($r = $resN->fetch_assoc()) $next_id = $r['id'];
        $qNext->close();
    }
}

// Prepare WhatsApp & Email links
$wa_url = '';
$mailto_url = '';
$tel_url = '';
$initials = 'CU';

if ($inquiry) {
    // Client initials
    $name_parts = explode(' ', trim($inquiry['name'] ?? ''));
    if (count($name_parts) >= 2) {
        $initials = strtoupper(substr($name_parts[0], 0, 1) . substr($name_parts[1], 0, 1));
    } elseif (!empty($name_parts[0])) {
        $initials = strtoupper(substr($name_parts[0], 0, 2));
    }

    // Phone / WhatsApp
    $raw_phone = preg_replace('/[^0-9]/', '', $inquiry['phone'] ?? '');
    $wa_phone = $raw_phone;
    if (strlen($wa_phone) === 10) {
        $wa_phone = '91' . $wa_phone; // default India code if 10-digit
    }
    $wa_msg = "Hello " . $inquiry['name'] . ", thank you for contacting NikhilWorks regarding \"" . ($inquiry['subject'] ?? 'your project inquiry') . "\". I would be happy to discuss your requirements and assist you.";
    $wa_url = "https://wa.me/" . $wa_phone . "?text=" . rawurlencode($wa_msg);
    $tel_url = "tel:" . preg_replace('/[^\+0-9]/', '', $inquiry['phone'] ?? '');

    // Mailto
    $mail_sub = "Re: " . ($inquiry['subject'] ?: 'Your Inquiry on NikhilWorks');
    $mail_body = "Hi " . $inquiry['name'] . ",\n\nThank you for reaching out through NikhilWorks. I have reviewed your inquiry regarding:\n\"" . $inquiry['subject'] . "\"\n\n";
    $mailto_url = "mailto:" . rawurlencode($inquiry['email']) . "?subject=" . rawurlencode($mail_sub) . "&body=" . rawurlencode($mail_body);
}

// Status Badge Styling Helper
function getStatusBadgeClass($status) {
    switch (strtolower($status)) {
        case 'new':
            return 'bg-primary text-white';
        case 'read':
            return 'bg-info text-white';
        case 'contacted':
            return 'bg-warning text-dark';
        case 'in_progress':
            return 'bg-secondary text-white';
        case 'converted':
            return 'bg-success text-white';
        case 'closed':
            return 'bg-dark text-white';
        default:
            return 'bg-light text-dark border';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $inquiry ? 'Inquiry #' . $inquiry['id'] . ' - ' . htmlspecialchars($inquiry['name']) : 'Inquiry Details' ?> | NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">

    <?php include "links.php"; ?>

    <style>
        .inquiry-avatar {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        .message-content-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 22px;
            font-size: 15px;
            line-height: 1.7;
            color: #1e293b;
            white-space: pre-wrap;
            word-break: break-word;
        }
        .detail-card {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border: 1px solid #edf2f7;
            margin-bottom: 24px;
            overflow: hidden;
        }
        .detail-card-header {
            padding: 16px 22px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
        }
        .detail-card-body {
            padding: 22px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .contact-item:last-child {
            border-bottom: none;
        }
        .contact-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
            font-size: 16px;
        }
        .copy-btn {
            padding: 2px 8px;
            font-size: 11px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .copy-btn:hover {
            background: #0d6efd;
            color: #fff;
        }
        @media print {
            .sidebar, .dashboard_part .header_iner, .footer_part, .no-print, .btn, .breadcrumb, #back-top {
                display: none !important;
            }
            .main_content {
                margin-left: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            .main_content_iner {
                padding: 0 !important;
            }
            .detail-card {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                break-inside: avoid;
            }
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

                <!-- Alert Messages -->
                <?php if (!empty($success_msg)): ?>
                    <div class="alert alert-success alert-dismissible fade show no-print mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?= $success_msg ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($error_msg)): ?>
                    <div class="alert alert-danger alert-dismissible fade show no-print mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i><?= $error_msg ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Top Navigation & Action Controls -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 no-print gap-3">
                    <div>
                        <a href="new-leads.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                            <i class="fas fa-arrow-left me-1"></i> Back to All Leads
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <?php if ($prev_id): ?>
                            <a href="view_inquiry.php?id=<?= $prev_id ?>" class="btn btn-light btn-sm border" title="Previous Inquiry (#<?= $prev_id ?>)">
                                <i class="fas fa-chevron-left me-1"></i> Prev
                            </a>
                        <?php endif; ?>

                        <?php if ($next_id): ?>
                            <a href="view_inquiry.php?id=<?= $next_id ?>" class="btn btn-light btn-sm border" title="Next Inquiry (#<?= $next_id ?>)">
                                Next <i class="fas fa-chevron-right ms-1"></i>
                            </a>
                        <?php endif; ?>

                        <button type="button" onclick="window.print()" class="btn btn-light btn-sm border ms-2">
                            <i class="fas fa-print me-1"></i> Print
                        </button>

                        <?php if ($inquiry): ?>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this customer inquiry? This cannot be undone.');">
                                <input type="hidden" name="delete_inquiry" value="1">
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!$inquiry): ?>
                    <!-- Inquiry Not Found State -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="detail-card text-center py-5">
                                <div class="mb-3">
                                    <i class="fas fa-folder-open text-muted" style="font-size: 64px;"></i>
                                </div>
                                <h3 class="fw-bold text-dark">Inquiry Not Found</h3>
                                <p class="text-muted mb-4">
                                    We couldn't find an inquiry with ID <strong>#<?= $id ?></strong>. It may have been deleted or the link is incorrect.
                                </p>
                                <a href="new-leads.php" class="btn btn-primary px-4 rounded-pill">
                                    <i class="fas fa-list me-2"></i> View Customer Inquiries List
                                </a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>

                    <!-- Header Banner -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="detail-card p-4">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="inquiry-avatar">
                                            <?= $initials ?>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                <h3 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($inquiry['name']) ?></h3>
                                                <span class="badge rounded-pill <?= getStatusBadgeClass($inquiry['status']) ?> px-3 py-1">
                                                    <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $inquiry['status']))) ?>
                                                </span>
                                            </div>
                                            <p class="text-muted small mb-0 mt-1">
                                                <i class="far fa-clock me-1"></i> Submitted on <strong><?= date('l, F j, Y \a\t h:i A', strtotime($inquiry['created_at'])) ?></strong>
                                                &bull; Inquiry Reference #<?= $inquiry['id'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 no-print">
                                        <?php if (!empty($inquiry['phone'])): ?>
                                            <a href="<?= $wa_url ?>" target="_blank" class="btn btn-success btn-sm px-3 shadow-sm text-white">
                                                <i class="fab fa-whatsapp me-1 fa-lg"></i> WhatsApp
                                            </a>
                                            <a href="<?= $tel_url ?>" class="btn btn-outline-primary btn-sm px-3">
                                                <i class="fas fa-phone-alt me-1"></i> Call
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($inquiry['email'])): ?>
                                            <a href="<?= $mailto_url ?>" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                <i class="fas fa-envelope me-1"></i> Reply via Email
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Grid Content -->
                    <div class="row">
                        <!-- Left Column: Message Details -->
                        <div class="col-lg-8">
                            <!-- Card: Subject & Message Body -->
                            <div class="detail-card">
                                <div class="detail-card-header d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold mb-0 text-dark">
                                        <i class="fas fa-comment-alt text-primary me-2"></i> Inquiry Details
                                    </h5>
                                    <button class="btn btn-outline-secondary btn-sm copy-btn no-print" onclick="copyInquiryText()">
                                        <i class="far fa-copy me-1"></i> Copy Details
                                    </button>
                                </div>
                                <div class="detail-card-body">
                                    <!-- Subject / Service -->
                                    <div class="mb-4">
                                        <label class="text-muted text-uppercase small fw-bold mb-1" style="letter-spacing: 0.5px;">Subject / Project Scope</label>
                                        <h4 class="fw-bold text-dark mt-1" id="inqSubject">
                                            <?= htmlspecialchars($inquiry['subject'] ?: 'No Subject Specified') ?>
                                        </h4>
                                    </div>

                                    <!-- Message Content -->
                                    <div class="mb-3">
                                        <label class="text-muted text-uppercase small fw-bold mb-2" style="letter-spacing: 0.5px;">Client Message</label>
                                        <div class="message-content-box" id="inqMessage">
<?= htmlspecialchars($inquiry['message'] ?: 'No message provided.') ?>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center text-muted small mt-3 pt-2 border-top">
                                        <span>
                                            <i class="fas fa-file-alt me-1"></i> Character Count: <strong><?= strlen($inquiry['message'] ?? '') ?></strong>
                                        </span>
                                        <span>
                                            <i class="fas fa-font me-1"></i> Word Count: <strong><?= str_word_count($inquiry['message'] ?? '') ?></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Quick Contact Responses -->
                            <div class="detail-card no-print">
                                <div class="detail-card-header">
                                    <h5 class="fw-bold mb-0 text-dark">
                                        <i class="fas fa-bolt text-warning me-2"></i> Fast Communication
                                    </h5>
                                </div>
                                <div class="detail-card-body">
                                    <p class="text-muted small mb-3">
                                        Quickly connect with the client across direct communication channels to maximize lead conversion rate:
                                    </p>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <a href="<?= $wa_url ?>" target="_blank" class="btn btn-outline-success w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                                                <i class="fab fa-whatsapp fa-lg text-success"></i>
                                                <span class="fw-semibold">WhatsApp Chat</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= $mailto_url ?>" class="btn btn-outline-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                                <span class="fw-semibold">Email Client</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= $tel_url ?>" class="btn btn-outline-info w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                                                <i class="fas fa-phone-alt fa-lg text-info"></i>
                                                <span class="fw-semibold">Phone Call</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Customer Info & Status Manager -->
                        <div class="col-lg-4">
                            <!-- Card: Client Contact Info -->
                            <div class="detail-card">
                                <div class="detail-card-header">
                                    <h5 class="fw-bold mb-0 text-dark">
                                        <i class="fas fa-user-circle text-primary me-2"></i> Client Information
                                    </h5>
                                </div>
                                <div class="detail-card-body">
                                    <!-- Full Name -->
                                    <div class="contact-item">
                                        <div class="contact-icon bg-light text-primary">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="text-muted small">Full Name</div>
                                            <div class="fw-bold text-dark" id="inqName"><?= htmlspecialchars($inquiry['name']) ?></div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="contact-item">
                                        <div class="contact-icon bg-light text-info">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="text-muted small">Email Address</div>
                                            <div class="fw-bold text-dark text-truncate">
                                                <a href="<?= $mailto_url ?>" class="text-decoration-none text-dark" id="inqEmail">
                                                    <?= htmlspecialchars($inquiry['email']) ?>
                                                </a>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-secondary btn-sm copy-btn ms-2 no-print" onclick="copyToClipboard('<?= addslashes($inquiry['email']) ?>', this)">
                                            Copy
                                        </button>
                                    </div>

                                    <!-- Phone -->
                                    <div class="contact-item">
                                        <div class="contact-icon bg-light text-success">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="text-muted small">Phone Number</div>
                                            <div class="fw-bold text-dark">
                                                <a href="<?= $tel_url ?>" class="text-decoration-none text-dark" id="inqPhone">
                                                    <?= htmlspecialchars($inquiry['phone'] ?: 'Not Provided') ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php if (!empty($inquiry['phone'])): ?>
                                            <button class="btn btn-outline-secondary btn-sm copy-btn ms-2 no-print" onclick="copyToClipboard('<?= addslashes($inquiry['phone']) ?>', this)">
                                                Copy
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Received Date -->
                                    <div class="contact-item">
                                        <div class="contact-icon bg-light text-secondary">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="text-muted small">Date Received</div>
                                            <div class="fw-bold text-dark"><?= date('M d, Y', strtotime($inquiry['created_at'])) ?></div>
                                            <div class="text-muted small"><?= date('h:i:s A (T)', strtotime($inquiry['created_at'])) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Status Manager -->
                            <div class="detail-card no-print">
                                <div class="detail-card-header">
                                    <h5 class="fw-bold mb-0 text-dark">
                                        <i class="fas fa-tasks text-info me-2"></i> Lead Pipeline Status
                                    </h5>
                                </div>
                                <div class="detail-card-body">
                                    <form method="POST" action="">
                                        <input type="hidden" name="update_status" value="1">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small fw-bold">Update Lead Status</label>
                                            <select name="status" class="form-select">
                                                <option value="new" <?= $inquiry['status'] === 'new' ? 'selected' : '' ?>>New (Unreviewed)</option>
                                                <option value="read" <?= $inquiry['status'] === 'read' ? 'selected' : '' ?>>Read (Under Review)</option>
                                                <option value="contacted" <?= $inquiry['status'] === 'contacted' ? 'selected' : '' ?>>Contacted (Replied)</option>
                                                <option value="in_progress" <?= $inquiry['status'] === 'in_progress' ? 'selected' : '' ?>>In Progress (Proposal Sent)</option>
                                                <option value="converted" <?= $inquiry['status'] === 'converted' ? 'selected' : '' ?>>Converted (Client Won)</option>
                                                <option value="closed" <?= $inquiry['status'] === 'closed' ? 'selected' : '' ?>>Closed (Not Interested)</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-save me-1"></i> Save Status
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Card: Best Practices & Tips -->
                            <div class="detail-card no-print bg-light border-0">
                                <div class="detail-card-body">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="fas fa-lightbulb text-warning"></i>
                                        <span class="fw-bold text-dark small">Conversion Tip</span>
                                    </div>
                                    <p class="text-muted small mb-0">
                                        Reaching out within <strong>15 minutes</strong> increases lead qualification chances by up to <strong>7x</strong>. Use WhatsApp or direct call for rapid engagement.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    <script>
        function copyToClipboard(text, btnElement) {
            navigator.clipboard.writeText(text).then(function() {
                const originalText = btnElement.innerText;
                btnElement.innerText = 'Copied!';
                btnElement.classList.add('btn-success');
                btnElement.classList.remove('btn-outline-secondary');
                setTimeout(function() {
                    btnElement.innerText = originalText;
                    btnElement.classList.remove('btn-success');
                    btnElement.classList.add('btn-outline-secondary');
                }, 2000);
            }).catch(function(err) {
                alert('Could not copy text: ' + err);
            });
        }

        function copyInquiryText() {
            const name = document.getElementById('inqName') ? document.getElementById('inqName').innerText : '';
            const email = document.getElementById('inqEmail') ? document.getElementById('inqEmail').innerText : '';
            const phone = document.getElementById('inqPhone') ? document.getElementById('inqPhone').innerText : '';
            const subject = document.getElementById('inqSubject') ? document.getElementById('inqSubject').innerText : '';
            const message = document.getElementById('inqMessage') ? document.getElementById('inqMessage').innerText : '';

            const summary = "--- NikhilWorks Inquiry #<?= $inquiry ? $inquiry['id'] : '' ?> ---\n" +
                            "Client: " + name + "\n" +
                            "Email: " + email + "\n" +
                            "Phone: " + phone + "\n" +
                            "Subject: " + subject + "\n\n" +
                            "Message:\n" + message;

            navigator.clipboard.writeText(summary).then(function() {
                alert('Inquiry summary copied to clipboard!');
            }).catch(function(err) {
                alert('Failed to copy: ' + err);
            });
        }
    </script>

    <?php include "footer.php"; ?>
