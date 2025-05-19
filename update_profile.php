<?php
session_start();
require_once 'db.php';

$userId = $_SESSION['user_id'] ?? 0;
if (!$userId) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}

$displayName = !empty($_POST['display_name']) ? trim($_POST['display_name']) : $user['display_name'];
$bio = !empty($_POST['bio']) ? trim($_POST['bio']) : $user['bio'];
$newPassword = $_POST['password'] ?? '';
$currentPassword = $_POST['current_password'] ?? '';
$avatar = $user['avatar'];

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['avatar']['tmp_name']);
    finfo_close($finfo);

    if (in_array($mime, $allowedTypes)) {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $newFileName = "avatar_$userId." . $ext;
        $targetPath = "images/" . $newFileName;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)) {
            $avatar = $newFileName;
        }
    } else {
        echo "Invalid image format.";
        exit;
    }
}

if (!empty($newPassword)) {
    if (!password_verify($currentPassword, $user['password'])) {
        echo "Current password is incorrect.";
        exit;
    }

    if (strlen($newPassword) < 6) {
        echo "New password must be at least 6 characters.";
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
    header("Location: profile.php?id=$userId&updated=true");
    exit;
} else {
    echo "Error updating profile.";
}
?>
