<<<<<<< HEAD
<?php
$conn = new mysqli('localhost','root','','bridgify');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'] ?? 0;
$isLoggedIn = isset($_SESSION['user_id']);
=======
<?php
$conn = new mysqli('localhost','root','','bridgify');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'] ?? 0;
$isLoggedIn = isset($_SESSION['user_id']);
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
?>