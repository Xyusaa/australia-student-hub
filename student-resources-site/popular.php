<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Popular Resources - Australia Student Hub</title>
  <meta name="description" content="Popular resources for international students in Australia, including visa, accommodation, OSHC, jobs, transport, banking, and official information." />
  <link rel="stylesheet" href="style.css?v=6" />

  <style>
    .popular-hero {
      min-height: 520px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 80px 0 100px;
      color: white;
      text-align: center;
      background: transparent;
      border-radius: 0;
      box-shadow: none;
    }

    .popular-hero .container {
      max-width: 860px;
    }

    .popular-hero h1 {
      font-size: 2.9rem;
      margin-bottom: 18px;
      line-height: 1.15;
      color: #ffffff;
      text-shadow: 0 4px 18px rgba(0, 0, 0, 0.24);
    }

    .popular-hero p {
      max-width: 760px;
      margin: 0 auto;
      font-size: 1.06rem;
      line-height: 1.8;
      color: rgba(255,255,255,0.94);
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.18);
    }

    .popular-intro {
      margin: 40px 0 16px;
    }

    .popular-intro h2 {
      font-size: 1.9rem;
      margin-bottom: 10px;
      color: #1f2937;
    }

    .popular-intro p {
      color: #6b7280;
      line-height: 1.7;
    }

    .popular-filter {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 24px 0 30px;
    }

    .filter-btn {
      border: none;
      background: #e5e7eb;
      color: #374151;
      padding: 10px 16px;
      border-radius: 999px;
      cursor: pointer;
      font-size: 0.92rem;
      font-weight: 600;
      transition: 0.2s ease;
    }

    .filter-btn:hover {
      background: #dbeafe;
      color: #1d4ed8;
    }

    .filter-btn.active {
      background: #2563eb;
      color: white;
    }

    .resource-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
      gap: 22px;
      margin-bottom: 50px;
    }

    .resource-card {
      background: #ffffff;
      border-radius: 18px;
      padding: 22px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
      border: 1px solid #eef2f7;
      transition: 0.25s ease;
      display: flex;
      flex-direction: column;
      min-height: 250px;
    }

    .resource-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    }

    .resource-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 14px;
    }

    .resource-badge {
      display: inline-block;
      font-size: 0.75rem;
      font-weight: 700;
      padding: 6px 10px;
      border-radius: 999px;
      background: #eff6ff;
      color: #2563eb;
    }

    .resource-official {
      background: #ecfdf5;
      color: #059669;
    }

    .resource-title {
      font-size: 1.08rem;
      font-weight: 700;
      color: #111827;
      margin: 8px 0 10px;
      line-height: 1.45;
    }

    .resource-desc {
      color: #6b7280;
      font-size: 0.95rem;
      line-height: 1.7;
      flex-grow: 1;
    }

    .resource-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 14px 0 16px;
    }

    .resource-tag {
      font-size: 0.78rem;
      color: #4b5563;
      background: #f3f4f6;
      padding: 5px 10px;
      border-radius: 999px;
    }

    .resource-link {
      margin-top: auto;
      text-decoration: none;
      color: #2563eb;
      font-weight: 700;
      font-size: 0.95rem;
    }

    .resource-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .popular-hero {
        min-height: auto;
        padding: 50px 0 80px;
      }

      .popular-hero h1 {
        font-size: 2rem;
      }

      .popular-hero p {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <header class="site-header popular-header">
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
    </div>

    <section class="popular-hero">
      <div class="container">
        <h1>Popular Resources</h1>
        <p>
          Essential information international students search most often before and after arriving in Australia.
          Browse popular topics such as visas, renting, OSHC, part-time jobs, transport, banking, and official government resources.
        </p>
      </div>
    </section>
  </header>

  <main class="container">
    <section class="popular-intro">
      <h2>Recommended for International Students</h2>
      <p>
        This page highlights the most useful and frequently accessed resources for prospective students, current students,
        and parents. Use the category buttons below to quickly filter the information you need.
      </p>
    </section>

    <div class="popular-filter">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="Visa & Entry">Visa</button>
      <button class="filter-btn" data-filter="Accommodation">Housing</button>
      <button class="filter-btn" data-filter="Medical Insurance">OSHC</button>
      <button class="filter-btn" data-filter="Part-time Jobs">Jobs</button>
      <button class="filter-btn" data-filter="Transportation">Transport</button>
      <button class="filter-btn" data-filter="Banking & Communication">Banking</button>
      <button class="filter-btn" data-filter="Official Resources">Official</button>
    </div>

    <section class="resource-grid" id="popularResourceList"></section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© 2026 Australia Student Hub</p>
      <p>Target users: International students / Prospective students / Parents</p>
    </div>
  </footer>

  <script>
    const popularResources = [
      {
        title: "Student Visa (Subclass 500) Guide",
        category: "Visa & Entry",
        official: true,
        description: "Learn the student visa application process, Genuine Student requirement, work rights, and visa conditions for studying in Australia.",
        link: "categories.php#visa",
        tags: ["Visa", "High Demand", "New Students"]
      },
      {
        title: "Renting in Melbourne and Sydney",
        category: "Accommodation",
        official: false,
        description: "Understand rent prices, bond, inspections, lease agreements, and common rental problems for international students.",
        link: "categories.php#accommodation",
        tags: ["Housing", "Rent", "Daily Life"]
      },
      {
        title: "OSHC Explained for International Students",
        category: "Medical Insurance",
        official: true,
        description: "Find out what OSHC covers, how to compare providers, how to claim, and how to use healthcare services in Australia.",
        link: "categories.php#insurance",
        tags: ["OSHC", "Health", "Important"]
      },
      {
        title: "Part-time Job Basics and TFN",
        category: "Part-time Jobs",
        official: true,
        description: "Understand student work limits, tax file number application, safe job searching, and resume basics for Australia.",
        link: "categories.php#jobs",
        tags: ["Jobs", "TFN", "Work Rights"]
      },
      {
        title: "Public Transport Cards and Student Discounts",
        category: "Transportation",
        official: false,
        description: "A quick starter guide to Myki, Opal, concession cards, public transport tips, and commuting as a student.",
        link: "categories.php#transport",
        tags: ["Transport", "Myki", "Opal"]
      },
      {
        title: "Bank Account and Mobile Plan Setup",
        category: "Banking & Communication",
        official: false,
        description: "Compare major banks, mobile providers, and money transfer options for your first weeks in Australia.",
        link: "categories.php#banking",
        tags: ["Bank", "SIM", "Arrival"]
      },
      {
        title: "Top Universities and Course Selection",
        category: "Education & Courses",
        official: false,
        description: "Explore Australian universities, English requirements, pathway programs, and popular course options.",
        link: "categories.php#education",
        tags: ["University", "Courses", "Planning"]
      },
      {
        title: "Official Government Resource Collection",
        category: "Official Resources",
        official: true,
        description: "Access the most important official websites, including Home Affairs, Fair Work, Study Australia, and the ATO.",
        link: "categories.php#official",
        tags: ["Official", "Government", "Trusted"]
      }
    ];

    const resourceList = document.getElementById("popularResourceList");
    const filterButtons = document.querySelectorAll(".filter-btn");

    function renderResources(filter = "all") {
      const filtered =
        filter === "all"
          ? popularResources
          : popularResources.filter(item => item.category === filter);

      resourceList.innerHTML = filtered.map(item => `
        <article class="resource-card">
          <div class="resource-top">
            <span class="resource-badge">${item.category}</span>
            <span class="resource-badge ${item.official ? "resource-official" : ""}">
              ${item.official ? "Official" : "Guide"}
            </span>
          </div>

          <h3 class="resource-title">${item.title}</h3>
          <p class="resource-desc">${item.description}</p>

          <div class="resource-meta">
            ${item.tags.map(tag => `<span class="resource-tag">${tag}</span>`).join("")}
          </div>

          <a class="resource-link" href="${item.link}">View Resource →</a>
        </article>
      `).join("");
    }

    filterButtons.forEach(button => {
      button.addEventListener("click", () => {
        filterButtons.forEach(btn => btn.classList.remove("active"));
        button.classList.add("active");
        renderResources(button.dataset.filter);
      });
    });

    renderResources();
  </script>
</body>
</html>