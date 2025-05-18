<?php
include 'init.php';
include 'db.php';
include 'sql_queries.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Subjects</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="script.js" defer></script>
</head>

<body>
    <header>
        <?php include 'header.php';?>
    </header>

    <div class="container">
        <aside class="left-panel">
            <?php include 'left_panel.php';?>
        </aside>

        <main>
            <h2>Explore All Subjects</h2>

            <div class="subjects-container">
                <?php include 'fetch_subjects.php';?>
            </div>
        </main>
        
        <aside class="right-panel">
            <?php include 'right_panel.php';?>
        </aside>
        
        <div id="authModal" class="modal">
            <?php include 'auth_modal.php';?>
        </div>
    </div>
</body>
</html>
