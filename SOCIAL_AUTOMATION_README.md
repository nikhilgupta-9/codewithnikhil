# NikhilWorks - Social Media Automation System

Enterprise-grade, automated multi-platform content publishing & scheduling engine built natively with PHP 8+, MySQL (PDO), and jQuery/AJAX inside `nikhilworks.com`.

---

## 🎯 System Overview

When a blog is published or imported into `nikhilworks.com`:
1. **Gemini AI Generation**: Generates 4 platform-tailored drafts (LinkedIn story post, X viral hook, dev.to & Hashnode tags and intro) + 1200x630 cover graphic.
2. **Strict Human-in-the-Loop Approval**: All generated jobs are stored as `draft` in the `social_jobs` table. Nothing is posted without approval.
3. **Approval Dashboard (`admin/social-queue.php`)**: Review, edit captions/tags, adjust scheduled publication times, toggle paid X tweets, approve, reject, regenerate with AI, or trigger immediate publication.
4. **CLI Background Worker (`cron/run_jobs.php`)**: Server cron runs every 10 minutes, acquires a file lock (`flock`), fetches approved jobs where `scheduled_at <= NOW()`, and safely dispatches to live APIs with automated retries (up to 3 attempts).
5. **Testimonials Automation (`admin/testimonials-social.php`)**: Generates branded quote-card graphics and social snippets for verified client reviews with **strict GDPR/privacy consent enforcement (`consent_given = 1`)**, plus optional YouTube video uploads.

---

## 📁 Architecture & File Structure

```
nikhil-works/
├── .env.example                     # Environment template with secret definitions
├── cron/
│   └── run_jobs.php                 # CLI-only cron dispatcher with file lock & retry handling
├── lib/
│   ├── Database.php                 # Singleton PDO connection wrapper (UTF8MB4, prepared statements)
│   ├── Env.php                      # Native .env parser (zero Composer dependencies)
│   ├── Lock.php                     # Non-blocking flock file concurrency guard
│   ├── Logger.php                   # 5MB rotating file logger (Asia/Kolkata timezone)
│   └── SocialDraftGenerator.php     # Multi-platform draft generator on blog creation
├── services/
│   ├── PlatformPublisherInterface.php # Unified publisher contract
│   ├── DevtoService.php             # Forem API publisher (canonical URLs & max 4 tags)
│   ├── HashnodeService.php          # GraphQL API v2 publisher
│   ├── LinkedinService.php          # LinkedIn REST Posts API (w_member_social & 60-day token check)
│   ├── XService.php                 # X (Twitter) API v2 with per-blog toggle (default OFF)
│   ├── GeminiService.php            # Gemini 2.5 Flash & Imagen 3 / GD canvas fallback generator
│   └── YouTubeService.php           # YouTube Data API v3 resumable uploader (privacyStatus: private)
├── api/
│   ├── social-actions.php           # Secure AJAX endpoint (Session, CSRF, Rate Limiting: 40/min)
│   └── testimonial-actions.php      # Testimonial actions with server-side consent validation
├── admin/
│   ├── social-queue.php             # Modern approval queue dashboard grouped by blog
│   ├── social-oauth.php             # OAuth connection manager & 60-day LinkedIn renewal
│   └── testimonials-social.php      # Testimonial quote card & video automation dashboard
├── migrations/
│   ├── 001_create_social_jobs.sql   # social_jobs table with UNIQUE(blog_id, platform)
│   ├── 002_create_testimonials.sql  # testimonials table with legal consent fields
│   ├── 003_create_social_tokens.sql # social_tokens table for OAuth lifecycle
│   └── 004_update_testimonials.sql  # Schema migration for existing testimonials
├── logs/
│   └── social_automation.log        # Automated audit log with rotating size limit
└── tests/
    └── test_all_phases.php          # Comprehensive 12-point automated test suite
```

---

## ⚙️ Platform Setup & API Credentials

