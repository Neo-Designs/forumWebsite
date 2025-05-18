<?php
session_start();
header('Content-Type: application/json');
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$postId = $_POST['post_id'] ?? null;

if (!$postId) {
    echo json_encode(['success' => false, 'message' => 'Missing post ID']);
    exit;
}

// Check if already liked
$checkStmt = $conn->prepare("SELECT 1 FROM likes WHERE user_id = ? AND post_id = ?");
$checkStmt->bind_param("ii", $userId, $postId);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    // Unlike
    $actionStmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND post_id = ?");
    $liked = false;
} else {
    // Like
    $actionStmt = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
    $liked = true;
}

$actionStmt->bind_param("ii", $userId, $postId);
$actionStmt->execute();

// Get updated like count
$countStmt = $conn->prepare("SELECT COUNT(*) as count FROM likes WHERE post_id = ?");
$countStmt->bind_param("i", $postId);
$countStmt->execute();
$countResult = $countStmt->get_result()->fetch_assoc();
$like_count = $countResult['count'];

echo json_encode(['success' => true, 'liked' => $liked, 'like_count' => $like_count]);
?>
