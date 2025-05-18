<?php
session_start();
include 'db.php';

$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = $_POST['password'];
$display_name = $username;

if (empty($username) || strlen($username) < 4) {
    echo "Invalid: Username must be at least 4 characters long.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}

$emailCheck = $conn->prepare("SELECT * FROM users WHERE email = ?");
$emailCheck->bind_param("s", $email);
$emailCheck->execute();
$emailResult = $emailCheck->get_result();

if ($emailResult->num_rows > 0) {
    echo "Error: This email is already taken.";
    exit;
}

$usernameCheck = $conn->prepare("SELECT * FROM users WHERE username = ?");
$usernameCheck->bind_param("s", $username);
$usernameCheck->execute();
$usernameResult = $usernameCheck->get_result();

if ($usernameResult->num_rows > 0) {
    echo "Error: This username is already taken.";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$default_avatar = "default_avatar.png";

$sql = "INSERT INTO users(username, email, password, avatar, display_name) VALUES(?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss",$username, $email, $hashedPassword, $default_avatar, $display_name);

if ($stmt->execute()) {
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['username'] = $username;
    $_SESSION['avatar'] = $default_avatar;

    echo "success";
    exit;
} else {
    echo "Error: Unable to sign up. Please try again later.";
}

$stmt->close();
$conn->close();
?>
