<?php
require 'init.php';
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$post_id = $_POST['post_id'];
$parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;
$reply_text = trim($_POST['reply']);
$user_id = $_SESSION['user_id'];

if (!$post_id || !$reply_text) {
    header("Location: post.php?post_id=$post_id&error=empty");
    exit;
}

$stmt = $conn->prepare("INSERT INTO replies (post, replier, reply, parent_reply_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iisi", $post_id, $user_id, $reply_text, $parent_id);
$stmt->execute();
$stmt->close();

header("Location: post.php?post_id=$post_id");
exit;
?>
