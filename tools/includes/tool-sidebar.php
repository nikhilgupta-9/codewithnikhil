<?php
if (!isset($site)) {
    require_once dirname(dirname(__DIR__)) . '/config/connect.php';
}
$currentTool = $currentTool ?? '';
?>
<!-- CANVA-STYLE LEFT APP SIDEBAR -->
<aside class="app-sidebar" id="appSidebar">
  <div>
    <div class="sidebar-section-title">Suite Workspace</div>
    <ul class="sidebar-nav-list">
      <li>
        <a href="<?= $site ?>free-tools/" class="sidebar-nav-link <?= empty($currentTool) ? 'active' : '' ?>">
          <span><i class="fa-solid fa-border-all"></i> All Tools Suite</span>
          <span class="nav-count-pill">14</span>
        </a>
      </li>
      <li>
        <a href="#" class="sidebar-nav-link" id="sidebarHistoryLink">
          <span><i class="fa-solid fa-clock-rotate-left text-warning"></i> My History</span>
          <span class="nav-count-pill" id="sidebarHistoryCount">0</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-title">Marketing &amp; Social</div>
    <ul class="sidebar-nav-list">
      <li>
        <a href="<?= $site ?>tools/whatsapp-link/" class="sidebar-nav-link <?= $currentTool === 'whatsapp-link' ? 'active' : '' ?>">
          <span><i class="fa-brands fa-whatsapp text-success"></i> WhatsApp Link</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/qr-code/" class="sidebar-nav-link <?= $currentTool === 'qr-code' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-qrcode text-info"></i> QR Code Studio</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/meta-preview/" class="sidebar-nav-link <?= $currentTool === 'meta-preview' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-tags text-purple" style="color: #c084fc;"></i> Meta &amp; SERP</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-title">Finance &amp; Billing</div>
    <ul class="sidebar-nav-list">
      <li>
        <a href="<?= $site ?>tools/invoice/" class="sidebar-nav-link <?= $currentTool === 'invoice' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-file-invoice-dollar text-success"></i> Invoice Maker</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/gst-calculator/" class="sidebar-nav-link <?= $currentTool === 'gst-calculator' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-calculator text-warning"></i> GST Calculator</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/profit-calculator/" class="sidebar-nav-link <?= $currentTool === 'profit-calculator' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-chart-line text-primary"></i> Profit Margin</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>website-cost-calculator/" class="sidebar-nav-link <?= $currentTool === 'website-cost-calculator' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-laptop-code text-info"></i> Cost Estimator</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-section-title">SEO &amp; Utilities</div>
    <ul class="sidebar-nav-list">
      <li>
        <a href="<?= $site ?>seo-auditor/" class="sidebar-nav-link <?= $currentTool === 'seo-auditor' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-magnifying-glass-chart text-warning"></i> Free SEO Audit</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/schema-generator/" class="sidebar-nav-link <?= $currentTool === 'schema-generator' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-code text-cyan" style="color: #22d3ee;"></i> Schema JSON-LD</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/pagespeed/" class="sidebar-nav-link <?= $currentTool === 'pagespeed' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-gauge-high text-danger"></i> PageSpeed Insights</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/index-checker/" class="sidebar-nav-link <?= $currentTool === 'index-checker' ? 'active' : '' ?>">
          <span><i class="fa-brands fa-google text-primary"></i> Google Index</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/ssl-checker/" class="sidebar-nav-link <?= $currentTool === 'ssl-checker' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-shield-halved text-info"></i> SSL Inspector</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/privacy-policy/" class="sidebar-nav-link <?= $currentTool === 'privacy-policy' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-scale-balanced text-warning"></i> Privacy Policy</span>
        </a>
      </li>
      <li>
        <a href="<?= $site ?>tools/robots-validator/" class="sidebar-nav-link <?= $currentTool === 'robots-validator' ? 'active' : '' ?>">
          <span><i class="fa-solid fa-robot text-orange" style="color: #fb923c;"></i> Robots Validator</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Developer Card -->
  <div class="sidebar-pro-card">
    <div class="sidebar-pro-header">
      <div class="pro-avatar">NG</div>
      <div>
        <div class="pro-title">Nikhil Gupta</div>
        <div class="pro-subtitle">Full-Stack &amp; AI Architect</div>
      </div>
    </div>
    <p>Need custom automation, a CRM tool, or SaaS web application built for your business?</p>
    <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20custom%20software%2Ftool%20development." target="_blank" class="sidebar-pro-btn">
      <i class="fa-brands fa-whatsapp"></i> Chat with Nikhil
    </a>
  </div>
</aside>
