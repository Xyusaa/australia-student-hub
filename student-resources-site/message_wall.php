<?php
session_start();

$conn = new mysqli("127.0.0.1", "root", "", "student_resources_db", 3306);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// ── 分页设置 ──────────────────────────────────────
$per_page     = 10;
$current_page = max(1, intval($_GET['page'] ?? 1));
$offset       = ($current_page - 1) * $per_page;

$total_result = $conn->query("SELECT COUNT(*) as cnt FROM message_wall");
$total_count  = $total_result->fetch_assoc()['cnt'];
$total_pages  = max(1, ceil($total_count / $per_page));
$current_page = min($current_page, $total_pages);

$stmt_list = $conn->prepare("SELECT name, message, created_at FROM message_wall ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt_list->bind_param("ii", $per_page, $offset);
$stmt_list->execute();
$result = $stmt_list->get_result();

// ── 名字脱敏 ──────────────────────────────────────
function maskName($name) {
    $name = trim($name);
    if ($name === '') return 'Anonymous User';
    $length = mb_strlen($name, 'UTF-8');
    if ($length === 1) return '*';
    return str_repeat('*', $length - 1) . mb_substr($name, -1, 1, 'UTF-8');
}

// ── 错误信息 ──────────────────────────────────────
$error = $_GET['error'] ?? '';
$error_messages = [
    'cooldown' => 'You are posting too quickly. Please wait 60 seconds before posting again.',
    'empty'    => 'Your message cannot be empty or blank.',
    'toolong'  => 'Your message is too long. Please keep it under 1000 characters.',
    'spam'     => 'Your message was flagged. Please avoid including URLs or links.',
    'failed'   => 'Something went wrong. Please try again.',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message Wall - Australia Student Hub</title>
  <link rel="stylesheet" href="style.css?v=5">
  <style>
    .wall-hero {
      min-height: 420px;
      display: flex;
      align-items: center;
      padding: 50px 0 90px;
      color: white;
      background: transparent;
    }

    .wall-hero-content { max-width: 760px; }

    .wall-hero h1 {
      font-size: 2.7rem;
      line-height: 1.18;
      margin-bottom: 18px;
      color: #ffffff;
      text-shadow: 0 4px 18px rgba(0, 0, 0, 0.24);
    }

    .wall-hero p {
      font-size: 1.04rem;
      color: rgba(255, 255, 255, 0.95);
      line-height: 1.8;
      max-width: 700px;
    }

    .wall-page { padding: 30px 0 50px; }

    .wall-layout {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 24px;
    }

    .wall-card {
      background: #ffffff;
      border: 1px solid #edf2f7;
      border-radius: 22px;
      padding: 24px;
      box-shadow: 0 10px 28px rgba(15, 23, 42, 0.06);
    }

    .wall-card h2 {
      margin-bottom: 14px;
      font-size: 1.4rem;
      color: #111827;
    }

    .wall-card > p {
      color: #6b7280;
      margin-bottom: 18px;
    }

    /* ── Form ── */
    .wall-form { display: grid; gap: 16px; }

    .wall-form label {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 6px;
      font-weight: 600;
      color: #374151;
    }

    .char-count {
      font-size: 0.78rem;
      font-weight: 400;
      color: #9ca3af;
      transition: color 0.2s;
    }

    .char-count.warning { color: #f59e0b; }
    .char-count.danger  { color: #ef4444; font-weight: 600; }

    .wall-form input,
    .wall-form textarea {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #dbe3f0;
      border-radius: 14px;
      font-size: 1rem;
      box-sizing: border-box;
      font-family: inherit;
      background: #f9fbff;
      outline: none;
      transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    .wall-form input:focus,
    .wall-form textarea:focus {
      border-color: #60a5fa;
      box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.15);
      background: #ffffff;
    }

    .wall-form textarea {
      min-height: 140px;
      resize: vertical;
    }

    .wall-form button {
      border: none;
      border-radius: 14px;
      padding: 14px 18px;
      background: #0b3a6f;
      color: white;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .wall-form button:hover {
      background: #082d57;
      transform: translateY(-1px);
    }

    .wall-form button:disabled {
      background: #9ca3af;
      cursor: not-allowed;
      transform: none;
    }

    /* ── Notices ── */
    .success-message {
      margin-bottom: 16px;
      padding: 12px 14px;
      border-radius: 12px;
      background: #ecfdf5;
      border: 1px solid #a7f3d0;
      color: #065f46;
      font-weight: 600;
    }

    .error-message {
      margin-bottom: 16px;
      padding: 12px 14px;
      border-radius: 12px;
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
      font-weight: 600;
    }

    .guidelines {
      margin-top: 4px;
      padding: 12px 14px;
      border-radius: 12px;
      background: #f0f9ff;
      border: 1px solid #bae6fd;
      font-size: 0.85rem;
      color: #0369a1;
      line-height: 1.7;
    }

    /* ── Message list ── */
    .message-list { display: grid; gap: 16px; }

    .message-item {
      padding: 18px;
      border-radius: 16px;
      background: #f8fafc;
      border: 1px solid #e5e7eb;
      transition: box-shadow 0.2s;
    }

    .message-item:hover {
      box-shadow: 0 4px 14px rgba(15, 23, 42, 0.07);
    }

    .message-top {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 8px;
      flex-wrap: wrap;
    }

    .message-name {
      font-weight: 700;
      color: #111827;
    }

    .message-date {
      font-size: 0.88rem;
      color: #6b7280;
    }

    .message-text {
      color: #374151;
      line-height: 1.8;
      white-space: pre-wrap;
      word-break: break-word;
    }

    /* ── Pagination ── */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
      margin-top: 24px;
      flex-wrap: wrap;
    }

    .page-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 36px;
      height: 36px;
      padding: 0 10px;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
      background: #ffffff;
      color: #374151;
      font-size: 0.88rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
      font-family: inherit;
      cursor: pointer;
    }

    .page-btn:hover { background: #eff6ff; border-color: #93c5fd; color: #1d4ed8; }
    .page-btn.active { background: #2563eb; border-color: #2563eb; color: white; }
    .page-btn.disabled { opacity: 0.4; pointer-events: none; }

    .message-count {
      font-size: 0.85rem;
      color: #6b7280;
      margin-bottom: 16px;
    }

    /* ── Responsive ── */
    @media (max-width: 900px) {
      .wall-layout { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
      .wall-hero { min-height: auto; padding: 40px 0 70px; }
      .wall-hero h1 { font-size: 2rem; }
      .wall-card { padding: 20px; }
    }
  </style>
</head>
<body>
  <header class="site-header message-wall-header">
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

      <section class="wall-hero">
        <div class="wall-hero-content">
          <h1>Message Wall</h1>
          <p>
            Share your thoughts, suggestions, or study-in-Australia experiences with others.
            Leave a message and see what other students want to say.
          </p>
        </div>
      </section>
    </div>
  </header>

  <main class="container wall-page">
    <div class="wall-layout">

      <!-- ── 留言表单 ── -->
      <section class="wall-card">
        <h2>Leave a Message</h2>
        <p>Write a short public message for other visitors and students.</p>

        <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
          <div class="success-message">✓ Your message has been posted successfully.</div>
        <?php endif; ?>

        <?php if ($error && isset($error_messages[$error])): ?>
          <div class="error-message">⚠ <?php echo $error_messages[$error]; ?></div>
        <?php endif; ?>

        <form class="wall-form" id="wallForm" action="submit_message.php" method="POST">
          <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" maxlength="100" placeholder="e.g. Alex" required>
          </div>

          <div>
            <label for="message">
              Message
              <span class="char-count" id="charCount">0 / 1000</span>
            </label>
            <textarea id="message" name="message" maxlength="1000" placeholder="Share your experience, tips, or thoughts..." required></textarea>
          </div>

          <div class="guidelines">
            📌 Keep it friendly and respectful. Avoid sharing personal details or external links.
          </div>

          <button type="submit" id="submitBtn">Post Message</button>
        </form>
      </section>

      <!-- ── 消息列表 ── -->
      <section class="wall-card">
        <h2>Recent Messages</h2>

        <?php if ($total_count > 0): ?>
          <p class="message-count">
            Showing <?php echo $offset + 1; ?>–<?php echo min($offset + $per_page, $total_count); ?> of <?php echo $total_count; ?> messages
          </p>
        <?php endif; ?>

        <div class="message-list">
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <article class="message-item">
                <div class="message-top">
                  <span class="message-name"><?php echo htmlspecialchars(maskName($row['name'])); ?></span>
                  <span class="message-date"><?php echo htmlspecialchars($row['created_at']); ?></span>
                </div>
                <div class="message-text"><?php echo nl2br(htmlspecialchars($row['message'])); ?></div>
              </article>
            <?php endwhile; ?>
          <?php else: ?>
            <p>No messages yet. Be the first to leave one.</p>
          <?php endif; ?>
        </div>

        <!-- 分页 -->
        <?php if ($total_pages > 1): ?>
          <div class="pagination">
            <a class="page-btn <?php echo $current_page <= 1 ? 'disabled' : ''; ?>"
               href="?page=<?php echo $current_page - 1; ?>">← Prev</a>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <?php if ($i == 1 || $i == $total_pages || abs($i - $current_page) <= 1): ?>
                <a class="page-btn <?php echo $i === $current_page ? 'active' : ''; ?>"
                   href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              <?php elseif (abs($i - $current_page) == 2): ?>
                <span class="page-btn disabled">…</span>
              <?php endif; ?>
            <?php endfor; ?>

            <a class="page-btn <?php echo $current_page >= $total_pages ? 'disabled' : ''; ?>"
               href="?page=<?php echo $current_page + 1; ?>">Next →</a>
          </div>
        <?php endif; ?>
      </section>

    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© 2026 Australia Student Hub</p>
      <p>Target users: International students / Prospective students / Parents</p>
    </div>
  </footer>

  <script>
    // ── 字数计数器 ────────────────────────────────
    const textarea  = document.getElementById('message');
    const charCount = document.getElementById('charCount');

    textarea.addEventListener('input', () => {
      const len = textarea.value.length;
      charCount.textContent = `${len} / 1000`;
      charCount.className = 'char-count';
      if (len >= 900) charCount.classList.add('danger');
      else if (len >= 700) charCount.classList.add('warning');
    });

    // ── 防重复提交（前端60秒冷却） ────────────────
    const form      = document.getElementById('wallForm');
    const submitBtn = document.getElementById('submitBtn');
    const COOLDOWN  = 60;
    const STORAGE_KEY = 'msg_last_submit';

    function getRemainingCooldown() {
      const last = parseInt(localStorage.getItem(STORAGE_KEY) || '0');
      const elapsed = Math.floor((Date.now() - last) / 1000);
      return Math.max(0, COOLDOWN - elapsed);
    }

    function startCooldownUI(seconds) {
      submitBtn.disabled = true;
      let remaining = seconds;
      const tick = () => {
        submitBtn.textContent = `Please wait ${remaining}s...`;
        if (remaining <= 0) {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Post Message';
          return;
        }
        remaining--;
        setTimeout(tick, 1000);
      };
      tick();
    }

    // 页面加载时检查是否还在冷却中
    const remaining = getRemainingCooldown();
    if (remaining > 0) startCooldownUI(remaining);

    form.addEventListener('submit', (e) => {
      const left = getRemainingCooldown();
      if (left > 0) {
        e.preventDefault();
        startCooldownUI(left);
        return;
      }
      // 纯空格检测
      if (!textarea.value.trim()) {
        e.preventDefault();
        textarea.focus();
        return;
      }
      localStorage.setItem(STORAGE_KEY, Date.now().toString());
    });
  </script>
</body>
</html>
<?php
$stmt_list->close();
$conn->close();
?>