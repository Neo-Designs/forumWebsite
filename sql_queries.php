<<<<<<< HEAD
<?php

$postQuery = "SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
ORDER BY posts.timestamp DESC";
$posts = $conn->query($postQuery);

$subjectsQuery = "SELECT * FROM subjects ORDER BY name";
$subjects = $conn->query($subjectsQuery);

$helperQuery = "SELECT username, avatar FROM users ORDER BY id LIMIT 5";
$helpers = $conn->query($helperQuery);

$followed = [];
if ($userId) {
    $stmt = $conn->prepare("SELECT subject_id FROM followers WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $followed[] = $row['subject_id'];
    }
}

$usersQuery = "SELECT * FROM users";
$users = $conn->query($usersQuery);
=======
<?php

$postQuery = "SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
ORDER BY posts.timestamp DESC";
$posts = $conn->query($postQuery);

$subjectsQuery = "SELECT * FROM subjects ORDER BY name";
$subjects = $conn->query($subjectsQuery);

$helperQuery = "SELECT username, avatar FROM users ORDER BY id LIMIT 5";
$helpers = $conn->query($helperQuery);

$followed = [];
if ($userId) {
    $stmt = $conn->prepare("SELECT subject_id FROM followers WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $followed[] = $row['subject_id'];
    }
}

$usersQuery = "SELECT * FROM users";
$users = $conn->query($usersQuery);
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
?>