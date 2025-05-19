<?php
include 'init.php';
include 'db.php';
include 'sql_queries.php';

$post_id = isset($_GET['post_id'])?intval($_GET['post_id']) : 0;

$stmt = $conn->prepare("SELECT posts.*, users.display_name AS poster_name, users.avatar AS poster_avatar, 
    subjects.name AS subject_name, subjects.description, subjects.id AS subject_id,
    (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS likes,
    (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id AND likes.user_id = ?) AS liked_by_user
    FROM posts 
    JOIN users ON posts.poster = users.id
    JOIN subjects ON posts.subject = subjects.id
    WHERE posts.id = ?
");
$stmt->bind_param("ii", $userId, $post_id);
$stmt->execute();
$post_result = $stmt->get_result();
$post = $post_result->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("SELECT replies.*, users.display_name AS replier_name, users.avatar AS replier_avatar,
    (SELECT COUNT(*) FROM reply_likes WHERE reply_likes.reply_id = replies.id) AS likes,
    (SELECT COUNT(*) FROM reply_likes WHERE reply_likes.reply_id = replies.id AND reply_likes.user_id = ?) AS liked_by_user
    FROM replies 
    JOIN users ON replies.replier = users.id
    WHERE replies.post = ?
    ORDER BY replies.timestamp ASC
");
$stmt->bind_param("ii", $userId, $post_id);
$stmt->execute();
$replies = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
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

        <div class="post-main">
            <?php include 'fetch_post.php'?>
        </div>

        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>
    </div>
</body>
</html>