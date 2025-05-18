<?php
session_start();
require_once 'db.php';

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}

$displayName = trim($_POST['display_name'] ?? '');
$bio = trim($_POST['bio'] ?? '');
$newPassword = $_POST['password'] ?? '';
$currentPassword = $_POST['current_password'] ?? '';
$avatar = $user['avatar'];

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $newFileName = "avatar_$userId." . $ext;
    $targetPath = "images/" . $newFileName;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)) {
        $avatar = $newFileName;
    }
}

if (!empty($newPassword)) {
    if (!password_verify($currentPassword, $user['password'])) {
        echo "Current password is incorrect.";
        exit;
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("UPDATE users SET display_name = ?, bio = ?, avatar = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $displayName, $bio, $avatar, $hashedPassword, $userId);
} else {
    $stmt = $conn->prepare("UPDATE users SET display_name = ?, bio = ?, avatar = ? WHERE id = ?");
    $stmt->bind_param("sssi", $displayName, $bio, $avatar, $userId);
}

if ($stmt->execute()) {
    header("Location: profile.php");
    exit;
} else {
    echo "Error updating profile.";
}
?>