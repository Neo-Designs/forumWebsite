<?php
session_start();
include 'db.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['avatar'] = $user['avatar'];

        echo "success";
        exit;
    } else {
        echo "Incorrect password";
        exit;
    }
} else {
    echo "User not found";
    exit;
}

$stmt->close();
$conn->close();
?>
