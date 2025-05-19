<<<<<<< HEAD
<section class="leaderboard">
    <h3>Top Bridge Builders</h3>
    <ul>
        <?php while($helper = $helpers->fetch_assoc()): ?>
        <li>
            <img src="images/<?= htmlspecialchars($helper['avatar']) ?>" class="avatar-sm">
            <span><?= htmlspecialchars($helper['username']) ?></span>
        </li>
        <?php endwhile; ?>
    </ul>
</section>

<section class="quick-ask">
    <h3>Quick Ask Panel</h3>
    <div class="fields">
        <form action="add_post.php" method="POST" enctype="multipart/form-data">
            <select name="subject_id" required>
                <option value="">Select Subject</option>
                <?php while ($row = $subjects->fetch_assoc()): ?>
                    <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['name']); ?></option>
                <?php endwhile; ?>
            </select>
            <input type="text" name="title" placeholder="What's your question?" required>
            <input type="hidden" name="user_id" value="<?= $isLoggedIn ? htmlspecialchars($_SESSION['user_id']) : '' ?>">

            <button type="submit" <?= !isset($_SESSION['user_id']) ? 'disabled style="opacity: 0.5; cursor: not-allowed;"' : '' ?>>Bridge it!</button>
        </form>
    </div>
=======
<section class="leaderboard">
    <h3>Top Bridge Builders</h3>
    <ul>
        <?php while($helper = $helpers->fetch_assoc()): ?>
        <li>
            <img src="images/<?= htmlspecialchars($helper['avatar']) ?>" class="avatar-sm">
            <span><?= htmlspecialchars($helper['username']) ?></span>
        </li>
        <?php endwhile; ?>
    </ul>
</section>

<section class="quick-ask">
    <h3>Quick Ask Panel</h3>
    <div class="fields">
        <form action="add_post.php" method="POST" enctype="multipart/form-data">
            <select name="subject_id" required>
                <option value="">Select Subject</option>
                <?php while ($row = $subjects->fetch_assoc()): ?>
                    <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['name']); ?></option>
                <?php endwhile; ?>
            </select>
            <input type="text" name="title" placeholder="What's your question?" required>
            <input type="hidden" name="user_id" value="<?= $isLoggedIn ? htmlspecialchars($_SESSION['user_id']) : '' ?>">

            <button type="submit" <?= !isset($_SESSION['user_id']) ? 'disabled style="opacity: 0.5; cursor: not-allowed;"' : '' ?>>Bridge it!</button>
        </form>
    </div>
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
</section>