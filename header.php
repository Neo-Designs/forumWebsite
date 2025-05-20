<div class="logo">
    <img src="images/logo.png" alt="Bridgify Logo">
</div>

<form method="GET" action="search.php" id="searchForm">
  <input type="text" name="query" id="searchInput" placeholder="Search for posts..." required>
</form>



<?php if (isset($_SESSION['username'])): ?>
    <div class="welcome-container">
        <span class="welcome">Welcome back, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong> 💫</span>
        <a href="profile.php?id=<?= $userId ?>" class="profile-link">
            <img src="images/<?php echo htmlspecialchars($_SESSION['avatar']); ?>" alt="Profile Picture" class="avatar">
        </a>
    </div>
<?php else: ?>
    <div class= "auth-buttons">
        <button id="loginBtn" class="login">Login</button>
        <button id="signupBtn" class="login">Sign Up</button>
    </div>
<?php endif; ?>
