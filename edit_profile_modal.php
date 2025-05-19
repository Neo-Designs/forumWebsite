<div class="edit-modal-content">
    <span class="close-btn edit-close-btn">&times;</span>
    <h2>Edit Profile</h2>
    <form id="editProfileForm" method="POST" action="update_profile.php" enctype="multipart/form-data">
        <div class="avatar-preview-wrapper">
            <img src="images/<?= htmlspecialchars($user['avatar']) ?>" id="avatarPreview" alt="Avatar">
            <button type="button" class="change-avatar-btn" onclick="document.getElementById('avatarInput').click()">
                <i class="fas fa-camera"></i>
            </button>

        </div>
        <input type="file" name="avatar" id="avatarInput" style="display: none;">

        <input type="text" name="display_name" placeholder="Display Name" value="<?= htmlspecialchars($user['display_name']) ?>">
        <textarea name="bio" placeholder="Bio"><?= htmlspecialchars($user['bio']) ?></textarea>
        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="current_password" placeholder="Confirm Current Password">

        <button type="submit">Save Changes</button>
    </form>
</div>