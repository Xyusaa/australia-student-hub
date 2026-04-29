<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse by Category - Australia Student Hub</title>
    <meta name="description" content="Browse all categories: Visa, Education, Accommodation, Insurance, Transport, Part-time Jobs, Banking, Official Resources.">
    <link rel="stylesheet" href="style.css?v=3">
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 120px;
        }

        /* ── Fixed Category Nav Bar ── */
        .category-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-nav.visible {
            transform: translateY(0);
        }

        .category-nav-inner {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 10px 0;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .category-nav-inner::-webkit-scrollbar {
            display: none;
        }

        .cat-nav-btn {
            flex-shrink: 0;
            background: none;
            border: 1.5px solid #e5e7eb;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
            font-family: inherit;
        }

        .cat-nav-btn:hover {
            background: #eff6ff;
            border-color: #93c5fd;
            color: #1d4ed8;
        }

        .cat-nav-btn.active {
            background: #2563eb;
            border-color: #2563eb;
            color: white;
        }

        /* ── Category Blocks ── */
        .category-block {
            scroll-margin-top: 110px;
            transition: all 0.3s ease;
        }

        /* ── Subcategory styles ── */
        .subcategory-list {
            list-style: none;
            padding: 0;
            margin: 16px 0 0 0;
        }

        .subcategory-list li {
            margin-bottom: 12px;
            padding-left: 20px;
            border-left: 3px solid #3b82f6;
        }

        .subcategory-list a {
            text-decoration: none;
            color: #1f2937;
            font-weight: 500;
            transition: color 0.2s;
        }

        .subcategory-list a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .subcategory-subtitle {
            font-weight: 600;
            margin-top: 20px;
            margin-bottom: 8px;
            color: #1f2937;
        }

        /* ── Toggle / Back-to-top ── */
        .btn-group {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 16px;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: #3b82f6;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            transition: color 0.2s;
            font-family: inherit;
        }

        .toggle-btn:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        .back-to-top {
            font-size: 0.88rem;
            color: #9ca3af;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .back-to-top:hover {
            color: #6b7280;
        }

        /* ── Links container ── */
        .links-container {
            display: none;
            margin-top: 8px;
            animation: fadeIn 0.25s ease;
        }

        .links-container.show {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Search highlight ── */
        .highlight-match {
            background-color: #fef3c7;
            border: 2px solid #f59e0b;
            border-radius: 1.5rem;
        }

        /* ── Hot searches ── */
        .hot-searches {
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.5rem;
        }

        .hot-tag {
            background: rgba(255, 255, 255, 0.25);
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: 0.2s;
            color: white;
            border: none;
            font-family: inherit;
        }

        .hot-tag:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* ── Search result info ── */
        .search-result-info {
            margin-top: 8px;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.85);
            min-height: 20px;
            text-align: center;
        }

        /* ── No results ── */
        .no-results-msg {
            display: none;
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .no-results-msg.show {
            display: block;
        }

        /* ── Floating back-to-top button ── */
        .fab-top {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 46px;
            height: 46px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(16px);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fab-top.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fab-top:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.45);
        }

        @media (max-width: 768px) {
            .category-nav-inner {
                gap: 4px;
            }
            .cat-nav-btn {
                font-size: 0.76rem;
                padding: 6px 11px;
            }
            .fab-top {
                bottom: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- ── Fixed Category Navigation Bar (slides in on scroll) ── -->
    <nav class="category-nav" id="categoryNav" aria-label="Quick category navigation">
        <div class="category-nav-inner">
            <button class="cat-nav-btn" data-target="visa">📄 Visa</button>
            <button class="cat-nav-btn" data-target="education">🎓 Education</button>
            <button class="cat-nav-btn" data-target="accommodation">🏠 Accommodation</button>
            <button class="cat-nav-btn" data-target="insurance">🩺 OSHC</button>
            <button class="cat-nav-btn" data-target="transport">🚆 Transport</button>
            <button class="cat-nav-btn" data-target="jobs">💼 Jobs</button>
            <button class="cat-nav-btn" data-target="banking">🏦 Banking</button>
            <button class="cat-nav-btn" data-target="official">🏛️ Official</button>
        </div>
    </nav>

    <!-- ── Site Header ── -->
    <header class="site-header categories-header">
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
                <h1>Browse by Category</h1>
                <p>Click any category below to jump directly — all resources are organised in one page for easy browsing.</p>
                <div class="search-bar">
                    <input id="searchInput" type="text" placeholder="Search across all categories…" aria-label="Search categories">
                    <button id="searchBtn">Search</button>
                </div>
                <div class="search-result-info" id="searchResultInfo"></div>
                <div class="hot-searches">
                    <button class="hot-tag" data-keyword="visa">🔍 Student visa</button>
                    <button class="hot-tag" data-keyword="rent">🏠 Renting</button>
                    <button class="hot-tag" data-keyword="transport">🚃 Myki card</button>
                    <button class="hot-tag" data-keyword="tax">💰 TFN &amp; tax</button>
                    <button class="hot-tag" data-keyword="job">💼 Part-time job</button>
                    <button class="hot-tag" data-keyword="bank">🏦 Banking</button>
                </div>
            </section>
        </div>
    </header>

    <!-- ── Main Content ── -->
    <main class="container" id="main-content">

        <div class="no-results-msg" id="noResultsMsg">
            <p style="font-size:2rem">🔍</p>
            <p style="font-size:1.1rem;font-weight:600;color:#374151;margin:8px 0 4px">No results found</p>
            <p>Try keywords like: <strong>visa</strong>, <strong>rent</strong>, <strong>myki</strong>, <strong>tax</strong>, <strong>job</strong>, <strong>bank</strong></p>
        </div>

        <!-- Visa -->
        <section id="visa" class="section category-block">
            <h2>📄 Visa &amp; Entry</h2>
            <p>Key information about student visa (subclass 500), work rights, and graduate pathways.</p>
            <div class="links-container" id="links-visa">
                <div class="subcategory-subtitle">🎓 Student Visa (subclass 500)</div>
                <ul class="subcategory-list">
                    <li><a href="https://immi.homeaffairs.gov.au/visas/getting-a-visa/visa-listing/student-500" target="_blank" rel="noopener noreferrer">Student visa – Department of Home Affairs</a></li>
                    <li><a href="https://immi.homeaffairs.gov.au/visas/already-have-a-visa/check-visa-details-and-conditions" target="_blank" rel="noopener noreferrer">Check your visa details and conditions (VEVO)</a></li>
                    <li><a href="https://immi.homeaffairs.gov.au/visas/working-in-australia" target="_blank" rel="noopener noreferrer">Work rights during study and after graduation</a></li>
                </ul>
                <div class="subcategory-subtitle">📌 Graduate Visa (subclass 485)</div>
                <ul class="subcategory-list">
                    <li><a href="https://immi.homeaffairs.gov.au/visas/getting-a-visa/visa-listing/temporary-graduate-485" target="_blank" rel="noopener noreferrer">Temporary Graduate Visa (subclass 485) – official guide</a></li>
                    <li><a href="https://immi.homeaffairs.gov.au/" target="_blank" rel="noopener noreferrer">Work options after your studies – Home Affairs</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-visa">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Education -->
        <section id="education" class="section category-block">
            <h2>🎓 Education &amp; Courses</h2>
            <p>Find university rankings, course information, and entry requirements.</p>
            <div class="links-container" id="links-education">
                <ul class="subcategory-list">
                    <li><a href="https://www.topuniversities.com/university-rankings" target="_blank" rel="noopener noreferrer">QS World University Rankings – Search Australian universities</a></li>
                    <li><a href="https://search.studyaustralia.gov.au/courses" target="_blank" rel="noopener noreferrer">Study Australia – Course search tool</a></li>
                    <li><a href="https://www.ielts.org/" target="_blank" rel="noopener noreferrer">IELTS official – Test dates and scores</a></li>
                    <li><a href="https://www.pearsonpte.com/" target="_blank" rel="noopener noreferrer">PTE Academic official</a></li>
                    <li><a href="https://www.education.gov.au/australian-awards" target="_blank" rel="noopener noreferrer">Australia Awards Scholarships (government)</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-education">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Accommodation -->
        <section id="accommodation" class="section category-block">
            <h2>🏠 Accommodation</h2>
            <p>Renting tips, student housing, and legal rights for tenants.</p>
            <div class="links-container" id="links-accommodation">
                <div class="subcategory-subtitle">🔍 Find a property</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.realestate.com.au" target="_blank" rel="noopener noreferrer">Realestate.com.au</a></li>
                    <li><a href="https://www.domain.com.au" target="_blank" rel="noopener noreferrer">Domain.com.au</a></li>
                </ul>
                <div class="subcategory-subtitle">⚖️ Rights &amp; responsibilities</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.consumer.vic.gov.au/housing/renting" target="_blank" rel="noopener noreferrer">Renting rules – Consumer Victoria</a></li>
                    <li><a href="https://www.consumer.vic.gov.au/housing/renting/starting-and-changing-rental-agreements/resources-and-guides-for-renters/renters-guide" target="_blank" rel="noopener noreferrer">Renters Guide (full guide)</a></li>
                </ul>
                <div class="subcategory-subtitle">🆘 Legal support</div>
                <ul class="subcategory-list">
                    <li><a href="https://studymelbourne.vic.gov.au/about-study-melbourne/our-student-programs/isealp" target="_blank" rel="noopener noreferrer">Free accommodation legal advice – Study Melbourne</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-accommodation">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Insurance -->
        <section id="insurance" class="section category-block">
            <h2>🩺 Medical Insurance (OSHC)</h2>
            <p>Overseas Student Health Cover – providers, claims, and what is covered.</p>
            <div class="links-container" id="links-insurance">
                <div class="subcategory-subtitle">🏥 Compare providers</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.medibank.com.au/overseas-students/" target="_blank" rel="noopener noreferrer">Medibank OSHC</a></li>
                    <li><a href="https://www.allianzcare.com.au/en/students/oshc.html" target="_blank" rel="noopener noreferrer">Allianz Care OSHC</a></li>
                    <li><a href="https://www.bupa.com.au/health-insurance/oshc" target="_blank" rel="noopener noreferrer">Bupa OSHC</a></li>
                    <li><a href="https://www.nib.com.au/overseas-students" target="_blank" rel="noopener noreferrer">NIB OSHC</a></li>
                </ul>
                <div class="subcategory-subtitle">📋 How to claim</div>
                <ul class="subcategory-list">
                    <li><a href="https://oshcaustralia.com.au/" target="_blank" rel="noopener noreferrer">OSHC Australia – Comparison &amp; claim guide</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-insurance">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Transport -->
        <section id="transport" class="section category-block">
            <h2>🚆 Transportation</h2>
            <p>Public transport cards, airport transfers, and student discounts.</p>
            <div class="links-container" id="links-transport">
                <div class="subcategory-subtitle">🚃 Daily transport</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.ptv.vic.gov.au/tickets/myki/" target="_blank" rel="noopener noreferrer">Myki official guide – PTV</a></li>
                    <li><a href="https://transportnsw.info/tickets-opal/opal" target="_blank" rel="noopener noreferrer">Opal card – Transport NSW (Sydney)</a></li>
                </ul>
                <div class="subcategory-subtitle">✈️ Airport to city</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.melbourneairport.com.au" target="_blank" rel="noopener noreferrer">Melbourne Airport (MEL) – transport options</a></li>
                    <li><a href="https://www.avalonairport.com.au" target="_blank" rel="noopener noreferrer">Avalon Airport (AVV)</a></li>
                    <li><a href="https://www.skybus.com.au" target="_blank" rel="noopener noreferrer">SkyBus – Airport shuttle service</a></li>
                </ul>
                <div class="subcategory-subtitle">🎓 Student discounts</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.ptv.vic.gov.au/tickets/concessions/tertiary-student-concession/" target="_blank" rel="noopener noreferrer">Tertiary student concession – PTV</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-transport">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Jobs -->
        <section id="jobs" class="section category-block">
            <h2>💼 Part-time Jobs</h2>
            <p>Work rights, tax file number, and job searching platforms.</p>
            <div class="links-container" id="links-jobs">
                <div class="subcategory-subtitle">⚖️ Work rights &amp; TFN</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.fairwork.gov.au/tools-and-resources/fact-sheets/rights-and-obligations/international-students" target="_blank" rel="noopener noreferrer">Student work rights (48 hours per fortnight) – Fair Work</a></li>
                    <li><a href="https://www.ato.gov.au/individuals/tax-file-number" target="_blank" rel="noopener noreferrer">How to apply for a Tax File Number (TFN) – ATO</a></li>
                </ul>
                <div class="subcategory-subtitle">🔍 Find a job</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.seek.com.au" target="_blank" rel="noopener noreferrer">SEEK – Australia's largest job board</a></li>
                    <li><a href="https://au.indeed.com" target="_blank" rel="noopener noreferrer">Indeed Australia</a></li>
                    <li><a href="https://www.studymelbourne.vic.gov.au" target="_blank" rel="noopener noreferrer">Study Melbourne – Student job resources</a></li>
                </ul>
                <div class="subcategory-subtitle">📈 Career planning</div>
                <ul class="subcategory-list">
                    <li><a href="career-planning.php">Career planning guide for international students</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-jobs">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Banking -->
        <section id="banking" class="section category-block">
            <h2>🏦 Banking &amp; Communication</h2>
            <p>Open a bank account, mobile plans, and daily services.</p>
            <div class="links-container" id="links-banking">
                <div class="subcategory-subtitle">🏧 Major banks</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.commbank.com.au" target="_blank" rel="noopener noreferrer">Commonwealth Bank</a></li>
                    <li><a href="https://www.anz.com.au" target="_blank" rel="noopener noreferrer">ANZ</a></li>
                    <li><a href="https://www.nab.com.au" target="_blank" rel="noopener noreferrer">NAB</a></li>
                    <li><a href="https://www.westpac.com.au" target="_blank" rel="noopener noreferrer">Westpac</a></li>
                </ul>
                <div class="subcategory-subtitle">📱 Mobile providers</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.telstra.com.au" target="_blank" rel="noopener noreferrer">Telstra</a></li>
                    <li><a href="https://www.optus.com.au" target="_blank" rel="noopener noreferrer">Optus</a></li>
                    <li><a href="https://www.vodafone.com.au" target="_blank" rel="noopener noreferrer">Vodafone</a></li>
                </ul>
                <div class="subcategory-subtitle">💸 Money transfer</div>
                <ul class="subcategory-list">
                    <li><a href="https://wise.com/au/" target="_blank" rel="noopener noreferrer">Wise – International money transfer</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-banking">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

        <!-- Official -->
        <section id="official" class="section category-block">
            <h2>🏛️ Official Resources</h2>
            <p>Government websites, immigration, fair work, and tax office.</p>
            <div class="links-container" id="links-official">
                <div class="subcategory-subtitle">🏠 Immigration</div>
                <ul class="subcategory-list">
                    <li><a href="https://immi.homeaffairs.gov.au/" target="_blank" rel="noopener noreferrer">Department of Home Affairs</a></li>
                </ul>
                <div class="subcategory-subtitle">⚖️ Fair Work Ombudsman</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.fairwork.gov.au/tools-and-resources/fact-sheets/rights-and-obligations/international-students" target="_blank" rel="noopener noreferrer">International students fact sheet</a></li>
                </ul>
                <div class="subcategory-subtitle">📚 Study Australia</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.studyaustralia.gov.au" target="_blank" rel="noopener noreferrer">Study Australia – official portal</a></li>
                </ul>
                <div class="subcategory-subtitle">💰 Australian Taxation Office</div>
                <ul class="subcategory-list">
                    <li><a href="https://www.ato.gov.au/" target="_blank" rel="noopener noreferrer">ATO – Tax and super for students</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="toggle-btn" data-target="links-official">View more →</button>
                <a href="#search-area" class="back-to-top">↑ Back to top</a>
            </div>
        </section>

    </main>

    <!-- ── Floating Back-to-Top Button ── -->
    <button class="fab-top" id="fabTop" aria-label="Back to top">↑</button>

    <footer class="site-footer">
        <div class="container">
            <p>© 2026 Australia Student Hub</p>
            <p>Target users: International students / Prospective students / Parents</p>
        </div>
    </footer>

    <script>
    // ─────────────────────────────────────────────
    // 1. Toggle "View more / Show less"
    // ─────────────────────────────────────────────
    document.querySelectorAll('.toggle-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const targetId  = this.getAttribute('data-target');
            const targetDiv = document.getElementById(targetId);
            const isOpen    = targetDiv.classList.contains('show');
            targetDiv.classList.toggle('show', !isOpen);
            this.textContent = isOpen ? 'View more →' : 'Show less ↑';
        });
    });

    // ─────────────────────────────────────────────
    // 2. Search — highlights ALL matching sections
    //    AND auto-expands their link containers
    // ─────────────────────────────────────────────
    const searchBtn        = document.getElementById('searchBtn');
    const searchInput      = document.getElementById('searchInput');
    const searchResultInfo = document.getElementById('searchResultInfo');
    const noResultsMsg     = document.getElementById('noResultsMsg');
    const sections         = document.querySelectorAll('.category-block');

    function clearHighlights() {
        sections.forEach(s => s.classList.remove('highlight-match'));
        searchResultInfo.textContent = '';
        noResultsMsg.classList.remove('show');
    }

    function performSearch(keyword) {
        keyword = keyword.trim();
        if (!keyword) { clearHighlights(); return; }

        clearHighlights();
        const kw      = keyword.toLowerCase();
        const matched = [];

        sections.forEach(section => {
            if (section.innerText.toLowerCase().includes(kw)) {
                matched.push(section);
            }
        });

        if (matched.length === 0) {
            noResultsMsg.classList.add('show');
            searchResultInfo.textContent = `No results for "${keyword}"`;
            return;
        }

        matched.forEach(section => {
            section.classList.add('highlight-match');

            // FIX: Auto-expand links container so results are visible immediately
            const linksDiv  = section.querySelector('.links-container');
            const toggleBtn = section.querySelector('.toggle-btn');
            if (linksDiv && !linksDiv.classList.contains('show')) {
                linksDiv.classList.add('show');
                if (toggleBtn) toggleBtn.textContent = 'Show less ↑';
            }

            // Remove highlight after 4s
            setTimeout(() => section.classList.remove('highlight-match'), 4000);
        });

        // Scroll to first match
        matched[0].scrollIntoView({ behavior: 'smooth', block: 'start' });

        // FIX: Show count of ALL matches, not just the first
        searchResultInfo.textContent =
            matched.length === 1
                ? '1 category matched'
                : `${matched.length} categories matched`;
    }

    searchBtn.addEventListener('click', () => performSearch(searchInput.value));
    searchInput.addEventListener('keypress', e => {
        if (e.key === 'Enter') performSearch(searchInput.value);
    });
    searchInput.addEventListener('input', () => {
        if (!searchInput.value.trim()) clearHighlights();
    });

    document.querySelectorAll('.hot-tag').forEach(tag => {
        tag.addEventListener('click', () => {
            const kw = tag.getAttribute('data-keyword');
            searchInput.value = kw;
            performSearch(kw);
        });
    });

    // ─────────────────────────────────────────────
    // 3. Fixed category nav bar — slides in when
    //    hero scrolls out of view, highlights
    //    active section while scrolling
    // ─────────────────────────────────────────────
    const categoryNav = document.getElementById('categoryNav');
    const fabTop      = document.getElementById('fabTop');
    const navBtns     = document.querySelectorAll('.cat-nav-btn');
    const heroArea    = document.getElementById('search-area');

    // Click nav button → smooth scroll to section
    navBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = document.getElementById(btn.getAttribute('data-target'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Show/hide nav bar and FAB based on hero visibility
    const heroObserver = new IntersectionObserver(entries => {
        const heroVisible = entries[0].isIntersecting;
        categoryNav.classList.toggle('visible', !heroVisible);
        fabTop.classList.toggle('visible', !heroVisible);
    }, { threshold: 0 });
    heroObserver.observe(heroArea);

    // Highlight active section in nav bar as user scrolls
    const sectionObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navBtns.forEach(btn => {
                    btn.classList.toggle('active', btn.getAttribute('data-target') === id);
                });
            }
        });
    }, { rootMargin: '-40% 0px -55% 0px' });

    sections.forEach(s => sectionObserver.observe(s));

    // ─────────────────────────────────────────────
    // 4. Back to top — inline links + FAB button
    // ─────────────────────────────────────────────
    document.querySelectorAll('.back-to-top').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    fabTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    </script>

</body>
</html>