<?php 
include 'post_functions.php';
$replyList = [];
while ($row = $replies->fetch_assoc()) {
    $replyList[] = $row;
}

?>

<div class="post-thread">
    <div class="post-box">
        <div class="post">
            <h2 class="post-title"><?= htmlspecialchars($post['title']) ?></h2>

            <div class="post-meta">
                <img src="images/<?= htmlspecialchars($post['poster_avatar']) ?>" class="avatar" alt="Avatar">
                <div>
                    <ul class="poster-info">
                        <li>
                            <a href="profile.php?id=<?= $post['poster'] ?>">
                                <small><?= htmlspecialchars($post['poster_name']) ?></small><br>
                            </a>
                        </li>
                        <li>
                            <a href="subject.php?id=<?= $post['subject'] ?>">
                                <small><?= htmlspecialchars($post['subject_name']) ?></small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php if (!empty($post['image_url'])): ?>
                <div class="image-container">
                    <img src="images/<?= htmlspecialchars($post['image_url']) ?>" alt="Problem image" class="post-image">
                </div>
            <?php endif; ?>
            <p class="post-content"><?= htmlspecialchars($post['content']) ?></p><br>

            <div class="likes-timestamp-row">
                <div class="likes-container">
                    <button class="like-btn" data-post-id="<?= $post['id'] ?>" data-type="post">
                        <img class="like-icon" src="images/<?= $post['liked_by_user'] > 0 ? 'liked.png' : 'like.png' ?>" alt="Like">
                    </button>
                    <span class="like-count"><?= $post['likes'] ?> Likes</span>
                </div>
                <div class="timestamp"><?= htmlspecialchars(time_elapsed_string($post['timestamp'])) ?></div>
            </div>
        </div>
    </div>

    <form method="POST" action="add_reply.php" class="reply-form">
        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
        <input type="hidden" name="parent_id" value="">
        <textarea name="reply" placeholder="Join the conversation!" id="replyContent"></textarea>
        <button type="submit">Reply</button>
    </form>

    <div class="replies-section">
        <?php displayReplies($replyList, null, $post['id']); ?>
    </div>
</div>

<aside class="post-sidebar-container">
    <div class="post-sidebar">
        <h3><?= htmlspecialchars($post['subject_name']) ?></h3>
        <p><?= htmlspecialchars($post['description']) ?></p>
        <hr>
        <p><strong>Followers:</strong>
        <?php 
            $f_stmt = $conn->prepare("SELECT COUNT(*) as count FROM followers WHERE subject_id = ?");
            $f_stmt->bind_param("i", $post['subject_id']);
            $f_stmt->execute();
            $followers = $f_stmt->get_result()->fetch_assoc()['count'];
            echo $followers;
            $f_stmt->close();
        ?></p>
    </div>

    <?php
        $similar_stmt = $conn->prepare("SELECT id, title FROM posts WHERE subject = ? AND id != ? LIMIT 5");
        $similar_stmt->bind_param("ii", $post['subject'], $post_id);
        $similar_stmt->execute();
        $result = $similar_stmt->get_result();

        if ($result->num_rows > 0): ?>
            <div class="similar-posts">
                <h4>Similar Posts</h4>
                <?php while ($similar = $result->fetch_assoc()): ?>
                    <div class="similar-post">
                        <a href="post.php?post_id=<?= $similar['id'] ?>">
                            <?= htmlspecialchars($similar['title']) ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
    <?php endif;
        $similar_stmt->close();
    ?>
</aside>