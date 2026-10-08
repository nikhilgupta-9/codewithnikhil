<?php
if (!isset($site)) {
    require_once dirname(dirname(__DIR__)) . '/config/connect.php';
}
?>
<!-- TOP APP BAR (CANVA-STYLE NAVIGATION) -->
<header class="app-topbar">
  <div class="d-flex align-items-center gap-2">
    <button type="button" class="mobile-menu-toggle" id="sidebarToggleBtn" aria-label="Toggle Sidebar Menu">
      <i class="fa-solid fa-bars"></i>
    </button>

    <a href="<?= $site ?>free-tools/" class="topbar-brand">
      <div class="brand-logo-badge">
        <img src="<?= $site ?>assets/img/logo/fav-logo5.png" alt="NikhilWorks Logo">
      </div>
      <div class="brand-title-group">
        <div class="brand-main-title">Nikhil<span>Works</span></div>
        <div class="brand-sub-badge">Tools Studio • Pro Suite</div>
      </div>
    </a>
  </div>

  <!-- Live Universal Search -->
  <div class="topbar-search-container">
    <i class="fa-solid fa-magnifying-glass topbar-search-icon"></i>
    <input type="text" id="appToolSearch" class="topbar-search-input" placeholder="Search 14+ tools or switch utility..." autocomplete="off" onkeypress="if(event.key === 'Enter'){ window.location.href='<?= $site ?>free-tools/?q=' + encodeURIComponent(this.value); }">
    <span class="topbar-search-kbd">/</span>
  </div>

  <!-- Topbar Actions -->
  <div class="topbar-actions">
    <!-- History Trigger Button -->
    <button type="button" class="topbar-btn topbar-btn-ghost" id="openHistoryBtn" title="View Generation History (Ctrl+H)">
      <i class="fa-solid fa-clock-rotate-left text-warning"></i>
      <span>History (<b id="topbarHistoryCount">0</b>)</span>
    </button>

    <!-- User Auth Profile Container (Populated dynamically via tool-app.js) -->
    <div id="topbarAuthContainer">
      <button type="button" class="topbar-btn topbar-btn-ghost" data-bs-toggle="modal" data-bs-target="#toolAuthModal">
        <i class="fa-regular fa-circle-user"></i>
        <span>Sign In</span>
      </button>
    </div>

    <!-- Return to Hub / Portfolio -->
    <a href="<?= $site ?>free-tools/" class="topbar-btn topbar-btn-ghost" title="All 14 Tools Hub">
      <i class="fa-solid fa-grip text-info"></i>
      <span>All Tools</span>
    </a>

    <a href="<?= $site ?>" class="topbar-btn topbar-btn-primary" title="Main Portfolio Website">
      <i class="fa-solid fa-arrow-left"></i>
      <span>Main Website</span>
    </a>
  </div>
</header>
