<?php
session_start();

$conn = new mysqli("127.0.0.1", "root", "", "student_resources_db", 3306);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// ── 防刷：同一 session 60秒内只能提交一次 ────────
$now = time();
$last_submit = $_SESSION['last_message_submit'] ?? 0;
if ($now - $last_submit < 60) {
    header("Location: message_wall.php?error=cooldown");
    exit();
}

// ── 取值 ─────────────────────────────────────────
$name    = trim($_POST['name']    ?? '');
$message = trim($_POST['message'] ?? '');

// ── 空内容检查 ────────────────────────────────────
if (empty($name) || empty($message)) {
    header("Location: message_wall.php?error=empty");
    exit();
}

// ── 长度检查 ──────────────────────────────────────
if (mb_strlen($message, 'UTF-8') > 1000 || mb_strlen($name, 'UTF-8') > 100) {
    header("Location: message_wall.php?error=toolong");
    exit();
}

// ── 垃圾内容过滤：包含URL则拒绝 ──────────────────
$url_pattern = '/https?:\/\/|www\.|\.com|\.net|\.org|\.io/i';
if (preg_match($url_pattern, $message)) {
    header("Location: message_wall.php?error=spam");
    exit();
}

// ── 写入数据库 ────────────────────────────────────
$stmt = $conn->prepare("INSERT INTO message_wall (name, message) VALUES (?, ?)");
if (!$stmt) {
    header("Location: message_wall.php?error=failed");
    exit();
}

$stmt->bind_param("ss", $name, $message);

if ($stmt->execute()) {
    $_SESSION['last_message_submit'] = $now;
    header("Location: message_wall.php?success=1");
    exit();
} else {
    header("Location: message_wall.php?error=failed");
    exit();
}

$stmt->close();
$conn->close();
?>