<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SEO & Google Ads Proposal — Pragati Eye Centre</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    --navy: #0d2240;
    --teal: #0a7f8f;
    --teal-light: #e6f7f9;
    --gold: #c9922a;
    --gold-light: #fdf4e3;
    --text: #1e2d3d;
    --muted: #6b7f92;
    --border: #dce6ef;
    --white: #ffffff;
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: #f0f4f8;
    color: var(--text);
    font-size: 13px;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    margin: 0 auto;
    background: var(--white);
    position: relative;
    overflow: hidden;
  }

  /* ── HEADER ── */
  .header {
    background: var(--navy);
    padding: 28px 36px 22px;
    position: relative;
  }
  .header::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--teal), var(--gold));
  }
  .header-inner { display: flex; justify-content: space-between; align-items: flex-start; }
  .from-block h1 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    color: var(--white);
    letter-spacing: 0.5px;
  }
  .from-block p { color: #8faabf; font-size: 11px; margin-top: 3px; }
  .proposal-badge {
    background: linear-gradient(135deg, var(--teal), #085f6d);
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-align: right;
    font-size: 10px;
  }
  .proposal-badge span { display: block; font-size: 16px; font-weight: 600; margin-top: 2px; }

  /* ── TO BLOCK ── */
  .to-section {
    background: var(--teal-light);
    border-left: 4px solid var(--teal);
    margin: 22px 36px 0;
    padding: 14px 18px;
    border-radius: 0 6px 6px 0;
    display: flex; justify-content: space-between; align-items: center;
  }
  .to-section .to-left h2 {
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    color: var(--navy);
  }
  .to-section .to-left p { color: var(--muted); font-size: 11px; margin-top: 2px; }
  .to-section .meta { text-align: right; font-size: 11px; color: var(--muted); line-height: 1.7; }
  .to-section .meta strong { color: var(--navy); }

  /* ── SECTION TITLE ── */
  .section-wrap { padding: 18px 36px 0; }
  .sec-title {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    color: var(--navy);
    border-bottom: 2px solid var(--teal);
    padding-bottom: 5px;
    margin-bottom: 12px;
    display: flex; align-items: center; gap: 8px;
  }
  .sec-title .dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--teal);
    flex-shrink: 0;
  }

  /* ── INTRO ── */
  .intro-text {
    font-size: 11.5px;
    color: var(--muted);
    line-height: 1.7;
    margin-bottom: 14px;
  }

  /* ── LOCATIONS ── */
  .locations-row { display: flex; gap: 8px; margin-bottom: 18px; }
  .loc-chip {
    background: var(--navy);
    color: white;
    font-size: 10px;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 500;
  }

  /* ── KEYWORDS TABLE ── */
  .kw-table { width: 100%; border-collapse: collapse; margin-bottom: 16px; font-size: 11.5px; }
  .kw-table thead tr { background: var(--navy); color: white; }
  .kw-table thead th { padding: 8px 12px; text-align: left; font-weight: 500; font-size: 11px; }
  .kw-table tbody tr:nth-child(even) { background: #f5f9fc; }
  .kw-table tbody tr:hover { background: var(--teal-light); }
  .kw-table td { padding: 7px 12px; border-bottom: 1px solid var(--border); vertical-align: middle; }
  .kw-table td:last-child { text-align: right; font-weight: 600; color: var(--teal); }
  .tag {
    display: inline-block;
    font-size: 9px;
    padding: 2px 7px;
    border-radius: 10px;
    font-weight: 600;
    letter-spacing: 0.3px;
  }
  .tag-short { background: #fff0d6; color: #a0680a; }
  .tag-long  { background: #dff5f7; color: #0a6b77; }

  /* ── PRICING CARDS ── */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 16px; }
  .price-card {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 14px 16px;
    position: relative;
    overflow: hidden;
  }
  .price-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
  }
  .price-card.seo-card::before { background: linear-gradient(90deg, var(--teal), #2ac4d5); }
  .price-card.ads-card::before { background: linear-gradient(90deg, var(--gold), #e8b840); }
  .price-card h3 { font-size: 12px; color: var(--navy); font-weight: 600; margin-bottom: 8px; }
  .price-card .price-row { display: flex; justify-content: space-between; align-items: center; margin-top: 5px; font-size: 11px; color: var(--muted); }
  .price-card .price-row strong { color: var(--teal); font-size: 12px; }
  .price-card.ads-card .price-row strong { color: var(--gold); }
  .price-card .sub { font-size: 10px; color: #9ab; margin-top: 2px; }

  /* ── TOTAL BOX ── */
  .total-box {
    background: var(--navy);
    border-radius: 8px;
    padding: 16px 22px;
    margin-bottom: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .total-box .label { color: #8faabf; font-size: 11px; }
  .total-box .amount { font-family: 'Playfair Display', serif; font-size: 26px; color: white; }
  .total-box .amount span { font-size: 13px; color: var(--gold); margin-left: 6px; }
  .total-box .breakdown { text-align: right; }
  .total-box .breakdown p { color: #8faabf; font-size: 10px; line-height: 1.8; }
  .total-box .breakdown strong { color: white; }

  /* ── TIMELINE ── */
  .timeline { display: flex; gap: 0; margin-bottom: 16px; }
  .month-block {
    flex: 1;
    border: 1px solid var(--border);
    border-right: none;
    padding: 10px 12px;
    font-size: 10.5px;
  }
  .month-block:first-child { border-radius: 6px 0 0 6px; }
  .month-block:last-child { border-right: 1px solid var(--border); border-radius: 0 6px 6px 0; }
  .month-block .mo { font-weight: 700; font-size: 11px; color: var(--navy); margin-bottom: 4px; }
  .month-block ul { padding-left: 12px; color: var(--muted); line-height: 1.7; }
  .month-block:nth-child(2) { background: var(--teal-light); border-color: var(--teal); }
  .month-block:nth-child(2) .mo { color: var(--teal); }

  /* ── DELIVERABLES ── */
  .deliverables-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 16px; }
  .del-item {
    display: flex; align-items: flex-start; gap: 8px;
    background: #f8fbfd; border: 1px solid var(--border);
    padding: 9px 11px; border-radius: 6px;
    font-size: 11px; color: var(--text);
  }
  .del-item .icon { color: var(--teal); font-size: 14px; margin-top: -1px; flex-shrink: 0; }

  /* ── TERMS ── */
  .terms-list { font-size: 11px; color: var(--muted); line-height: 1.8; padding-left: 14px; margin-bottom: 16px; }

  /* ── SIGNATURE ── */
  .sig-row {
    display: flex; justify-content: space-between; align-items: flex-end;
    border-top: 2px solid var(--border);
    padding-top: 14px;
    margin: 0 36px;
    padding-bottom: 24px;
  }
  .sig-block p { font-size: 10.5px; color: var(--muted); line-height: 1.8; }
  .sig-block strong { font-size: 12px; color: var(--navy); }
  .sig-line { width: 100px; border-bottom: 1px solid #ccc; margin-bottom: 4px; height: 24px; }
  .sig-block .sig-label { font-size: 9.5px; color: #aaa; }

  /* ── FOOTER ── */
  .footer {
    background: var(--navy);
    padding: 10px 36px;
    display: flex; justify-content: space-between; align-items: center;
  }
  .footer p { color: #5a7a94; font-size: 10px; }
  .footer a { color: var(--teal); text-decoration: none; }

  /* ── PRINT ── */
  @media print {
    body { background: white; }
    .page { box-shadow: none; margin: 0; }
    @page { size: A4; margin: 0; }
  }
  @media screen {
    body { padding: 30px 0 60px; }
    .page { box-shadow: 0 4px 40px rgba(0,0,0,0.12); }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="header-inner">
      <div class="from-block">
        <h1>CodeWithNikhil.in</h1>
        <p>Digital Marketing &amp; Web Solutions</p>
        <p style="color:#5a8fa8;font-size:10px;margin-top:6px;">www.codewithnikhil.in &nbsp;|&nbsp; contact@codewithnikhil.in</p>
      </div>
      <div class="proposal-badge">
        SERVICE PROPOSAL
        <span>SEO + Google Ads</span>
        <div style="font-size:9.5px;margin-top:4px;color:#a8d8df;">3-Month Growth Plan</div>
      </div>
    </div>
  </div>

  <!-- TO BLOCK -->
  <div class="to-section">
    <div class="to-left">
      <h2>Pragati Eye Centre</h2>
      <p>Krishna Nagar &amp; Lajpat Nagar, Delhi — pragatieyecentre.com</p>
      <p style="margin-top:4px;font-size:10px;color:#0a7f8f;">Dr. Anil Biltoria — MBBS (AIIMS), MD (AIIMS)</p>
    </div>
    <div class="meta">
      <p><strong>Date:</strong> April 2025</p>
      <p><strong>Valid for:</strong> 30 Days</p>
      <p><strong>Duration:</strong> 3 Months</p>
      <p><strong>Ref#:</strong> PEC-SEO-2025</p>
    </div>
  </div>

  <!-- INTRO -->
  <div class="section-wrap" style="padding-top:16px;">
    <p class="intro-text">
      We are pleased to present this proposal for <strong>SEO and Google Ads management</strong> services for Pragati Eye Centre. 
      With your established reputation across Delhi and NCR, this plan is designed to significantly enhance your online visibility, 
      attract more patients searching for eye care services, and dominate local search results in your target areas.
    </p>

    <!-- LOCATIONS -->
    <div class="sec-title"><div class="dot"></div>Target Locations</div>
    <div class="locations-row">
      <div class="loc-chip">📍 Krishna Nagar</div>
      <div class="loc-chip">📍 Lajpat Nagar</div>
      <div class="loc-chip">📍 Delhi</div>
      <div class="loc-chip">📍 Delhi NCR Region</div>
    </div>

    <!-- KEYWORDS -->
    <div class="sec-title"><div class="dot"></div>Keyword Strategy</div>

    <!-- Short Tail -->
    <div style="font-size:11px;font-weight:600;color:var(--navy);margin-bottom:6px;">Short-Tail Keywords &nbsp;<span style="font-size:10px;color:var(--muted);font-weight:400;">(5 Keywords × ₹2,000)</span></div>
    <table class="kw-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Keyword</th>
          <th>Type</th>
          <th>Target Location</th>
          <th>Cost/Month</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Eye Hospital Delhi</td>
          <td><span class="tag tag-short">Short Tail</span></td>
          <td>Delhi &amp; NCR</td>
          <td>₹2,000</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Cataract Surgery Delhi</td>
          <td><span class="tag tag-short">Short Tail</span></td>
          <td>Delhi &amp; NCR</td>
          <td>₹2,000</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Lasik Eye Surgery Delhi</td>
          <td><span class="tag tag-short">Short Tail</span></td>
          <td>Delhi &amp; NCR</td>
          <td>₹2,000</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Eye Doctor Krishna Nagar</td>
          <td><span class="tag tag-short">Short Tail</span></td>
          <td>Krishna Nagar</td>
          <td>₹2,000</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Eye Specialist Lajpat Nagar</td>
          <td><span class="tag tag-short">Short Tail</span></td>
          <td>Lajpat Nagar</td>
          <td>₹2,000</td>
        </tr>
      </tbody>
    </table>

    <!-- Long Tail -->
    <div style="font-size:11px;font-weight:600;color:var(--navy);margin-bottom:6px;">Long-Tail Keywords &nbsp;<span style="font-size:10px;color:var(--muted);font-weight:400;">(6 Keywords × ₹800)</span></div>
    <table class="kw-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Keyword</th>
          <th>Type</th>
          <th>Target Location</th>
          <th>Cost/Month</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Best cataract surgeon in Krishna Nagar Delhi</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>Krishna Nagar</td>
          <td>₹800</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Affordable Lasik eye surgery in Delhi NCR</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>Delhi &amp; NCR</td>
          <td>₹800</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Glaucoma treatment specialist near Lajpat Nagar</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>Lajpat Nagar</td>
          <td>₹800</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Retina specialist doctor in East Delhi</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>East Delhi</td>
          <td>₹800</td>
        </tr>
        <tr>
          <td>5</td>
          <td>NABH accredited eye hospital Delhi NCR</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>Delhi &amp; NCR</td>
          <td>₹800</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Eye squint surgery cost in Delhi AIIMS doctor</td>
          <td><span class="tag tag-long">Long Tail</span></td>
          <td>Delhi</td>
          <td>₹800</td>
        </tr>
      </tbody>
    </table>

    <!-- PRICING CARDS -->
    <div class="sec-title"><div class="dot"></div>Monthly Pricing Breakdown</div>
    <div class="pricing-grid">
      <div class="price-card seo-card">
        <h3>🔍 SEO — Short-Tail Keywords</h3>
        <div class="price-row"><span>5 Keywords × ₹2,000</span><strong>₹10,000/mo</strong></div>
        <div class="price-row"><span>Location-wise promotion (4 areas)</span><strong>₹8,000/mo</strong></div>
        <p class="sub">On-page + off-page optimization included</p>
      </div>
      <div class="price-card seo-card">
        <h3>🔍 SEO — Long-Tail Keywords</h3>
        <div class="price-row"><span>6 Keywords × ₹800</span><strong>₹4,800/mo</strong></div>
        <div class="price-row"><span>Content + local SEO strategy</span><strong>Included</strong></div>
        <p class="sub">Higher conversion rate, lower competition</p>
      </div>
      <div class="price-card ads-card">
        <h3>📢 Google Ads Management</h3>
        <div class="price-row"><span>Monthly Management Fee</span><strong style="color:var(--gold)">₹5,000/mo</strong></div>
        <div class="price-row"><span>Ad spend budget (client's)</span><strong style="color:var(--gold)">Separate</strong></div>
        <p class="sub">Search + Display campaigns, conversion tracking</p>
      </div>
      <div class="price-card" style="background:var(--gold-light);border-color:#e8c97a;">
        <h3 style="color:#7a4a0a;">📍 Location-wise SEO (4 Zones)</h3>
        <div class="price-row"><span>Per keyword per location</span><strong style="color:var(--gold)">₹2,000</strong></div>
        <div class="price-row"><span>4 Locations covered</span><strong style="color:var(--gold)">Included</strong></div>
        <p class="sub">Krishna Nagar · Lajpat Nagar · Delhi · NCR</p>
      </div>
    </div>

    <!-- TOTAL BOX -->
    <div class="total-box">
      <div>
        <div class="label">Total Monthly Investment</div>
        <div class="amount">₹27,800 <span>After ₹4800 Now you pay ₹23000/-</span></div>
        <!--<div style="color:#5a8fa8;font-size:10px;margin-top:4px;">3-Month Contract Total: ₹83,400</div>-->
      </div>
      <div class="breakdown">
        <p>Short-tail SEO (5 kw) <strong>₹10,000</strong></p>
        <p>Long-tail SEO (6 kw) <strong>₹4,800</strong></p>
        <p>Location promotion (4 zones) <strong>₹8,000</strong></p>
        <p>Google Ads management <strong>₹5,000</strong></p>
        <p style="border-top:1px solid #1e4060;margin-top:4px;padding-top:4px;">Monthly Total <strong style="color:white">₹27,800</strong></p>
        <p style="border-top:1px solid #1e4060;margin-top:4px;padding-top:4px;">Discount Price<strong style="color:white">₹23,000</strong></p>
      </div>
    </div>

    <!-- 3 MONTH TIMELINE -->
    <div class="sec-title"><div class="dot"></div>3-Month Execution Plan</div>
    <div class="timeline">
      <div class="month-block">
        <div class="mo">Month 1 — Foundation</div>
        <ul>
          <li>Website SEO audit</li>
          <li>Keyword research &amp; mapping</li>
          <li>On-page optimization</li>
          <!--<li>Google My Business setup</li>-->
          <li>Google Ads campaign launch</li>
        </ul>
      </div>
      <div class="month-block">
        <div class="mo">Month 2 — Growth</div>
        <ul>
          <li>Content creation (blogs)</li>
          <li>Link building campaign</li>
          <li>Local citations &amp; directories</li>
          <li>Ads A/B testing</li>
          <li>Mid-campaign report</li>
        </ul>
      </div>
      <div class="month-block">
        <div class="mo">Month 3 — Domination</div>
        <ul>
          <li>Ranking consolidation</li>
          <li>Competitor gap analysis</li>
          <li>Remarketing ads setup</li>
          <li>Performance optimization</li>
          <li>Full campaign report</li>
        </ul>
      </div>
    </div>

    <!-- DELIVERABLES -->
    <div class="sec-title"><div class="dot"></div>What's Included</div>
    <div class="deliverables-grid">
      <div class="del-item"><span class="icon">✓</span>Monthly ranking progress reports</div>
      <div class="del-item"><span class="icon">✓</span>Google Analytics &amp; Search Console setup</div>
      <div class="del-item"><span class="icon">✓</span>Local SEO for all 4 target zones</div>
      <div class="del-item"><span class="icon">✓</span>Google Ads creation, management &amp; optimization</div>
      <div class="del-item"><span class="icon">✓</span>On-page &amp; technical SEO fixes</div>
      <div class="del-item"><span class="icon">✓</span>Conversion tracking &amp; call tracking setup</div>
      <div class="del-item"><span class="icon">✓</span>Competitor analysis &amp; strategy updates</div>
      <div class="del-item"><span class="icon">✓</span>Dedicated account manager support</div>
    </div>

    <!-- TERMS -->
   <div class="sec-title">
  <div class="dot"></div>
      Terms &amp; Conditions
    </div>
    
    <ul class="terms-list">
      <li>This proposal is valid for <strong>30 days</strong> from the date of issuance.</li>
      
      <li>Contract duration is <strong>3 months</strong>.</li>
      
      <li>
        Payment Terms (Total Project Cost: <strong>₹23,000</strong>):
        <ul>
          <li><strong>30%</strong> (₹6,900) – Payable at project start (Month 1)</li>
          <li><strong>30%</strong> (₹6,900) – Payable at start of Month 2</li>
          <li><strong>40%</strong> (₹9,200) – Payable at start of Month 3</li>
        </ul>
      </li>
    
      <li>Google Ads budget (ad spend) is <strong>not included</strong> in the management fee and will be billed separately by Google.</li>
      
      <li>SEO results are typically visible within <strong>60–90 days</strong> of campaign start.</li>
      
      <li>All work will be performed on the website: <strong>pragatieyecentre.com</strong></li>
      
      <li>Client to provide website access credentials and Google account access upon project start.</li>
      
      <li>CodeWithNikhil.in reserves the right to use campaign results (without confidential data) as case studies.</li>
    </ul>
  </div>

  <!-- SIGNATURE -->
  <div class="sig-row">
    <div class="sig-block">
      <strong>Prepared by</strong>
      <p>CodeWithNikhil.in</p>
      <p>www.codewithnikhil.in</p>
      <div class="sig-line"></div>
      <div class="sig-label">Authorized Signature</div>
    </div>
    <div class="sig-block" style="text-align:center;">
      <strong>Accepted by</strong>
      <p>Pragati Eye Centre</p>
      <p>Dr. Anil Biltoria / Authorized Rep.</p>
      <div class="sig-line" style="margin:0 auto;"></div>
      <div class="sig-label">Client Signature &amp; Date</div>
    </div>
    <div class="sig-block" style="text-align:right;">
      <strong>Questions?</strong>
      <p>contact@codewithnikhil.in</p>
      <p>www.codewithnikhil.in</p>
      <p style="margin-top:6px;font-size:10px;color:var(--teal);">We're happy to customize<br>this plan further for you.</p>
    </div>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <p>© 2025 CodeWithNikhil.in — Digital Marketing &amp; Web Solutions</p>
    <p>Proposal Ref: PEC-SEO-2025 &nbsp;|&nbsp; <a href="https://www.codewithnikhil.in">www.codewithnikhil.in</a></p>
  </div>

</div>
</body>
</html>