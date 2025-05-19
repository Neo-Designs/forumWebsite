<?php if (!empty($userReplies)): ?>
    <?php foreach ($userReplies as $reply): ?>
        <div class="reply-box">
            <p class="reply-content"><?= htmlspecialchars($reply['reply']); ?></p>
            <small>On post: <a href="post.php?post_id=<?= $reply['post']; ?>">#<?= $reply['post_title']; ?></a></small>
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No replies yet 😶</p>
<?php endif; ?>
