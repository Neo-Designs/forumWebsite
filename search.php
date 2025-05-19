<?php

include 'init.php';
include 'db.php';
include 'sql_queries.php';


if (isset($_GET['query'])) {
    $searchTerm = trim($_GET['query']);
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    $userId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
    $sql = "SELECT posts.*, 
                   users.username AS poster_name, 
                   users.avatar AS poster_avatar,
                   subjects.name AS subject_name,
                   (SELECT COUNT(*) FROM likes WHERE post_id = posts.id) AS likes,
                   (SELECT COUNT(*) FROM likes WHERE post_id = posts.id AND user_id = $userId) AS liked_by_user
            FROM posts
            JOIN users ON posts.poster = users.id
            JOIN subjects ON posts.subject = subjects.id
            WHERE posts.title LIKE '%$searchTerm%' 
               OR posts.content LIKE '%$searchTerm%'
            ORDER BY posts.timestamp DESC";


    $postData = $conn->query($sql);

    
}
else {
    echo "<p>No search term entered </p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridgify - Where Questions Meet Answers</title>
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
    <?php include 'left_panel.php'; ?>
  </aside>

  <main>
    <h1>Search Results for "<?= htmlspecialchars($searchTerm) ?>"</h1>
    <div class="posts">
      <?php include 'fetch_posts.php'; ?>
    </div>
  </main>

  <aside class="right-panel">
    <?php include 'right_panel.php'; ?>
  </aside>
</div>

</body>
</html>