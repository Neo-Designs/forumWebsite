<<<<<<< HEAD
<?php
include 'init.php';
include 'db.php';

$subjectId = $_POST['subject_id'] ?? 0;
$action = $_POST['action'] ?? "";

if (!$userId || !$subjectId || !in_array($action, ['follow', 'unfollow'])) {
    die("Invalid request");
}

if ($action === "follow") {
    $stmt = $conn->prepare("INSERT IGNORE INTO followers (user_id, subject_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $subjectId);
    $stmt->execute();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    $stmt = $conn->prepare("DELETE FROM followers WHERE user_id = ? AND subject_id = ?");
    $stmt->bind_param("ii", $userId, $subjectId);
    $stmt->execute();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$conn->close();
=======
<?php
include 'init.php';
include 'db.php';

$subjectId = $_POST['subject_id'] ?? 0;
$action = $_POST['action'] ?? "";

if (!$userId || !$subjectId || !in_array($action, ['follow', 'unfollow'])) {
    die("Invalid request");
}

if ($action === "follow") {
    $stmt = $conn->prepare("INSERT IGNORE INTO followers (user_id, subject_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $subjectId);
    $stmt->execute();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    $stmt = $conn->prepare("DELETE FROM followers WHERE user_id = ? AND subject_id = ?");
    $stmt->bind_param("ii", $userId, $subjectId);
    $stmt->execute();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$conn->close();
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
?>