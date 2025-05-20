<?php
require 'init.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $subject_id = $_POST['subject_id'] ?? null;
    $user_id = $_POST['user_id'] ?? null;

    $imagePath = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = "images/";
        $imagePath = time() . "_" . $imageName;
        $targetFile = $targetDir . $imagePath;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $imagePath;
        }

    }

    $stmt = $conn->prepare("INSERT INTO posts (title, content, image_url, subject, poster) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $title, $content, $imagePath, $subject_id, $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: subject.php?id=" . urlencode($subject_id));
    exit();
}
?>
