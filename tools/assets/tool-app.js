/**
 * NIKHILWORKS TOOLS STUDIO - CORE JAVASCRIPT CONTROLLER
 * Handles User Auth, Session Sync, Tool History, and UI Drawers.
 */

window.ToolsApp = (function($) {
  'use strict';

  let currentUser = null;
  const siteUrl = $('meta[name="site-url"]').attr('content') || '/nikhil-works/';

  // Toast notification
  function showToast(msg, iconClass = 'fa-solid fa-circle-check text-success') {
    let toast = $('#appToast');
    if (!toast.length) {
      $('body').append(`
        <div class="app-toast" id="appToast">
          <i class="${iconClass}" id="toastIcon"></i>
          <span id="toastMsg">${msg}</span>
        </div>
      `);
      toast = $('#appToast');
    }
    $('#toastMsg').text(msg);
    $('#toastIcon').attr('class', iconClass);
    toast.addClass('show');
    setTimeout(() => toast.removeClass('show'), 2800);
  }

  // 1. Auth Status Checker
  function checkAuthStatus() {
    $.ajax({
      url: siteUrl + 'api/tools/auth.php?action=status',
      method: 'GET',
      dataType: 'json',
      success: function(res) {
        if (res.status === 'success' && res.logged_in && res.user) {
          currentUser = res.user;
          renderUserUI(currentUser);
        } else {
          currentUser = null;
          renderGuestUI();
        }
        updateHistoryCount();
      }
    });
  }

  function renderUserUI(user) {
    const initials = (user.name || 'User').split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    const userHtml = `
      <div class="dropdown">
        <div class="user-profile-badge" data-bs-toggle="dropdown" aria-expanded="false" title="Account Details">
          <div class="user-avatar-circle">${initials}</div>
          <span class="d-none d-sm-inline font-weight-bold" style="font-size: 13px;">${escapeHtml(user.name)}</span>
          <i class="fa-solid fa-chevron-down ms-1" style="font-size: 10px; color: var(--text-dim);"></i>
        </div>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow-lg" style="background: #0e2b2c; border: 1px solid rgba(173, 255, 28, 0.2); border-radius: 12px;">
          <li class="px-3 py-2 border-bottom border-secondary">
            <div class="fw-bold text-white small">${escapeHtml(user.name)}</div>
            <div class="text-muted small" style="font-size: 11px;">${escapeHtml(user.email)}</div>
            <span class="badge bg-success text-dark mt-1" style="font-size: 10px;">Pro Free User</span>
          </li>
          <li>
            <a class="dropdown-item py-2" href="#" id="openHistoryMenuBtn">
              <i class="fa-solid fa-clock-rotate-left me-2 text-warning"></i> My Generation History
            </a>
          </li>
          <li>
            <a class="dropdown-item py-2" href="${siteUrl}free-tools/">
              <i class="fa-solid fa-layer-group me-2 text-info"></i> All 14 Tools Hub
            </a>
          </li>
          <li><hr class="dropdown-divider border-secondary my-1"></li>
          <li>
            <a class="dropdown-item py-2 text-danger" href="#" id="appLogoutBtn">
              <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Log Out
            </a>
          </li>
        </ul>
      </div>
    `;
    $('#topbarAuthContainer').html(userHtml);
  }

  function renderGuestUI() {
    const guestHtml = `
      <button type="button" class="topbar-btn topbar-btn-ghost" data-bs-toggle="modal" data-bs-target="#toolAuthModal" title="Sign In to Save Unlimited History">
        <i class="fa-regular fa-circle-user"></i>
        <span>Sign In / Join</span>
      </button>
    `;
    $('#topbarAuthContainer').html(guestHtml);
  }

  // 2. Save Generation to History (AJAX)
  function saveHistory(toolType, title, summaryText, payloadObj, previewData = '') {
    const payloadJson = typeof payloadObj === 'string' ? payloadObj : JSON.stringify(payloadObj);
    
    // Also keep in localStorage backup
    try {
      let localHist = JSON.parse(localStorage.getItem('tool_local_history') || '[]');
      localHist.unshift({
        tool_type: toolType,
        title: title,
        summary_text: summaryText,
        payload_json: payloadJson,
        preview_data: previewData,
        created_at: new Date().toISOString()
      });
      if (localHist.length > 50) localHist.pop();
      localStorage.setItem('tool_local_history', JSON.stringify(localHist));
    } catch(e) {}

    // Send to Server
    $.ajax({
      url: siteUrl + 'api/tools/history.php?action=save',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({
        tool_type: toolType,
        title: title,
        summary_text: summaryText,
        payload_json: payloadJson,
        preview_data: previewData
      }),
      success: function(res) {
        if (res.status === 'success') {
          showToast('Saved to your history! 📜', 'fa-solid fa-circle-check text-success');
          updateHistoryCount();
        }
      }
    });
  }

  // 3. Update History Count Badge in UI
  function updateHistoryCount() {
    $.ajax({
      url: siteUrl + 'api/tools/history.php?action=list&limit=1',
      method: 'GET',
      dataType: 'json',
      success: function(res) {
        if (res.status === 'success') {
          const count = res.total || 0;
          $('#topbarHistoryCount, #sidebarHistoryCount').text(count);
        }
      }
    });
  }

  // 4. Open History Slide-over Drawer
  function openHistoryDrawer(filterType = 'all') {
    let drawer = $('#toolHistoryDrawer');
    if (!drawer.length) {
      console.warn('History drawer container not found in DOM');
      return;
    }

    $('#historyDrawerBackdrop').addClass('show');
    drawer.addClass('show');
    loadHistoryList(filterType);
  }

  function closeHistoryDrawer() {
    $('#historyDrawerBackdrop').removeClass('show');
    $('#toolHistoryDrawer').removeClass('show');
  }

  // 5. Load History Items into Drawer
  function loadHistoryList(filterType = 'all', searchQuery = '') {
    const listContainer = $('#historyDrawerItemsList');
    listContainer.html(`
      <div class="text-center py-5 text-muted">
        <i class="fa-solid fa-spinner fa-spin fa-2x mb-2 text-warning"></i>
        <div>Loading your generations...</div>
      </div>
    `);

    $.ajax({
      url: siteUrl + 'api/tools/history.php',
      method: 'GET',
      data: {
        action: 'list',
        tool_type: filterType === 'all' ? '' : filterType,
        search: searchQuery,
        limit: 50
      },
      dataType: 'json',
      success: function(res) {
        if (res.status === 'success' && res.items && res.items.length > 0) {
          let html = '';
          res.items.forEach(item => {
            let toolBadgeClass = 'badge-popular';
            let toolIcon = 'fa-solid fa-cube';
            let toolUrl = siteUrl + 'tools/' + item.tool_type + '/';

            if (item.tool_type === 'qr-code') { toolIcon = 'fa-solid fa-qrcode'; toolBadgeClass = 'icon-teal'; }
            else if (item.tool_type === 'whatsapp-link') { toolIcon = 'fa-brands fa-whatsapp'; toolBadgeClass = 'icon-emerald'; }
            else if (item.tool_type === 'invoice') { toolIcon = 'fa-solid fa-file-invoice-dollar'; toolBadgeClass = 'icon-emerald'; }
            else if (item.tool_type === 'gst-calculator') { toolIcon = 'fa-solid fa-calculator'; toolBadgeClass = 'icon-amber'; }
            else if (item.tool_type === 'profit-calculator') { toolIcon = 'fa-solid fa-chart-line'; toolBadgeClass = 'icon-indigo'; }
            else if (item.tool_type === 'schema-generator') { toolIcon = 'fa-solid fa-code'; toolBadgeClass = 'icon-cyan'; }
            else if (item.tool_type === 'seo-auditor') { toolIcon = 'fa-solid fa-magnifying-glass-chart'; toolUrl = siteUrl + 'seo-auditor/'; }
            else if (item.tool_type === 'website-cost-calculator') { toolIcon = 'fa-solid fa-laptop-code'; toolUrl = siteUrl + 'website-cost-calculator/'; }

            html += `
              <div class="history-item-card" data-history-id="${item.id}" data-tool-type="${item.tool_type}">
                <div class="history-item-header">
                  <span class="history-item-badge"><i class="${toolIcon} me-1"></i> ${escapeHtml(item.tool_type)}</span>
                  <span class="history-item-date">${escapeHtml(item.time_ago)}</span>
                </div>
                <div class="history-item-title">${escapeHtml(item.title)}</div>
                ${item.summary_text ? `<p class="history-item-desc">${escapeHtml(item.summary_text)}</p>` : ''}
                
                <div class="history-item-actions">
                  <button type="button" class="btn-history-action btn-restore-history" data-history-id="${item.id}" data-tool-type="${item.tool_type}">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Restore Data
                  </button>
                  <a href="${toolUrl}" class="btn-history-action" title="Open Tool">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Open
                  </a>
                  <button type="button" class="btn-history-action btn-del btn-delete-history" data-history-id="${item.id}" title="Delete Record">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </div>
              </div>
            `;
          });
          listContainer.html(html);
        } else {
          listContainer.html(`
            <div class="text-center py-5 text-muted">
              <i class="fa-regular fa-folder-open fa-3x mb-3 opacity-50"></i>
              <h6 class="text-white">No history records yet</h6>
              <p class="small text-muted">Generate a QR code, Invoice, or Calculation to see your items here!</p>
            </div>
          `);
        }
      },
      error: function() {
        listContainer.html(`
          <div class="text-center py-4 text-danger small">
            Failed to load history records. Please try again.
          </div>
        `);
      }
    });
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

  // Initialize Global App Listeners
  $(document).ready(function() {
    checkAuthStatus();

    // Drawer triggers
    $(document).on('click', '#openHistoryBtn, #openHistoryMenuBtn, #sidebarHistoryLink', function(e) {
      e.preventDefault();
      const filter = $(this).data('tool-filter') || 'all';
      openHistoryDrawer(filter);
    });

    $(document).on('click', '#closeHistoryDrawerBtn, #historyDrawerBackdrop', function() {
      closeHistoryDrawer();
    });

    // History filter buttons inside drawer
    $(document).on('click', '.history-filter-pill', function() {
      $('.history-filter-pill').removeClass('active');
      $(this).addClass('active');
      const f = $(this).data('filter');
      const search = $('#drawerSearchInput').val();
      loadHistoryList(f, search);
    });

    $(document).on('input', '#drawerSearchInput', function() {
      const activeFilter = $('.history-filter-pill.active').data('filter') || 'all';
      loadHistoryList(activeFilter, $(this).val());
    });

    // Delete single history item
    $(document).on('click', '.btn-delete-history', function() {
      const id = $(this).data('history-id');
      const card = $(this).closest('.history-item-card');
      
      $.post(siteUrl + 'api/tools/history.php?action=delete', { id: id }, function(res) {
        if (res.status === 'success') {
          card.fadeOut(250, function() {
            $(this).remove();
            updateHistoryCount();
          });
          showToast('History item deleted');
        }
      });
    });

    // Clear all history
    $(document).on('click', '#clearAllHistoryBtn', function() {
      if (confirm('Are you sure you want to clear your entire history?')) {
        $.post(siteUrl + 'api/tools/history.php?action=clear_all', function() {
          loadHistoryList();
          updateHistoryCount();
          showToast('All history cleared');
        });
      }
    });

    // Restore History item payload into current tool
    $(document).on('click', '.btn-restore-history', function() {
      const id = $(this).data('history-id');
      const toolType = $(this).data('tool-type');
      
      $.get(siteUrl + 'api/tools/history.php?action=get&id=' + id, function(res) {
        if (res.status === 'success' && res.item) {
          try {
            const payload = typeof res.item.payload_json === 'string' ? JSON.parse(res.item.payload_json) : res.item.payload_json;
            // Dispatch event to page
            $(document).trigger('tools:restore-payload', [toolType, payload, res.item]);
            closeHistoryDrawer();
            showToast('Loaded historical generation! ⚡', 'fa-solid fa-bolt text-warning');
          } catch(e) {
            console.error('Payload parse error', e);
          }
        }
      });
    });

    // Auth Forms (AJAX Login)
    $(document).on('submit', '#toolLoginForm', function(e) {
      e.preventDefault();
      const form = $(this);
      const btn = form.find('button[type="submit"]');
      btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-1"></i> Signing in...');

      $.post(siteUrl + 'api/tools/auth.php?action=login', form.serialize(), function(res) {
        btn.prop('disabled', false).html('Sign In to Account');
        if (res.status === 'success') {
          currentUser = res.user;
          renderUserUI(currentUser);
          $('#toolAuthModal').modal('hide');
          form[0].reset();
          showToast(res.message);
          updateHistoryCount();
        } else {
          $('#loginAlert').removeClass('d-none').text(res.message || 'Login failed.');
        }
      }, 'json');
    });

    // Auth Forms (AJAX Register)
    $(document).on('submit', '#toolRegisterForm', function(e) {
      e.preventDefault();
      const form = $(this);
      const btn = form.find('button[type="submit"]');
      btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-1"></i> Creating account...');

      $.post(siteUrl + 'api/tools/auth.php?action=register', form.serialize(), function(res) {
        btn.prop('disabled', false).html('Create Free Pro Account');
        if (res.status === 'success') {
          currentUser = res.user;
          renderUserUI(currentUser);
          $('#toolAuthModal').modal('hide');
          form[0].reset();
          showToast(res.message);
          updateHistoryCount();
        } else {
          $('#registerAlert').removeClass('d-none').text(res.message || 'Registration failed.');
        }
      }, 'json');
    });

    // Logout
    $(document).on('click', '#appLogoutBtn', function(e) {
      e.preventDefault();
      $.get(siteUrl + 'api/tools/auth.php?action=logout', function() {
        currentUser = null;
        renderGuestUI();
        showToast('Logged out successfully');
        updateHistoryCount();
      });
    });

    // Keyboard Shortcuts
    $(document).on('keydown', function(e) {
      // Ctrl+H or Cmd+H toggles history drawer
      if ((e.ctrlKey || e.metaKey) && (e.key === 'h' || e.key === 'H') && !$(e.target).is('input, textarea')) {
        e.preventDefault();
        openHistoryDrawer();
      }
    });

    // Sidebar Mobile Toggle
    $(document).on('click', '#sidebarToggleBtn', function() {
      $('#appSidebar').toggleClass('show');
    });

    $(document).on('click', function(e) {
      if ($(window).width() < 992) {
        if (!$(e.target).closest('#appSidebar, #sidebarToggleBtn').length) {
          $('#appSidebar').removeClass('show');
        }
      }
    });
  });

  return {
    saveHistory: saveHistory,
    openHistoryDrawer: openHistoryDrawer,
    closeHistoryDrawer: closeHistoryDrawer,
    showToast: showToast,
    getCurrentUser: () => currentUser
  };

})(jQuery);
