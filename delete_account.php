<<<<<<< HEAD
<?php
include 'init.php';
include 'db.php';

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->close();

session_destroy();
echo "<script>
    alert('Your account has been deleted. We’ll miss you 🥺💔');
    window.location.href = 'index.php';
</script>";
?>
=======
<?php
include 'init.php';
include 'db.php';

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->close();

session_destroy();
echo "<script>
    alert('Your account has been deleted. We’ll miss you 🥺💔');
    window.location.href = 'index.php';
</script>";
?>
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
