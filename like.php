<<<<<<< HEAD
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
=======
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

$stmt = $conn->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
$stmt->bind_param("ii", $userId, $postId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND post_id = ?");
    $stmt->bind_param("ii", $userId, $postId);
    $stmt->execute();
    $liked = false;
} else {
    $stmt = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $postId);
    $stmt->execute();
    $liked = true;
}

$stmt = $conn->prepare("SELECT COUNT(*) as count FROM likes WHERE post_id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();
$countResult = $stmt->get_result()->fetch_assoc();
$like_count = $countResult['count'];

echo json_encode(['success' => true, 'liked' => $liked, 'like_count' => $like_count]);
?>
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
