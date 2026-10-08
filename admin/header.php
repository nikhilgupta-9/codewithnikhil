<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: auth/login.php");
    exit();
}

$adminUser = $_SESSION['admin_user'] ?? 'Admin';
$adminRole = ucfirst($_SESSION['admin_role'] ?? 'Super Admin');

// Get real counts for sidebar notification badges if $conn is available
$pendingCommentsCount = 0;
$pendingSocialCount = 0;
$newLeadsCount = 0;

if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    $q1 = $conn->query("SELECT COUNT(*) FROM `blog_comments` WHERE `status` = 'pending'");
    if ($q1) $pendingCommentsCount = (int)$q1->fetch_row()[0];

    $q2 = $conn->query("SELECT COUNT(*) FROM `social_jobs` WHERE `status` = 'draft'");
    if ($q2) $pendingSocialCount = (int)$q2->fetch_row()[0];

    $q3 = $conn->query("SELECT COUNT(*) FROM `inquiries` WHERE `status` = 'new'");
    if ($q3) $newLeadsCount = (int)$q3->fetch_row()[0];
}
?>

<!-- Mobile Sidebar Backdrop Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleMobileSidebar()"></div>

<nav class="sidebar vertical-scroll dark_sidebar ps-container ps-theme-default ps-active-y" id="adminSidebar">
    
    <!-- Brand & Admin Profile Profile -->
    <div class="admin-profile text-center py-4 border-bottom border-secondary border-opacity-25">
        <a href="index.php" class="text-decoration-none">
            <div class="position-relative d-inline-block">
                <img src="assets/img/logo_icon.jpg" alt="Admin" class="rounded-circle border border-2 border-primary shadow-sm" width="60" height="60" style="object-fit:cover;">
                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" style="width:12px;height:12px;"></span>
            </div>
            <h6 class="mt-2 text-white fw-bold mb-0"><?= htmlspecialchars($adminUser) ?></h6>
            <span class="badge bg-primary bg-opacity-25 text-info mt-1 px-2 py-1" style="font-size: 11px; letter-spacing: 0.5px;">
                <i class="fas fa-shield-alt me-1"></i><?= htmlspecialchars($adminRole) ?>
            </span>
        </a>
    </div>
    
    <!-- Instant Search Box -->
    <div class="search-box px-3 mt-3">
        <div class="input-group input-group-sm">
            <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-search"></i></span>
            <input type="text" id="sidebarSearch" class="form-control bg-dark border-secondary text-white" placeholder="Filter menus...">
        </div>
    </div>

    <!-- Navigation Menus -->
    <ul id="sidebar_menu" class="sidebar-menu mt-3">
        <li>
            <a href="index.php" class="active">
                <i class="fas fa-tachometer-alt" style="color: #38bdf8;"></i> 
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-label text-muted text-uppercase px-3 mt-3 mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px;">
            Content &amp; Automation
        </li>

        <!-- Blogs & Content -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-blog" style="color: #a855f7;"></i> 
                <span>Blogs &amp; News</span>
                <?php if ($pendingCommentsCount > 0): ?>
                    <span class="badge bg-warning text-dark ms-auto" style="font-size: 10px;"><?= $pendingCommentsCount ?></span>
                <?php endif; ?>
            </a>
            <ul>
                <li><a href="add-blog.php"><i class="fas fa-pen-nib me-1"></i> Add New Blog</a></li>
                <li><a href="view-all-blog.php"><i class="fas fa-list me-1"></i> Manage Blogs</a></li>
                <li>
                    <a href="blog-comments.php">
                        <i class="fas fa-comments me-1"></i> Comments 
                        <?php if ($pendingCommentsCount > 0): ?>
                            <span class="badge bg-warning text-dark ms-1"><?= $pendingCommentsCount ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Social Automation -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-share-alt" style="color: #3b82f6;"></i> 
                <span>Social Automation</span>
                <?php if ($pendingSocialCount > 0): ?>
                    <span class="badge bg-danger ms-auto" style="font-size: 10px;"><?= $pendingSocialCount ?></span>
                <?php endif; ?>
            </a>
            <ul>
                <li>
                    <a href="social-queue.php">
                        <i class="fas fa-tasks me-1"></i> Approval Queue
                        <?php if ($pendingSocialCount > 0): ?>
                            <span class="badge bg-danger ms-1"><?= $pendingSocialCount ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li><a href="social-oauth.php"><i class="fas fa-key me-1"></i> OAuth &amp; API Tokens</a></li>
            </ul>
        </li>

        <!-- Testimonials -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-quote-left" style="color: #10b981;"></i> 
                <span>Client Reviews</span>
            </a>
            <ul>
                <li><a href="add-testimonial.php"><i class="fas fa-plus me-1"></i> Add Testimonial</a></li>
                <li><a href="view-testimonials.php"><i class="fas fa-table me-1"></i> All Testimonials</a></li>
                <li><a href="testimonials-social.php"><i class="fas fa-magic me-1"></i> Quote-Cards &amp; Social</a></li>
            </ul>
        </li>

        <li class="menu-label text-muted text-uppercase px-3 mt-3 mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px;">
            Leads &amp; Client Management
        </li>

        <!-- Inquiries / Leads -->
        <li>
            <a href="new-leads.php">
                <i class="fas fa-envelope-open-text" style="color: #22c55e;"></i> 
                <span>Client Inquiries</span>
                <?php if ($newLeadsCount > 0): ?>
                    <span class="badge bg-success ms-auto"><?= $newLeadsCount ?> new</span>
                <?php endif; ?>
            </a>
        </li>

        <!-- Portfolio / Products -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-laptop-code" style="color: #f59e0b;"></i> 
                <span>Portfolio Projects</span>
            </a>
            <ul>
                <li><a href="add-products.php">Add New Project</a></li>
                <li><a href="show-products.php">Manage Projects</a></li>
                <li><a href="add-categories.php">Project Categories</a></li>
                <li><a href="view-categories.php">View Categories</a></li>
            </ul>
        </li>

        <li class="menu-label text-muted text-uppercase px-3 mt-3 mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px;">
            Site Settings &amp; Admin
        </li>

        <!-- Site Content & Pages -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-globe" style="color: #ec4899;"></i> 
                <span>Website Pages</span>
            </a>
            <ul>
                <li><a href="home-items.php">Site Logo</a></li>
                <li><a href="add-banner.php">Home Banners</a></li>
                <li><a href="about_us.php">About Us Content</a></li>
                <li><a href="add-about-us-section.php">About Sections</a></li>
                <li><a href="add_contact.php">Contact Details</a></li>
                <li><a href="add-gallery.php">Media Gallery</a></li>
            </ul>
        </li>

        <!-- Users & Security -->
        <li>
            <a class="has-arrow" href="#">
                <i class="fas fa-user-shield" style="color: #64748b;"></i> 
                <span>Administrators</span>
            </a>
            <ul>
                <li><a href="all-admin.php">All Admin Users</a></li>
                <li><a href="admin-create.php">Create New Admin</a></li>
            </ul>
        </li>

        <!-- Logout -->
        <li class="mt-4 mb-5 border-top border-secondary border-opacity-25 pt-2">
            <a href="auth/logout.php" class="text-danger">
                <i class="fas fa-sign-out-alt text-danger"></i> 
                <span>Log Out</span>
            </a>
        </li>
    </ul>
