<?php
session_start();
header('Content-Type: application/json');
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$type = $_POST['type'] ?? null;
$id = $_POST['id'] ?? null;

if (!$type || !$id) {
    echo json_encode(['success' => false, 'message' => 'Missing type or ID']);
    exit;
}

$table = ($type === 'reply') ? 'reply_likes' : 'likes';
$column = ($type === 'reply') ? 'reply_id' : 'post_id';

$stmt = $conn->prepare("SELECT * FROM $table WHERE user_id = ? AND $column = ?");
$stmt->bind_param("ii", $userId, $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt = $conn->prepare("DELETE FROM $table WHERE user_id = ? AND $column = ?");
    $stmt->bind_param("ii", $userId, $id);
    $stmt->execute();
    $liked = false;
} else {
    $stmt = $conn->prepare("INSERT INTO $table (user_id, $column) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $id);
    $stmt->execute();
    $liked = true;
}

$stmt = $conn->prepare("SELECT COUNT(*) as count FROM $table WHERE $column = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$countResult = $stmt->get_result()->fetch_assoc();
$like_count = $countResult['count'];

echo json_encode(['success' => true, 'liked' => $liked, 'like_count' => $like_count]);
?>