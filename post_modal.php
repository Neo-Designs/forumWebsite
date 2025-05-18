<div class="post-modal-content">
    <span class="close-btn">&times;</span>
    <h2>Create New Post</h2>

    <form action="add_post.php" method="POST" enctype="multipart/form-data" id="postForm">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
        <input type="text" name="subject" value="<?php echo $subject['name']; ?>" readonly>
        <textarea name="content" rows="5" placeholder="Content" required></textarea>
        <input type="file" name="image" class="image-input">
        
        <input type="hidden" name="subject_id" value="<?= htmlspecialchars($subject_id) ?>">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id']) ?>">


        <button type="submit">Bridge it!</button>
    </form>
</div>