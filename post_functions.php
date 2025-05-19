<?php
function displayReplies($replies, $parentId = null, $postId = null) {
    foreach ($replies as $reply) {
        if ($reply['parent_reply_id'] == $parentId) {
            $margin = ($parentId !== null) ? '30px' : '0px';
            ?>
            <div class="reply-box" style="margin-left: <?= $margin ?>;">
                <div class="reply-meta">
                    <img src="images/<?= htmlspecialchars($reply['replier_avatar']) ?>" class="avatar" alt="Avatar">
                    <a href="profile.php?id=<?= $reply['replier'] ?>">
                        <small><?= htmlspecialchars($reply['replier_name']) ?></small>
                    </a>
                </div>

                <p class="reply-content"><?= htmlspecialchars($reply['reply']) ?></p>

                <div class="likes-timestamp-row">
                    <div class="likes-container">
                        <button class="like-btn" data-post-id="<?= $reply['id'] ?>" data-type="reply">
                            <img class="like-icon" src="images/<?= $reply['liked_by_user'] > 0 ? 'liked.png' : 'like.png' ?>" alt="Like">
                        </button>
                        <span class="like-count"><?= $reply['likes'] ?> Likes</span>
                    </div>
                    <div class="timestamp"><?= htmlspecialchars(time_elapsed_string($reply['timestamp'])) ?></div>
                </div>

                <form method="POST" action="add_reply.php" class="nested-reply-form">
                    <input type="hidden" name="post_id" value="<?= $postId ?>">
                    <input type="hidden" name="parent_id" value="<?= $reply['id'] ?>">
                    <textarea name="reply" required placeholder="Reply to this reply..."></textarea>
                    <button type="submit">Reply</button>
                </form>

                <?php
                displayReplies($replies, $reply['id']);
                ?>
            </div>
            <?php
        }
    }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->invert == 0) {
        return 'Just now';
    }

    $string = [
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
