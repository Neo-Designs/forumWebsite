<?php
session_start();
session_destroy();
echo "<script>
    alert('👋 Bye for now, see you soon!');
    window.location.href = 'index.php';
</script>";
?>
