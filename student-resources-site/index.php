<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Australia Student Hub | Essential Information for International Students in Australia</title>
  <meta name="description" content="Find essential information for international students in Australia, including student visa, renting, OSHC, transportation, banking, and part-time jobs." />
  <link rel="stylesheet" href="style.css?v=5" />
  <style>
    .home-hero-note {
      display: inline-block;
      margin-bottom: 14px;
      padding: 8px 14px;
      border-radius: 999px;
      background: rgba(255,255,255,0.16);
      color: #ffffff;
      font-size: 0.9rem;
      font-weight: 600;
      backdrop-filter: blur(4px);
    }
    .home-subtext {
      max-width: 760px;
      font-size: 1.04rem;
      line-height: 1.8;
      color: rgba(255,255,255,0.94);
      margin-bottom: 18px;
    }
    .home-search-tip {
      margin-bottom: 22px;
      color: rgba(255,255,255,0.92);
      font-size: 0.96rem;
      font-weight: 500;
    }
    .quick-tags { margin-top: 6px; }
    .home-preview-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    .section-link {
      display: inline-block;
      text-decoration: none;
      color: #2563eb;
      font-weight: 700;
      font-size: 0.96rem;
    }
    .section-link:hover { text-decoration: underline; }
    .preview-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 18px;
    }
    .preview-card {
      display: block;
      text-decoration: none;
      background: linear-gradient(180deg, #f8fbff, #eef4ff);
      border: 1px solid #e5edf8;
      border-radius: 20px;
      padding: 22px 20px;
      box-shadow: 0 8px 24px rgba(59,130,246,0.08);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      color: inherit;
    }
    .preview-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 28px rgba(59,130,246,0.12);
    }
    .preview-card h3 { font-size: 1.08rem; margin-bottom: 8px; color: #1d4ed8; }
    .preview-card p  { color: #4b5563; font-size: 0.94rem; line-height: 1.7; }
    .why-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 18px;
      margin-top: 18px;
    }
    .why-card {
      background: #ffffff;
      border: 1px solid #edf2f7;
      border-radius: 20px;
      padding: 22px;
      box-shadow: 0 8px 24px rgba(15,23,42,0.05);
    }
    .why-card h3 { font-size: 1.05rem; margin-bottom: 10px; color: #111827; }
    .why-card p  { color: #6b7280; font-size: 0.95rem; line-height: 1.75; }
    .popular-topics { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 16px; }
    .topic-link {
      display: inline-block;
      text-decoration: none;
      padding: 10px 14px;
      border-radius: 999px;
      background: #eff6ff;
      color: #1d4ed8;
      font-size: 0.92rem;
      font-weight: 600;
      transition: 0.2s ease;
    }
    .topic-link:hover { background: #dbeafe; }
    .resource-card .meta-row {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 10px 0 14px;
    }
    .meta-pill {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 999px;
      background: #f3f4f6;
      color: #4b5563;
      font-size: 0.78rem;
      font-weight: 600;
    }
    .empty-message {
      grid-column: 1 / -1;
      background: #ffffff;
      border: 1px dashed #cbd5e1;
      border-radius: 18px;
      padding: 26px;
      color: #64748b;
      text-align: center;
    }
    @media (max-width: 768px) {
      .home-hero-note { font-size: 0.82rem; }
      .home-subtext   { font-size: 0.98rem; }
    }

    /* ── 汇率组件样式 ─────────────────────────────── */
    .exchange-widget {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(15,23,42,0.08);
      overflow: hidden;
      border: 1px solid #e5edf8;
    }
    .ew-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 24px;
      background: linear-gradient(135deg, #1a2a4a 0%, #2563c0 100%);
      color: white;
    }
    .ew-title       { display: flex; align-items: center; gap: 12px; }
    .ew-icon        { font-size: 1.6rem; }
    .ew-title h3    { margin: 0; font-size: 1.05rem; font-weight: 700; }
    .ew-subtitle    { margin: 2px 0 0; font-size: 0.78rem; opacity: 0.75; }
    .ew-meta        { text-align: right; }
    .ew-badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 0.72rem;
      font-weight: 600;
      background: rgba(255,255,255,0.15);
      color: white;
    }
    .ew-badge.live  { background: rgba(52,211,153,0.3);  color: #6ee7b7; }
    .ew-badge.error { background: rgba(239,68,68,0.3);   color: #fca5a5; }
    .ew-update      { display: block; font-size: 0.70rem; opacity: 0.60; margin-top: 3px; }

    .ew-converter {
      padding: 16px 24px;
      background: #f8faff;
      border-bottom: 1px solid #e5e7eb;
    }
    .ew-input-row {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }
    .ew-aud-label-box {
      display: flex;
      align-items: center;
      gap: 6px;
      background: #1a2a4a;
      color: white;
      padding: 9px 16px;
      border-radius: 8px;
      font-size: 0.9rem;
      font-weight: 700;
      letter-spacing: 0.04em;
    }
    .ew-input-row input {
      width: 110px;
      padding: 9px 12px;
      border: 1.5px solid #d1d5db;
      border-radius: 8px;
      font-size: 0.95rem;
      font-weight: 600;
      color: #1f2937;
      outline: none;
      transition: border-color 0.2s;
      background: white;
    }
    .ew-input-row input:focus { border-color: #2563c0; }
    .ew-input-row select {
      padding: 9px 12px;
      border: 1.5px solid #d1d5db;
      border-radius: 8px;
      font-size: 0.88rem;
      color: #1f2937;
      background: white;
      cursor: pointer;
      outline: none;
    }
    .ew-arrow       { font-size: 1.2rem; color: #6b7280; font-weight: bold; }
    .ew-result-box {
      display: flex;
      align-items: baseline;
      gap: 6px;
      background: #1a2a4a;
      color: white;
      padding: 9px 16px;
      border-radius: 8px;
      min-width: 160px;
    }
    #ew-result      { font-size: 1.15rem; font-weight: 700; color: #fbbf24; }
    .ew-result-code { font-size: 0.78rem; opacity: 0.75; }

    .ew-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(185px, 1fr));
      padding: 8px 16px 16px;
    }
    .ew-loading {
      grid-column: 1/-1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 32px;
      color: #6b7280;
      font-size: 0.88rem;
    }
    .ew-spinner {
      width: 20px; height: 20px;
      border: 2px solid #e5e7eb;
      border-top-color: #2563c0;
      border-radius: 50%;
      animation: ew-spin 0.8s linear infinite;
    }
    @keyframes ew-spin { to { transform: rotate(360deg); } }

    .ew-card {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 10px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.15s;
      margin: 4px;
      border: 1.5px solid transparent;
    }
    .ew-card:hover  { background: #f0f4ff; }
    .ew-card.active { background: #eff6ff; border-color: #bfdbfe; }

    .ew-flag-img {
      width: 38px;
      height: 26px;
      object-fit: cover;
      border-radius: 4px;
      flex-shrink: 0;
      border: 1px solid #e5e7eb;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .ew-card-info   { flex: 1; min-width: 0; }
    .ew-currency-name {
      font-size: 0.72rem;
      color: #6b7280;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .ew-currency-code { font-size: 0.82rem; font-weight: 700; color: #1f2937; }
    .ew-rate-val    { text-align: right; flex-shrink: 0; }
    .ew-rate-num    { font-size: 0.95rem; font-weight: 700; color: #1a2a4a; display: block; }
    .ew-rate-sub    { font-size: 0.68rem; color: #9ca3af; white-space: nowrap; }

    .ew-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 24px;
      border-top: 1px solid #f3f4f6;
      font-size: 0.72rem;
      color: #9ca3af;
    }
    .ew-refresh {
      background: none;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      padding: 4px 10px;
      font-size: 0.72rem;
      color: #6b7280;
      cursor: pointer;
      transition: all 0.2s;
    }
    .ew-refresh:hover { background: #f3f4f6; border-color: #2563c0; color: #2563c0; }

    @media (max-width: 600px) {
      .ew-header     { flex-direction: column; align-items: flex-start; gap: 8px; }
      .ew-input-row  { flex-direction: column; align-items: stretch; }
      .ew-arrow      { text-align: center; }
      .ew-result-box { justify-content: center; }
      .ew-grid       { grid-template-columns: repeat(2, 1fr); }
      .ew-footer     { flex-direction: column; gap: 8px; text-align: center; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container">
      <nav class="top-nav">
        <div class="logo">Australia Student Hub</div>
        <div class="nav-links">
          <a href="index.php">Home</a>
          <a href="categories.php">Browse by Category</a>
          <a href="popular.php">Popular Resources</a>
          <a href="message_wall.php">Message Wall</a>
        </div>
      </nav>

      <section class="hero" id="search-area">
        <span class="home-hero-note">Designed for prospective and current international students</span>
        <h1>Essential Information for International Students in Australia</h1>
        <p class="home-subtext">
          Find practical information about student visas, renting, OSHC, transport, banking, and part-time jobs — all in one place, so you can prepare before arriving in Australia.
        </p>
        <p class="home-search-tip">Start with a keyword, or explore the featured categories below.</p>

        <div class="search-bar">
          <input id="searchInput" type="text" placeholder="Search keywords, e.g. student visa, renting in Melbourne, OSHC, TFN, bank account" />
          <button id="searchBtn">Search</button>
        </div>

        <div class="quick-tags">
          <button class="tag" data-keyword="Student Visa">Student Visa</button>
          <button class="tag" data-keyword="Renting">Renting</button>
          <button class="tag" data-keyword="OSHC">OSHC</button>
          <button class="tag" data-keyword="Part-time Jobs">Part-time Jobs</button>
          <button class="tag" data-keyword="Bank Account">Bank Account</button>
          <button class="tag" data-keyword="Public Transport">Public Transport</button>
        </div>
      </section>
    </div>
  </header>

  <main class="container">
    <section class="section" id="featured-categories">
      <div class="home-preview-header">
        <div>
          <h2>Featured Categories</h2>
          <p class="section-desc">Start with the topics most students look for first.</p>
        </div>
        <a class="section-link" href="categories.php">View All Categories →</a>
      </div>
      <div class="preview-grid">
        <a class="preview-card" href="categories.php#visa">
          <h3>Visa & Entry</h3>
          <p>Student visa requirements, work rights, visa conditions, and post-study pathways.</p>
        </a>
        <a class="preview-card" href="categories.php#accommodation">
          <h3>Accommodation</h3>
          <p>Renting basics, bonds, lease agreements, housing platforms, and tenant rights.</p>
        </a>
        <a class="preview-card" href="categories.php#insurance">
          <h3>Medical Insurance</h3>
          <p>OSHC providers, coverage, claims, and using healthcare services in Australia.</p>
        </a>
        <a class="preview-card" href="categories.php#jobs">
          <h3>Part-time Jobs</h3>
          <p>Student work rules, TFN, job search platforms, and common work options.</p>
        </a>
      </div>
    </section>

    <section class="section" id="why-this-site">
      <h2>Why Use This Website</h2>
      <div class="why-grid">
        <div class="why-card">
          <h3>Practical Topics</h3>
          <p>Focus on the real questions students ask before and after arriving, such as visas, rent, transport, banking, and healthcare.</p>
        </div>
        <div class="why-card">
          <h3>Search or Browse</h3>
          <p>Search by keyword if you already know what you need, or browse by category if you want a clearer starting point.</p>
        </div>
        <div class="why-card">
          <h3>Official-Friendly</h3>
          <p>Useful student-facing guidance is combined with links to official or more authoritative sources where appropriate.</p>
        </div>
      </div>
    </section>

    <section class="section" id="resource-section">
      <div class="home-preview-header">
        <div>
          <h2>Quick Resource Search</h2>
          <p class="section-desc">Popular starting points for international students.</p>
        </div>
        <a class="section-link" href="popular.php">See Popular Resources →</a>
      </div>
      <div id="resourceList" class="resource-grid"></div>
    </section>

    <section class="section" id="popular-topics">
      <div class="home-preview-header">
        <div>
          <h2>Popular Topics</h2>
          <p class="section-desc">Useful entry points if you are not sure where to begin.</p>
        </div>
      </div>
      <div class="popular-topics">
        <a class="topic-link" href="categories.php#visa">Student Visa</a>
        <a class="topic-link" href="categories.php#accommodation">Renting in Australia</a>
        <a class="topic-link" href="categories.php#insurance">OSHC</a>
        <a class="topic-link" href="categories.php#transport">Public Transport</a>
        <a class="topic-link" href="categories.php#banking">Bank Account</a>
        <a class="topic-link" href="categories.php#jobs">Part-time Jobs</a>
      </div>
    </section>

    <!-- 汇率组件 -->
    <section class="section" id="exchange-rate">
      <div class="home-preview-header">
        <div>
          <h2>Live Exchange Rates</h2>
          <p class="section-desc">Check today's rate before transferring money or budgeting.</p>
        </div>
      </div>

      <div class="exchange-widget">

        <div class="ew-header">
          <div class="ew-title">
            <span class="ew-icon">💱</span>
            <div>
              <h3>Real-time Exchange Rate</h3>
              <p class="ew-subtitle">1 AUD → Foreign Currency</p>
            </div>
          </div>
          <div class="ew-meta">
            <span class="ew-badge" id="ew-status">Loading...</span>
            <span class="ew-update" id="ew-update-time"></span>
          </div>
        </div>

        <div class="ew-converter">
          <div class="ew-input-row">
            <div class="ew-aud-label-box">AUD</div>
            <input type="number" id="ew-amount" value="1" min="0" step="any">
            <span class="ew-arrow">→</span>
            <select id="ew-to-currency">
              <option value="CNY">🇨🇳 CNY — Chinese Yuan</option>
              <option value="KRW">🇰🇷 KRW — Korean Won</option>
              <option value="JPY">🇯🇵 JPY — Japanese Yen</option>
              <option value="USD">🇺🇸 USD — US Dollar</option>
              <option value="HKD">🇭🇰 HKD — Hong Kong Dollar</option>
              <option value="MYR">🇲🇾 MYR — Malaysian Ringgit</option>
              <option value="EUR">🇪🇺 EUR — Euro</option>
              <option value="GBP">🇬🇧 GBP — British Pound</option>
              <option value="INR">🇮🇳 INR — Indian Rupee</option>
            </select>
            <div class="ew-result-box">
              <span id="ew-result">—</span>
              <span class="ew-result-code" id="ew-result-code">CNY</span>
            </div>
          </div>
        </div>

        <div class="ew-grid" id="ew-grid">
          <div class="ew-loading">
            <div class="ew-spinner"></div>
            <span>Fetching latest rates...</span>
          </div>
        </div>

        <div class="ew-footer">
          <span id="ew-source-label">Source: Frankfurter / ECB &nbsp;·&nbsp; For reference only. Confirm with your bank before transferring.</span>
          <button class="ew-refresh" onclick="ewFetchRates()">🔄 Refresh</button>
        </div>

      </div>
    </section>

    <section class="section" id="about">
      <h2>About This Website</h2>
      <div class="about-box">
        <p>
          Australia Student Hub is a student-focused information portal designed to help international students understand essential parts of studying and living in Australia before arrival.
        </p>
        <p>
          This website is intended as a practical guide and starting point. For visa, legal, tax, health, and government matters, always confirm information with official sources.
        </p>
      </div>
    </section>
  </main>

  <button class="fab-top" id="fabTop" aria-label="Back to top">↑</button>

  <footer class="site-footer">
    <div class="container">
      <p>© 2026 Australia Student Hub</p>
      <p>Target users: Prospective students / Current students / Parents</p>
    </div>
  </footer>

  <script>
    /* ── 资源搜索逻辑 ──────────────────────────────── */
    const resources = [
      {
        title: "Student Visa (Subclass 500) Guide",
        description: "Understand application basics, work rights, visa conditions, and post-study transition pathways.",
        category: "Visa & Entry", city: "Australia", official: "Official",
        link: "categories.php#visa"
      },
      {
        title: "Renting in Melbourne and Sydney",
        description: "Learn about rent, bond, inspections, lease agreements, and common housing issues for students.",
        category: "Accommodation", city: "Melbourne", official: "Unofficial",
        link: "categories.php#accommodation"
      },
      {
        title: "OSHC Basics for International Students",
        description: "Compare providers, understand what is covered, and learn how claims usually work.",
        category: "Medical Insurance", city: "Australia", official: "Official",
        link: "categories.php#insurance"
      },
      {
        title: "Part-time Jobs and TFN",
        description: "Learn the basics of student work rights, applying for a TFN, and where to look for jobs.",
        category: "Part-time Jobs", city: "Australia", official: "Official",
        link: "categories.php#jobs"
      },
      {
        title: "Public Transport Starter Guide",
        description: "A quick introduction to transport cards, commuting, and student transport information.",
        category: "Transportation", city: "Melbourne", official: "Unofficial",
        link: "categories.php#transport"
      },
      {
        title: "Opening a Bank Account in Australia",
        description: "Compare major banks and understand what students usually need in their first weeks.",
        category: "Banking & Communication", city: "Australia", official: "Unofficial",
        link: "categories.php#banking"
      }
    ];

    const resourceList    = document.getElementById("resourceList");
    const searchInput     = document.getElementById("searchInput");
    const searchBtn       = document.getElementById("searchBtn");
    const quickTags       = document.querySelectorAll(".tag");
    const categoryButtons = document.querySelectorAll(".category-card");

    function renderResources(items) {
      if (!items.length) {
        resourceList.innerHTML = `<div class="empty-message">No matching resources found. Try another keyword or explore the category pages.</div>`;
        return;
      }
      resourceList.innerHTML = items.map(item => `
        <article class="resource-card">
          <h3>${item.title}</h3>
          <p>${item.description}</p>
          <div class="meta-row">
            <span class="meta-pill">${item.category}</span>
            <span class="meta-pill">${item.city}</span>
            <span class="meta-pill">${item.official}</span>
          </div>
          <a href="${item.link}">View Resource →</a>
        </article>
      `).join("");
    }

    function searchResources(keyword) {
      const q = keyword.trim().toLowerCase();
      if (!q) {
        renderResources(resources);
        document.getElementById("resource-section").scrollIntoView({ behavior: "smooth", block: "start" });
        return;
      }
      const filtered = resources.filter(item =>
        item.title.toLowerCase().includes(q) ||
        item.description.toLowerCase().includes(q) ||
        item.category.toLowerCase().includes(q) ||
        item.city.toLowerCase().includes(q)
      );
      renderResources(filtered);
      document.getElementById("resource-section").scrollIntoView({ behavior: "smooth", block: "start" });
    }

    searchBtn.addEventListener("click", () => searchResources(searchInput.value));
    searchInput.addEventListener("keypress", e => { if (e.key === "Enter") searchResources(searchInput.value); });
    quickTags.forEach(tag => {
      tag.addEventListener("click", () => {
        searchInput.value = tag.getAttribute("data-keyword");
        searchResources(tag.getAttribute("data-keyword"));
      });
    });
    categoryButtons.forEach(button => {
      button.addEventListener("click", () => {
        searchInput.value = button.getAttribute("data-category");
        searchResources(button.getAttribute("data-category"));
      });
    });
    renderResources(resources);

    /* ── 汇率组件逻辑 ─────────────────────────────────── */
    const EW_CURRENCIES = [
      { code:'CNY', name:'Chinese Yuan',      flagImg:'images/china.png'    },
      { code:'KRW', name:'Korean Won',        flagImg:'images/korea.png'    },
      { code:'JPY', name:'Japanese Yen',      flagImg:'images/japan.png'    },
      { code:'USD', name:'US Dollar',         flagImg:'images/usa.png'      },
      { code:'HKD', name:'Hong Kong Dollar',  flagImg:'images/hongkong.png' },
      { code:'MYR', name:'Malaysian Ringgit', flagImg:'images/malaysia.png' },
      { code:'EUR', name:'Euro',              flagImg:'images/eu.png'       },
      { code:'GBP', name:'British Pound',     flagImg:'images/uk.jpg'       },
      { code:'INR', name:'Indian Rupee',      flagImg:'images/india.png'    },
    ];

    let ewRates = {};

    async function ewFetchRates() {
      const statusEl = document.getElementById('ew-status');
      const gridEl   = document.getElementById('ew-grid');
      statusEl.className   = 'ew-badge';
      statusEl.textContent = 'Loading...';
      gridEl.innerHTML = '<div class="ew-loading"><div class="ew-spinner"></div><span>Fetching latest rates...</span></div>';

      const strategies = [
        {
          run: async () => {
            const res  = await fetch('get_rates.php');
            if (!res.ok) throw new Error('HTTP ' + res.status);
            const data = await res.json();
            if (data.error) throw new Error(data.error);
            return { rates: data.rates, source: 'Frankfurter / ECB' };
          }
        },
        {
          run: async () => {
            const codes = EW_CURRENCIES.map(c => c.code).join(',');
            const res   = await fetch(`https://api.frankfurter.app/latest?from=AUD&to=${codes}`);
            if (!res.ok) throw new Error('HTTP ' + res.status);
            const data  = await res.json();
            return { rates: data.rates, source: 'Frankfurter / ECB' };
          }
        },
        {
          run: async () => {
            const res  = await fetch('https://open.er-api.com/v6/latest/AUD');
            if (!res.ok) throw new Error('HTTP ' + res.status);
            const data = await res.json();
            if (data.result !== 'success') throw new Error('API error');
            const rates = {};
            EW_CURRENCIES.forEach(c => {
              if (data.rates[c.code]) rates[c.code] = data.rates[c.code];
            });
            return { rates, source: 'ExchangeRate-API (open.er-api.com)' };
          }
        }
      ];

      for (const s of strategies) {
        try {
          const result = await s.run();
          ewRates = result.rates;
          ewRenderGrid();
          ewUpdateResult();
          statusEl.className   = 'ew-badge live';
          statusEl.textContent = '● Live';
          const now = new Date();
          document.getElementById('ew-update-time').textContent =
            `Updated ${now.getHours().toString().padStart(2,'0')}:${now.getMinutes().toString().padStart(2,'0')}`;
          document.getElementById('ew-source-label').textContent =
            `Source: ${result.source} · For reference only. Confirm with your bank before transferring.`;
          return;
        } catch (e) { /* 继续下一个 */ }
      }

      statusEl.className   = 'ew-badge error';
      statusEl.textContent = '⚠ Failed';
      gridEl.innerHTML = `<div class="ew-loading" style="color:#ef4444;flex-direction:column;gap:8px">
        <span>⚠ Could not fetch rates. Please check your connection.</span>
        <button class="ew-refresh" onclick="ewFetchRates()">🔄 Retry</button>
      </div>`;
    }

    function ewRenderGrid() {
      const grid    = document.getElementById('ew-grid');
      const selCode = document.getElementById('ew-to-currency').value;
      grid.innerHTML = '';

      EW_CURRENCIES.forEach(c => {
        const rate = ewRates[c.code];
        if (!rate) return;

        const display = rate >= 100 ? rate.toFixed(1)
                      : rate >= 1   ? rate.toFixed(4)
                      :               rate.toFixed(5);

        const card = document.createElement('div');
        card.className = 'ew-card' + (c.code === selCode ? ' active' : '');
        card.innerHTML = `
          <img class="ew-flag-img" src="${c.flagImg}" alt="${c.code}">
          <div class="ew-card-info">
            <div class="ew-currency-name">${c.name}</div>
            <div class="ew-currency-code">${c.code}</div>
          </div>
          <div class="ew-rate-val">
            <span class="ew-rate-num">${display}</span>
            <span class="ew-rate-sub">${c.code} / 1 AUD</span>
          </div>`;

        card.onclick = () => {
          document.getElementById('ew-to-currency').value = c.code;
          ewUpdateResult();
          document.querySelectorAll('.ew-card').forEach(el => el.classList.remove('active'));
          card.classList.add('active');
        };
        grid.appendChild(card);
      });
    }

    function ewUpdateResult() {
      const amount = parseFloat(document.getElementById('ew-amount').value) || 0;
      const code   = document.getElementById('ew-to-currency').value;
      const el     = document.getElementById('ew-result');
      const codeEl = document.getElementById('ew-result-code');

      codeEl.textContent = code;

      if (!ewRates[code] || amount === 0) { el.textContent = '—'; return; }

      const foreign = amount * ewRates[code];
      el.textContent = foreign >= 100 ? foreign.toFixed(1)
                     : foreign >= 1   ? foreign.toFixed(2)
                     :                  foreign.toFixed(4);
    }

    document.getElementById('ew-amount').addEventListener('input', ewUpdateResult);
    document.getElementById('ew-to-currency').addEventListener('change', () => {
      ewUpdateResult();
      ewRenderGrid();
    });

    /* ── Floating Back-to-Top Button ── */
    const fabTop = document.getElementById('fabTop');
    window.addEventListener('scroll', () => {
      fabTop.classList.toggle('visible', window.scrollY > 300);
    });
    fabTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    ewFetchRates();
    setInterval(ewFetchRates, 10 * 60 * 1000); // 每 10 分钟自动刷新
  </script>
</body>
</html>