<<<<<<< HEAD
<?php
include 'init.php';
include 'db.php';
include 'sql_queries.php';

$subject_id = $_GET['id'] ?? null;
if (!$subject_id) die("Subject not found.");

$stmt = $conn->prepare("SELECT * FROM subjects WHERE id = ?");
$stmt->bind_param("i", $subject_id);
$stmt->execute();
$subject = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("
    SELECT posts.*, 
           subjects.name AS subject_name, 
           users.display_name AS poster_name, 
           users.avatar AS poster_avatar,
           (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS likes,
           (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id AND likes.user_id = ?) AS liked_by_user
    FROM posts
    INNER JOIN subjects ON posts.subject = subjects.id
    INNER JOIN users ON posts.poster = users.id
    WHERE posts.subject = ?
    ORDER BY posts.timestamp DESC
");

$stmt->bind_param("ii", $_SESSION['user_id'], $subject_id);
$stmt->execute();
$subjectPosts = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $subject['name']; ?> | Bridgify</title>
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

        <div class="subject-main">
            <?php include 'fetch_subject.php'?>
        </div>

        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>
        
        <div id="postModal" class="modal">
            <?php include 'post_modal.php';?>
        </div>
    </div>
</body>
</html>


=======
<?php
include 'init.php';
include 'db.php';
include 'sql_queries.php';

$subject_id = $_GET['id'] ?? null;
if (!$subject_id) die("Subject not found.");

$stmt = $conn->prepare("SELECT * FROM subjects WHERE id = ?");
$stmt->bind_param("i", $subject_id);
$stmt->execute();
$subject = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
WHERE posts.subject = ?
ORDER BY posts.timestamp DESC");
$stmt->bind_param("i", $subject_id);
$stmt->execute();
$subjectPosts = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $subject['name']; ?> | Bridgify</title>
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

        <div class="subject-main">
            <?php include 'fetch_subject.php'?>
        </div>

        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>
        
        <div id="postModal" class="modal">
            <?php include 'post_modal.php';?>
        </div>
    </div>
</body>
</html>


>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
