<!-- =========================================
     TOOL SUITE USER AUTH MODAL (LOGIN / REGISTER)
     ========================================= -->
<div class="modal fade" id="toolAuthModal" tabindex="-1" aria-labelledby="toolAuthModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content app-modal shadow-lg" style="background: #0b2224; border: 1px solid rgba(173, 255, 28, 0.35); border-radius: 20px; overflow: hidden;">
      
      <div class="modal-header border-0 pb-0 pt-4 px-4">
        <div class="d-flex align-items-center gap-3">
          <div class="brand-logo-badge" style="width: 38px; height: 38px;">
            <img src="<?= $site ?>assets/img/logo/fav-logo5.png" alt="Logo" style="max-width: 22px;">
          </div>
          <div>
            <h5 class="modal-title fw-extrabold text-white mb-0" id="toolAuthModalLabel">
              NikhilWorks <span style="color: var(--brand-lime);">Tools Studio</span>
            </h5>
            <small class="text-muted" style="font-size: 11px;">Access your generation history &amp; unlimited downloads</small>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body px-4 py-3">
        <!-- Auth Navigation Tabs -->
        <ul class="nav nav-pills nav-fill mb-3 p-1 rounded-3" style="background: rgba(255, 255, 255, 0.06);">
          <li class="nav-item">
            <button class="nav-link active py-2 fw-bold text-white" id="tab-login-btn" data-bs-toggle="pill" data-bs-target="#tab-login" type="button" style="border-radius: 8px; font-size: 13px;">
              <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link py-2 fw-bold text-white" id="tab-register-btn" data-bs-toggle="pill" data-bs-target="#tab-register" type="button" style="border-radius: 8px; font-size: 13px;">
              <i class="fa-solid fa-user-plus me-1"></i> Create Free Account
            </button>
          </li>
        </ul>

        <div class="tab-content">
          <!-- 1. Sign In Tab -->
          <div class="tab-pane fade show active" id="tab-login">
            <div id="loginAlert" class="alert alert-danger d-none py-2 small" role="alert"></div>
            
            <form id="toolLoginForm">
              <div class="mb-3">
                <label class="form-label text-light small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="name@company.com" required autocomplete="username">
              </div>
              <div class="mb-3">
                <label class="form-label text-light small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="current-password">
              </div>
              
              <button type="submit" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center mt-2" style="font-size: 14px;">
                Sign In to Account
              </button>
            </form>
          </div>

          <!-- 2. Register Tab -->
          <div class="tab-pane fade" id="tab-register">
            <div id="registerAlert" class="alert alert-danger d-none py-2 small" role="alert"></div>
            
            <form id="toolRegisterForm">
              <div class="mb-2">
                <label class="form-label text-light small fw-bold">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe" required autocomplete="name">
              </div>
              <div class="mb-2">
                <label class="form-label text-light small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
              </div>
              <div class="mb-2">
                <label class="form-label text-light small fw-bold">Mobile Number (Optional)</label>
                <input type="tel" name="mobile" class="form-control" placeholder="+91 9876543210" autocomplete="tel">
              </div>
              <div class="mb-3">
                <label class="form-label text-light small fw-bold">Create Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimum 6 characters" required autocomplete="new-password" minlength="6">
              </div>
              
              <button type="submit" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center mt-2" style="font-size: 14px;">
                Create Free Pro Account
              </button>
            </form>
          </div>
        </div>

        <div class="text-center mt-3 pt-2 border-top border-secondary border-opacity-25" style="font-size: 11.5px; color: var(--text-dim);">
          <i class="fa-solid fa-lock text-success me-1"></i> All generations are private and encrypted. No spam ever.
        </div>
      </div>

    </div>
  </div>
</div>
