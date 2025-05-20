<section class="leaderboard">
    <h3>Top Bridge Builders</h3>
    <ul>
        <?php if ($helpers->num_rows > 0): ?>
            <?php $rank = 1; ?>
            <?php while($helper = $helpers->fetch_assoc()): ?>
                <?php
                    $medal = '';
                    if ($rank === 1) $medal = '🥇';
                    elseif ($rank === 2) $medal = '🥈';
                    elseif ($rank === 3) $medal = '🥉';
                ?>
                <li>
                    <img src="images/<?= htmlspecialchars($helper['avatar']) ?>" class="avatar-sm">
                    <span>
                        <?= $medal ?> <?= htmlspecialchars($helper['display_name']) ?>
                        <small>(<?= $helper['post_count'] ?> posts)</small>
                    </span>
                </li>
                <?php $rank++; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <li>No helpful humans this week 😢</li>
        <?php endif; ?>
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
</section>