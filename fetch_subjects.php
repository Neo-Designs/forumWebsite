<<<<<<< HEAD
<?php while ($row = $subjects->fetch_assoc()): ?>
    <div class="subject-card">
        <div class="banner-container">
            <img src="images/<?= htmlspecialchars($row['subject_banner']) ?>" class="subject-banner" alt="Subject Banner">
            <img src="images/<?= htmlspecialchars($row['subject_img']); ?>" class="subject-img" alt="Subject Icon">
        </div>

        <div class="subject-info">
            <div class="subject-header">
                <a href="subject.php?id=<?= $row['id'] ?>">
                    <h2><?= htmlspecialchars($row['name']); ?></h2>
                </a>
                <?php if ($userId): ?>
                    <button class="follow-btn <?= in_array($row['id'], $followed) ? 'unfollow' : '' ?>" data-subject-id="<?= $row['id'] ?>">
                        <?= in_array($row['id'], $followed) ? 'Unfollow' : 'Follow' ?>
                    </button>
                <?php endif; ?>
            </div>
            <div class="subject-desc"><?= htmlspecialchars($row['description']) ?></div>
        </div>
    </div>
=======
<?php while ($row = $subjects->fetch_assoc()): ?>
    <div class="subject-card">
        <div class="banner-container">
            <img src="images/<?= htmlspecialchars($row['subject_banner']) ?>" class="subject-banner" alt="Subject Banner">
            <img src="images/<?= htmlspecialchars($row['subject_img']); ?>" class="subject-img" alt="Subject Icon">
        </div>

        <div class="subject-info">
            <div class="subject-header">
                <a href="subject.php?id=<?= $row['id'] ?>">
                    <h2><?= htmlspecialchars($row['name']); ?></h2>
                </a>
                <?php if ($userId): ?>
                    <button class="follow-btn <?= in_array($row['id'], $followed) ? 'unfollow' : '' ?>" data-subject-id="<?= $row['id'] ?>">
                        <?= in_array($row['id'], $followed) ? 'Unfollow' : 'Follow' ?>
                    </button>
                <?php endif; ?>
            </div>
            <div class="subject-desc"><?= htmlspecialchars($row['description']) ?></div>
        </div>
    </div>
>>>>>>> 1e6a7397863faf86f0fd017a8458472c15972b50
<?php endwhile; ?>