</nav>

<style>
/* Modern Dark Sidebar Styling & Transitions */
.sidebar.dark_sidebar {
    background: #07191b !important;
    border-right: 1px solid rgba(255, 255, 255, 0.08);
    transition: transform 0.3s ease, width 0.3s ease;
    z-index: 1050;
}
.sidebar-menu li a {
    color: #94a3b8;
    border-radius: 8px;
    margin: 2px 10px;
    padding: 10px 14px;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 10px;
}
.sidebar-menu li a:hover,
.sidebar-menu li a.active {
    background: rgba(16, 64, 65, 0.6) !important;
    color: #ADFF1C !important;
}
.sidebar-menu li a i {
    width: 20px;
    text-align: center;
    font-size: 15px;
}
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(3px);
    z-index: 1040;
    display: none;
    transition: opacity 0.3s ease;
}

/* Mobile Responsive Sidebar Off-canvas */
@media (max-width: 991px) {
    .sidebar.dark_sidebar {
        position: fixed !important;
        top: 0;
        left: -270px;
        width: 270px;
        height: 100vh;
        overflow-y: auto;
    }
    .sidebar.dark_sidebar.mobile-open {
        left: 0 !important;
        box-shadow: 10px 0 30px rgba(0, 0, 0, 0.5);
    }
    .sidebar-overlay.active {
        display: block !important;
    }
    .main_content {
        margin-left: 0 !important;
        width: 100% !important;
    }
}
</style>

<script>
// Sidebar search filter
document.getElementById('sidebarSearch').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    document.querySelectorAll('#sidebar_menu > li').forEach(item => {
        let text = item.textContent.toLowerCase();
        if (item.classList.contains('menu-label')) return;
        item.style.display = text.includes(filter) ? '' : 'none';
    });
});

// Mobile Sidebar Toggle
function toggleMobileSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    sidebar.classList.toggle('mobile-open');
    overlay.classList.toggle('active');
}
</script>