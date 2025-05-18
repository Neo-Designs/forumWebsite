<?php if (isset($postData)): ?>
    <?php while($post = $postData->fetch_assoc()): ?>
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
            <p class="post-content"><?= htmlspecialchars($post['content']) ?></p>
            <div class="timestamp"><?= htmlspecialchars(time_elapsed_string($post['timestamp'])) ?></div>
            
            <div class="likes-container">
            <button class="like-btn" data-post-id="<?= $post['id'] ?>">
    <img 
        class="like-icon" 
        src="images/<?= $post['liked_by_user'] > 0 ? 'liked.png' : 'like.png' ?>" 
        alt="Like" 
    />
</button>
<span class="like-count"><?= $post['likes'] ?> Likes</span>

</div>


        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts found 😢</p>
<?php endif; ?>

<?php
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