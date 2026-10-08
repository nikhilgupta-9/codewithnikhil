<!-- =========================================
     TOOL SUITE GENERATION HISTORY DRAWER (CANVA STYLE)
     ========================================= -->
<div class="history-drawer-backdrop" id="historyDrawerBackdrop"></div>

<aside class="history-drawer" id="toolHistoryDrawer">
  <div class="history-drawer-header">
    <div>
      <h5 class="history-drawer-title">
        <i class="fa-solid fa-clock-rotate-left text-warning"></i> Generation History
      </h5>
      <small class="text-muted" style="font-size: 11px;">1-Click Restore, Re-open or Download</small>
    </div>
    <div class="d-flex align-items-center gap-2">
      <button type="button" class="btn btn-sm btn-outline-danger p-1 px-2 border-0" id="clearAllHistoryBtn" title="Clear all history">
        <i class="fa-solid fa-trash-can"></i>
      </button>
      <button type="button" class="btn btn-sm btn-outline-secondary text-white border-0" id="closeHistoryDrawerBtn" title="Close drawer">
        <i class="fa-solid fa-xmark fa-lg"></i>
      </button>
    </div>
  </div>

  <!-- Search & Filter Category Pills -->
  <div class="px-3 pt-3 pb-2 border-bottom border-secondary border-opacity-25">
    <div class="input-group input-group-sm mb-2">
      <span class="input-group-text bg-dark border-secondary text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
      <input type="text" id="drawerSearchInput" class="form-control bg-dark border-secondary text-white" placeholder="Search past invoices, QR codes, links...">
    </div>

    <div class="d-flex gap-1 overflow-auto pb-1" style="scrollbar-width: none;">
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill active" data-filter="all" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        All
      </button>
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill" data-filter="qr-code" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        QR Codes
      </button>
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill" data-filter="invoice" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        Invoices
      </button>
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill" data-filter="whatsapp-link" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        WhatsApp
      </button>
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill" data-filter="gst-calculator" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        GST &amp; Tax
      </button>
      <button type="button" class="btn btn-xs btn-outline-secondary history-filter-pill" data-filter="schema-generator" style="font-size: 11px; border-radius: 20px; white-space: nowrap;">
        Schema
      </button>
    </div>
  </div>

  <!-- Items Container (Populated via tool-app.js) -->
  <div class="history-drawer-body" id="historyDrawerItemsList">
    <div class="text-center py-5 text-muted">
      <i class="fa-solid fa-spinner fa-spin fa-2x mb-2 text-warning"></i>
      <div>Loading your generations...</div>
    </div>
  </div>
</aside>
