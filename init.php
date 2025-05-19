<?php
session_start();

$userId = $_SESSION['user_id'] ?? 0;
$isLoggedIn = isset($_SESSION['user_id']);

?>