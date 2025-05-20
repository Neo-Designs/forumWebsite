<?php

if ($isLoggedIn) {
$stmt = $conn->prepare(
"SELECT posts.*, subjects.name AS subject_name, users.display_name AS poster_name, users.avatar AS poster_avatar,
(SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS likes,
(SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id AND likes.user_id = ?) AS liked_by_user
FROM posts
INNER JOIN subjects ON posts.subject = subjects.id
INNER JOIN users ON posts.poster = users.id
INNER JOIN followers ON followers.subject_id = subjects.id
WHERE followers.user_id = ?
ORDER BY posts.timestamp DESC"
);
$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();
$posts = $stmt->get_result();
}

else {
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
}

$subjectsQuery = "SELECT * FROM subjects ORDER BY name";
$subjects = $conn->query($subjectsQuery);

$helperQuery = "
    SELECT users.display_name, users.avatar, COUNT(posts.id) AS post_count
    FROM users
    LEFT JOIN posts ON users.id = posts.poster
    GROUP BY users.id
    ORDER BY post_count DESC
    LIMIT 5
";
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
?>