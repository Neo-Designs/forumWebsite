<?php
include 'init.php';
include 'db.php';

$stmt = $conn->prepare(
"SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar,
(SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS likes,
0 AS liked_by_user
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
WHERE posts.timestamp >= NOW() - INTERVAL 30 DAY
ORDER BY likes DESC"
);
$stmt->execute();
$posts = $stmt->get_result();

$subjectsQuery = "SELECT * FROM subjects ORDER BY name";
$subjects = $conn->query($subjectsQuery);

$helperQuery = "SELECT username, avatar FROM users ORDER BY id LIMIT 5";
$helpers = $conn->query($helperQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Posts || Bridgify</title>
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

        <main>
            <div class="posts">
                <?php $postData = $posts;
                include 'fetch_posts.php';?>
            </div>
        </main>

        <aside class="right-panel">
            <?php include 'right_panel.php';?>
        </aside>

        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>
    </div>
</body>
</html>