### 1. Google Gemini API (AI Captions & Image Generator)
1. Go to [Google AI Studio](https://aistudio.google.com/app/apikey).
2. Generate an API Key.
3. Add to `.env`:
   ```env
   GEMINI_API_KEY=your_gemini_api_key_here
   GEMINI_TEXT_MODEL=gemini-2.5-flash
   GEMINI_IMAGE_MODEL=imagen-3.0-generate-002
   ```

### 2. dev.to (Forem API)
1. Log in to [dev.to](https://dev.to).
2. Go to **Settings > Extensions > DEV Community API Keys**.
3. Generate an API Key and set:
   ```env
   DEVTO_API_KEY=your_devto_api_key_here
   ```

### 3. Hashnode (GraphQL API v2)
1. Log in to [Hashnode Developer Settings](https://hashnode.com/settings/developer).
2. Generate a **Personal Access Token**.
3. Open your blog dashboard on Hashnode > **Settings > General** > copy **Publication ID**.
4. Set in `.env`:
   ```env
   HASHNODE_API_TOKEN=your_personal_access_token
   HASHNODE_PUBLICATION_ID=your_publication_id_here
   ```

### 4. LinkedIn REST API (Posts API)
1. Go to [LinkedIn Developer Portal](https://www.linkedin.com/developers/apps).
2. Create an App and link it to your company/personal page.
3. Under the **Products** tab, request access to **Share on LinkedIn** and **Sign In with LinkedIn using OpenID Connect**.
4. Set the OAuth 2.0 Redirect URL in the LinkedIn portal:
   `https://nikhilworks.com/admin/social-oauth.php?action=linkedin_callback`
5. Put Client ID and Client Secret in `.env`:
   ```env
   LINKEDIN_CLIENT_ID=your_linkedin_client_id
   LINKEDIN_CLIENT_SECRET=your_linkedin_client_secret
   ```
6. Open your admin panel at `https://nikhilworks.com/admin/social-oauth.php` and click **"Connect / Renew LinkedIn"**. It will automatically authorize, fetch your profile URN, and save the 60-day token.

### 5. X (Twitter) API v2
1. Go to [X Developer Portal](https://developer.x.com/en/portal/dashboard).
2. Create a Project & App with **Read and Write** permissions.
3. Under **User authentication settings**, set OAuth 2.0 or generate User Access Token.
4. Set in `.env`:
   ```env
   X_ACCESS_TOKEN=your_user_access_token_here
   X_DEFAULT_ENABLED=false
   ```
   *(Note: X tweet links default to OFF per blog to avoid unexpected usage costs. You can toggle X posting ON per blog in `admin/social-queue.php`)*.

### 6. YouTube Data API v3 (For Testimonial Videos)
1. Go to [Google Cloud Console](https://console.cloud.google.com/apis/credentials).
2. Enable **YouTube Data API v3**.
3. Create OAuth 2.0 Client ID and generate a refresh token.
4. Set in `.env`:
   ```env
   YOUTUBE_CLIENT_ID=your_google_client_id
   YOUTUBE_CLIENT_SECRET=your_google_client_secret
   YOUTUBE_REFRESH_TOKEN=your_refresh_token
   YOUTUBE_PRIVACY_STATUS=private
   ```
   *(Note: All uploads default to **private** so you can review in YouTube Studio before going public).*

---

## ⏰ Cron Job Setup

### Standard Linux Server (Crontab)
Run `crontab -e` and add the following line to execute every 10 minutes:
```bash
*/10 * * * * /usr/bin/php /Applications/XAMPP/xamppfiles/htdocs/nikhil-works/cron/run_jobs.php >> /Applications/XAMPP/xamppfiles/htdocs/nikhil-works/logs/cron_output.log 2>&1
```
*(Replace `/usr/bin/php` with your server's PHP CLI binary path, e.g. `which php`)*.

### cPanel Cron Jobs Interface
1. Log in to cPanel and open **Cron Jobs**.
2. Under **Add New Cron Job**, set Common Settings to: **Once Per 10 Minutes (`*/10 * * * *`)**.
3. In the **Command** field, enter:
   ```bash
   /usr/local/bin/php /home/username/public_html/cron/run_jobs.php >/dev/null 2>&1
   ```

---

## 🧪 Testing with DRY_RUN Mode

1. In `.env`, ensure `DRY_RUN=true`:
   ```env
   DRY_RUN=true
   ```
2. In `DRY_RUN` mode:
   - Gemini generates real captions and cover cards.
   - The cron dispatcher simulates successful publication, generates dummy external URLs, records the payload in the database, and writes detailed logs to `logs/social_automation.log` without hitting external billing or live feeds.
3. Run the automated test suite anytime:
   ```bash
   php tests/test_all_phases.php
   ```
4. Run the cron manually in CLI:
   ```bash
   php cron/run_jobs.php
   ```
5. When ready to publish live posts to social networks, switch `.env` to:
   ```env
   DRY_RUN=false
   ```

---

## 🔒 Security & Privacy Enforcement

- **Legal Consent Guard**: Testimonials strictly require `consent_given = 1` server-side before any AI quote card or social copy can be generated or posted.
- **CLI Guard**: `cron/run_jobs.php` terminates immediately if accessed via a web browser (`php_sapi_name() === 'cli'`).
- **Access Control**: `.env`, `logs/`, `lib/`, `tests/`, and `cron/` are blocked from web access in `.htaccess`.
- **CSRF & Rate Limiting**: All AJAX state changes require valid CSRF tokens and are rate-limited to 40 requests per minute.
- **SQL Injection Prevention**: 100% prepared PDO statements with parameter binding.

---

## 📋 Final Checklist for Go-Live

1. [ ] Create `.env` from `.env.example` and set your database credentials.
2. [ ] Add `GEMINI_API_KEY`, `DEVTO_API_KEY`, and `HASHNODE_API_TOKEN` to `.env`.
3. [ ] Visit `/admin/social-oauth.php` and click **"Connect / Renew LinkedIn"**.
4. [ ] Configure the 10-minute server cron job.
5. [ ] Publish or edit a blog in the Admin panel to test the draft generation.
6. [ ] Approve drafts in `/admin/social-queue.php` and verify live posting!
