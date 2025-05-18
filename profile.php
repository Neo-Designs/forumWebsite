<?php
include 'init.php';
include 'db.php';
include 'sql_queries.php';

$user_id = $_GET['id'] ?? null;
if (!$user_id) die("User not found.");

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
WHERE posts.poster = ?
ORDER BY posts.timestamp DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$userPosts = $stmt->get_result();
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM followers 
INNER JOIN subjects ON followers.subject_id = subjects.id
WHERE followers.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$followed_subjects = $stmt->get_result();
$stmt->close();

$totalPosts = ['total_posts' => 0];
$totalReplies = ['total_replies' => 0];

if ($stmt = $conn->prepare("SELECT COUNT(*) AS total_posts FROM posts WHERE poster = ?")) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $totalPosts = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($stmt = $conn->prepare("SELECT COUNT(*) AS total_replies FROM replies WHERE replier = ?")) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $totalReplies = $result->fetch_assoc();
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['username']; ?> | Bridgify</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="script.js" defer></script>
</head>

<body>
    <header>
        <?php include 'header.php';?>
    </header>


    <div class="container">
        <aside class="left-panel">
            <?php include 'left_panel.php';?>
        </aside>

        <div class="profile-container">
            <?php include 'fetch_profile.php'?>
        </div>

        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>

        <div id="editModal" class="modal">
            <?php include 'edit_profile_modal.php';?>
        </div>

    </div>
</body>
</html>