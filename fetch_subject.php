<div class="s-banner-container">
    <img src="images/<?= htmlspecialchars($subject['subject_banner']) ?>" class="s-subject-banner" alt="Subject Banner">
    <img src="images/<?= htmlspecialchars($subject['subject_img']); ?>" class="s-subject-img" alt="Subject Icon">
</div>
<div class="s-info">
    <div class="subject-title-area">
        <h1><?php echo $subject['name']; ?></h1>
    </div>
    <?php if ($userId): ?>
        <div class="subject-buttons">
            <button id="createPostBtn">New Post</button>
            <form method="POST" action="follow_subject.php" onClick="event.stopPropagation()">
                <input type="hidden" name="subject_id" value="<?= $subject_id ?>">
                <input type="hidden" name="action" value="<?= in_array($subject_id, $followed) ? 'unfollow' : 'follow' ?>">
                <button type="submit" class="follow-btn <?= in_array($subject_id, $followed) ? 'unfollow' : '' ?>">
                    <?= in_array($subject_id, $followed) ? 'Unfollow' : 'Follow' ?>
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>

<div class="sort-section">
    <label for="sort">Sort posts:</label>
    <select id="sort" onchange="sortPosts(this.value)">
        <option value="newest" <?= $sort == 'newest' ? 'selected' : '' ?>>Newest</option>
        <option value="most_liked" <?= $sort == 'most_liked' ? 'selected' : '' ?>>Most Liked</option>
        <option value="trending" <?= $sort == 'trending' ? 'selected' : '' ?>>Trending</option>
    </select>
</div>

<div class="posts-and-sidebar">
    <div class="s-posts-container">
        <div class="posts" id="posts-container">
            <?php $postData = $subjectPosts;
            include 'fetch_posts.php';?>
        </div>
    </div>

    <aside class="sidebar-container">
        <div class="subject-sidebar">
            <h3><?php echo $subject['name']; ?></h3>
            <p><?php echo $subject['description']; ?></p>

            <hr>
            <p><strong>Followers:</strong>
            <?php 
                $f_stmt = $conn->prepare("SELECT COUNT(*) as count FROM followers WHERE subject_id = ?");
                $f_stmt->bind_param("i", $subject_id);
                $f_stmt->execute();
                $followers = $f_stmt->get_result()->fetch_assoc()['count'];
                echo $followers;
                $f_stmt->close();
            ?></p>
        </div>
    </aside>

</div>

<script>
//sort posts
function sortPosts(value) {
    const params = new URLSearchParams(window.location.search);
    params.set('sort', value);
    window.location.search = params.toString();
}
</script>