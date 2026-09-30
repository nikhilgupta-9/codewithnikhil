<?php
include_once "../config/connect.php";

$share_copy = "";
if (file_exists(__DIR__ . "/share-copy.txt")) {
    $share_copy = file_get_contents(__DIR__ . "/share-copy.txt");
}

$pending_queue = [];
$queue_file = dirname(__DIR__) . "/automation/queue/pending_posts.json";
if (file_exists($queue_file)) {
    $pending_queue = json_decode(file_get_contents($queue_file), true) ?? [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NikhilWorks - Video & Social Automation Command Center</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=JetBrains+Mono:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --bg-dark: #041213;
      --bg-card: #082223;
      --accent: #ADFF1C;
      --text: #ffffff;
      --text-muted: #94a3b8;
      --border: rgba(173, 255, 28, 0.2);
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: var(--bg-dark);
      color: var(--text);
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding: 30px 20px;
      min-height: 100vh;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 24px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 16px;
    }
    .logo-area h1 {
      font-size: 26px;
      font-weight: 800;
      color: var(--accent);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .logo-area p {
      color: var(--text-muted);
      font-size: 14px;
      margin-top: 4px;
    }
    .btn-action {
      background: var(--accent);
      color: #041213;
      border: none;
      padding: 10px 20px;
      border-radius: 999px;
      font-weight: 700;
      font-size: 14px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .btn-action:hover {
      background: #c3ff5c;
      transform: translateY(-2px);
    }
    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
    }
    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .grid-2 {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 28px;
    }
    @media (max-width: 900px) {
      .grid-2 { grid-template-columns: 1fr; }
    }

    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 24px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
    }
    .card-title {
      font-size: 18px;
      font-weight: 700;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 18px;
    }
    .card-title span {
      color: var(--accent);
    }

    .video-preview-iframe {
      width: 100%;
      height: 380px;
      border: 1px solid rgba(173, 255, 28, 0.3);
      border-radius: 14px;
      background: #020708;
    }

    .post-block {
      background: rgba(4, 18, 19, 0.7);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 16px;
      margin-bottom: 16px;
    }
    .post-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .post-platform {
      font-weight: 700;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .post-text {
      font-size: 13.5px;
      color: #e2e8f0;
      white-space: pre-wrap;
      line-height: 1.5;
      background: #020708;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.05);
      max-height: 160px;
      overflow-y: auto;
      font-family: inherit;
    }
    .copy-btn {
      background: rgba(173, 255, 28, 0.15);
      color: var(--accent);
      border: 1px solid var(--accent);
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.2s;
    }
    .copy-btn:hover {
      background: var(--accent);
      color: #041213;
    }

    .toast {
      position: fixed;
      bottom: 24px;
      right: 24px;
      background: var(--accent);
      color: #041213;
      padding: 12px 24px;
      border-radius: 999px;
      font-weight: 700;
      box-shadow: 0 10px 25px rgba(0,0,0,0.5);
      display: none;
      z-index: 1000;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Header -->
  <div class="header">
    <div class="logo-area">
      <h1><i class="fa-solid fa-wand-magic-sparkles"></i> /brag Video & Social Command Center</h1>
      <p>Automated launch video rendering & multi-platform social media distribution for NikhilWorks</p>
    </div>
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
      <a href="composition/index.html" target="_blank" class="btn-action">
        <i class="fa-solid fa-play"></i> Open Fullscreen Video Player
      </a>
      <a href="../" class="btn-action btn-secondary">
        <i class="fa-solid fa-house"></i> View Website
      </a>
    </div>
  </div>

  <div class="grid-2">
    <!-- Left: Video Preview & Controls -->
    <div class="card">
      <div class="card-title">
        <span><i class="fa-solid fa-film"></i> Live 18s Launch Video</span>
        <span style="font-size: 12px; font-weight: 600; background: rgba(173,255,28,0.15); padding: 4px 10px; border-radius: 20px;">1920x1080 / 1080x1920</span>
      </div>

      <iframe src="composition/index.html" class="video-preview-iframe" title="Brag Video Player"></iframe>

      <div style="margin-top: 18px; display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="composition/index.html" target="_blank" class="btn-action" style="flex: 1; justify-content: center;">
          <i class="fa-solid fa-expand"></i> Full Video & Audio Controls
        </a>
        <button onclick="copyShareText()" class="btn-action btn-secondary" style="flex: 1; justify-content: center;">
          <i class="fa-solid fa-copy"></i> Copy All Post Captions
        </button>
      </div>

      <div style="margin-top: 20px; padding: 14px; background: rgba(4,18,19,0.7); border-radius: 10px; font-size: 13px; color: var(--text-muted);">
        <strong style="color: #fff;"><i class="fa-solid fa-terminal me-1"></i> CLI Command to generate new posts from fresh git commits:</strong>
        <div style="margin-top: 6px; font-family: 'JetBrains Mono', monospace; background: #020708; padding: 8px 12px; border-radius: 6px; color: var(--accent);">
          python3 automation/social_publisher.py --action generate
        </div>
      </div>
    </div>

    <!-- Right: Multi-Platform Post Pack -->
    <div class="card">
      <div class="card-title">
        <span><i class="fa-solid fa-share-nodes"></i> Ready-to-Post Captions</span>
        <span style="font-size: 12px; color: var(--text-muted);">1-Click Copy</span>
      </div>

      <!-- X / Twitter -->
      <div class="post-block">
        <div class="post-header">
          <div class="post-platform" style="color: #1DA1F2;">
            <i class="fa-brands fa-x-twitter"></i> X (Twitter)
          </div>
          <button class="copy-btn" onclick="copySnippet('twitterSnippet')"><i class="fa-regular fa-copy"></i> Copy</button>
        </div>
        <div class="post-text" id="twitterSnippet">🚀 Just deployed new updates to NikhilWorks!

⚡ 100/100 Google PageSpeed + AI workflow automations.
🛠️ Direct developer access, transparent fixed pricing (from ₹7,999 / $99), and instant tools.

Check out the full platform & live tools 👇
🌐 https://nikhilworks.com/

#WebDevelopment #AIAutomation #MERNStack #FreelanceDeveloper #Nextjs #SEO</div>
      </div>

      <!-- LinkedIn -->
      <div class="post-block">
        <div class="post-header">
          <div class="post-platform" style="color: #0A66C2;">
            <i class="fa-brands fa-linkedin"></i> LinkedIn (B2B Story)
          </div>
          <button class="copy-btn" onclick="copySnippet('linkedinSnippet')"><i class="fa-regular fa-copy"></i> Copy</button>
        </div>
        <div class="post-text" id="linkedinSnippet">💡 Scaling client delivery without agency overheads.

Over the last week at NikhilWorks, we implemented key architectural and AI workflow upgrades:
• Guaranteed 100/100 Core Web Vitals with clean semantic code.
• Autonomous AI Chatbots (Gemini & OpenAI) for 24/7 lead routing.
• Built-in Website Cost Calculator & Live SEO Auditor.
• 100% Transparent Fixed Rates from ₹7,999 ($99).

Building a web application or need to automate your business workflows?
Let's connect: https://nikhilworks.com/contact/

#SoftwareEngineering #FullStack #WebDevelopment #AIAutomation #Startups #NikhilWorks</div>
      </div>

      <!-- Instagram -->
      <div class="post-block">
        <div class="post-header">
          <div class="post-platform" style="color: #E1306C;">
            <i class="fa-brands fa-instagram"></i> Instagram / Reel
          </div>
          <button class="copy-btn" onclick="copySnippet('instagramSnippet')"><i class="fa-regular fa-copy"></i> Copy</button>
        </div>
        <div class="post-text" id="instagramSnippet">Stop settling for slow, outdated websites in 2026. 🚀

Meet NikhilWorks — High-speed Web Engineering + AI Workflow Automations built to scale your business.

🔥 What we deliver:
✅ Custom WordPress, Dynamic PHP & MERN Stack Applications
✅ 100/100 Google PageSpeed Performance
✅ Autonomous AI Chatbots & n8n Automations
✅ Transparent Fixed Packages from ₹7,999 ($99)

💡 Calculate your website cost or run a free SEO audit on our website!

🔗 Link in bio / visit: nikhilworks.com
📲 WhatsApp +91 83685 52640 to get started!

#webdeveloper #coding #ai #automation #n8n #javascript #delhi #startupindia #freelancer</div>
      </div>

    </div>
  </div>
</div>

<div class="toast" id="toastMsg">✅ Copied to clipboard!</div>

<script>
  function copySnippet(id) {
    const text = document.getElementById(id).innerText;
    navigator.clipboard.writeText(text).then(() => {
      showToast("✅ Post text copied to clipboard!");
    });
  }

  function copyShareText() {
    const allText = `=== TWITTER ===\n${document.getElementById('twitterSnippet').innerText}\n\n=== LINKEDIN ===\n${document.getElementById('linkedinSnippet').innerText}\n\n=== INSTAGRAM ===\n${document.getElementById('instagramSnippet').innerText}`;
    navigator.clipboard.writeText(allText).then(() => {
      showToast("✅ All captions copied to clipboard!");
    });
  }

  function showToast(msg) {
    const toast = document.getElementById('toastMsg');
    toast.innerText = msg;
    toast.style.display = 'block';
    setTimeout(() => {
      toast.style.display = 'none';
    }, 2500);
  }
</script>

</body>
</html>
