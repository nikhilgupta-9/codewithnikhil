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

// CSRF token
if (empty($_SESSION['social_csrf_token'])) {
    $_SESSION['social_csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['social_csrf_token'];

$pdo = Database::getConnection();

// Fetch all testimonials
$stmt = $pdo->query("SELECT * FROM testimonials ORDER BY id DESC");
$testimonials = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Testimonial Social & Video Automation - NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    <?php include "links.php"; ?>
    <meta name="csrf-token" content="<?= htmlspecialchars($csrfToken) ?>">
    <style>
        .testi-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            margin-bottom: 24px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.04);
        }
        .testi-header {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 20px;
            border-radius: 12px 12px 0 0;
        }
        .quote-box {
            background: #f1f5f9;
            border-left: 4px solid #3b82f6;
            padding: 12px 16px;
            border-radius: 0 8px 8px 0;
            font-style: italic;
        }
        .preview-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
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

                <!-- Alert Toast -->
                <div id="toastNotification" class="alert alert-success alert-dismissible fade show shadow-lg" style="position: fixed; top: 20px; right: 20px; z-index: 99999; display: none;" role="alert">
                    <span id="toastMessage">Success</span>
                    <button type="button" class="btn-close" onclick="$('#toastNotification').fadeOut();"></button>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1 fw-bold text-dark"><i class="fas fa-quote-right text-primary me-2"></i>Testimonials & Video Automation</h2>
                        <p class="text-muted mb-0">Transform client reviews into high-converting quote-card graphics and social copy with strict GDPR/privacy consent enforcement.</p>
                    </div>
                    <div>
                        <a href="add-testimonial.php" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Review
                        </a>
                    </div>
                </div>

                <!-- Compliance Notice Banner -->
                <div class="alert alert-warning d-flex align-items-center mb-4">
                    <i class="fas fa-shield-alt fa-2x me-3 text-warning"></i>
                    <div>
                        <strong>Strict Legal Compliance (Consent Policy):</strong>
                        Posts or videos can <u>never</u> be generated or published without confirmed client consent (<code>consent_given = 1</code>). This rule is strictly enforced at the database and server-side API level.
                    </div>
                </div>

                <?php if (empty($testimonials)): ?>
                    <div class="white_card p-5 text-center">
                        <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                        <h4>No Testimonials Found</h4>
                        <p class="text-muted">Add customer reviews first to generate social quote cards.</p>
                        <a href="add-testimonial.php" class="btn btn-primary btn-sm">Add Testimonial</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($testimonials as $t): 
                        $hasConsent = (int)($t['consent_given'] ?? 0) === 1;
                        $proofUrl = (string)($t['consent_proof_url'] ?? '');
                    ?>
                        <div class="testi-card" id="testi-card-<?= $t['id'] ?>">
                            <div class="testi-header d-flex flex-wrap justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-dark text-white rounded-circle p-2 text-center" style="width: 44px; height: 44px; line-height: 28px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 fw-bold text-dark">
                                            <?= htmlspecialchars($t['client_name']) ?>
                                            <?php if (!empty($t['client_title'])): ?>
                                                <small class="text-muted">(<?= htmlspecialchars($t['client_title']) ?><?= !empty($t['client_company']) ? ' at ' . htmlspecialchars($t['client_company']) : '' ?>)</small>
                                            <?php endif; ?>
                                        </h5>
                                        <small class="text-muted">ID #<?= $t['id'] ?> &bull; Added: <?= date('d M Y', strtotime($t['created_at'])) ?></small>
                                    </div>
                                </div>
                                <div>
                                    <?php if ($hasConsent): ?>
                                        <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle me-1"></i> Consent Verified</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger px-3 py-2"><i class="fas fa-ban me-1"></i> No Consent (Locked)</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="p-4">
                                <div class="row g-4">
                                    <!-- Quote Column -->
                                    <div class="col-lg-6">
                                        <label class="form-label small fw-bold text-muted">Customer Quote / Review:</label>
                                        <div class="quote-box mb-3">
                                            <?= htmlspecialchars($t['testimonial_text']) ?>
                                        </div>

                                        <!-- Consent Form Controls -->
                                        <div class="card p-3 bg-light border">
                                            <h6 class="fw-bold small mb-2"><i class="fas fa-file-contract me-1"></i> Client Consent Verification:</h6>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input consent-switch" type="checkbox" id="consent_<?= $t['id'] ?>" data-id="<?= $t['id'] ?>" <?= $hasConsent ? 'checked' : '' ?>>
                                                <label class="form-check-label small fw-bold" for="consent_<?= $t['id'] ?>">
                                                    Customer has granted explicit permission to share on social media & marketing.
                                                </label>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <span class="input-group-text">Proof URL / Doc:</span>
                                                <input type="text" class="form-control" id="proof_<?= $t['id'] ?>" value="<?= htmlspecialchars($proofUrl) ?>" placeholder="e.g. Email confirmation link, signed form URL">
                                                <button class="btn btn-outline-primary btn-save-consent" data-id="<?= $t['id'] ?>">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions & Generated Assets Column -->
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <button class="btn btn-primary btn-sm btn-generate-social" data-id="<?= $t['id'] ?>" <?= !$hasConsent ? 'disabled title="Verify consent first"' : '' ?>>
                                                <i class="fas fa-magic me-1"></i> Generate AI Quote-Card & Copy
                                            </button>
                                            <?php if (!empty($t['video_url']) || !empty($t['video_file_path'])): ?>
                                                <button class="btn btn-danger btn-sm btn-upload-yt" data-id="<?= $t['id'] ?>" <?= !$hasConsent ? 'disabled' : '' ?>>
                                                    <i class="fab fa-youtube me-1"></i> Upload to YouTube (Private)
                                                </button>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Container for Generated Result -->
                                        <div id="result-box-<?= $t['id'] ?>" style="display: none;">
                                            <label class="form-label small fw-bold text-muted">Generated Quote Card:</label>
                                            <div class="mb-2">
                                                <img src="" id="quote-img-<?= $t['id'] ?>" class="preview-img mb-2" alt="Quote Card">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label small fw-bold text-muted">LinkedIn Post Copy:</label>
                                                <textarea class="form-control form-control-sm" id="li-copy-<?= $t['id'] ?>" rows="3"></textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label small fw-bold text-muted">X Hook:</label>
                                                <input type="text" class="form-control form-control-sm" id="x-copy-<?= $t['id'] ?>">
                                            </div>
                                        </div>

                                        <?php if (!empty($t['youtube_video_id'])): ?>
                                            <div class="alert alert-success p-2 small mt-2">
                                                <i class="fab fa-youtube text-danger me-1"></i>
                                                <strong>YouTube Video ID:</strong> <?= htmlspecialchars($t['youtube_video_id']) ?> 
                                                (Status: <?= htmlspecialchars($t['youtube_status']) ?>)
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <script>
    (function($) {
        'use strict';
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const apiEndpoint = '../api/testimonial-actions.php';

        function showToast(msg, isSuccess = true) {
            const t = $('#toastNotification');
            t.removeClass('alert-success alert-danger').addClass(isSuccess ? 'alert-success' : 'alert-danger');
            $('#toastMessage').text(msg);
            t.fadeIn(300);
            setTimeout(() => t.fadeOut(400), 5000);
        }

        // Save consent
        $(document).on('click', '.btn-save-consent', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const consent = $('#consent_' + id).is(':checked') ? 1 : 0;
            const proof = $('#proof_' + id).val();

            $.post(apiEndpoint, {
                action: 'update_consent',
                testimonial_id: id,
                consent_given: consent,
                consent_proof_url: proof,
                csrf_token: csrfToken
            }, function(res) {
                if (res.success) {
                    showToast(res.message, true);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast(res.message, false);
                }
            }, 'json').fail(function(xhr) {
                showToast(xhr.responseJSON ? xhr.responseJSON.message : 'Error updating consent', false);
            });
        });

        // Generate Social Quote Card & Captions
        $(document).on('click', '.btn-generate-social', function(e) {
            e.preventDefault();
            const btn = $(this);
            const id = btn.data('id');
            const originalHtml = btn.html();

            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Generating...');

            $.post(apiEndpoint, {
                action: 'generate_social',
                testimonial_id: id,
                csrf_token: csrfToken
            }, function(res) {
                if (res.success) {
                    showToast(res.message, true);
                    $('#quote-img-' + id).attr('src', res.quote_card_url);
                    $('#li-copy-' + id).val(res.linkedin_caption);
                    $('#x-copy-' + id).val(res.x_hook);
                    $('#result-box-' + id).fadeIn();
                } else {
                    showToast(res.message, false);
                }
            }, 'json').fail(function(xhr) {
                showToast(xhr.responseJSON ? xhr.responseJSON.message : 'Error generating content', false);
            }).always(function() {
                btn.prop('disabled', false).html(originalHtml);
            });
        });

    })(jQuery);
    </script>
</body>
</html>
