<?php 
include 'post_functions.php';
if (isset($postData)): ?>
    <?php while($post = $postData->fetch_assoc()): ?>
        <div class="post">
            <h2 class="post-title">
                <a href="post.php?post_id=<?= $post['id'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
            </h2>

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
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts found 😢</p>
<?php endif; ?>

