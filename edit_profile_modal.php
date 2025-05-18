<div class="edit-modal-content">
    <span class="close-btn">&times;</span>
    <h2>Edit Profile</h2>
    <form id="editProfileForm" method="POST" action="update_profile.php" enctype="multipart/form-data">
        <label>New Avatar: <input type="file" name="avatar"></label><br>
        <input type="text" name="display_name" placeholder="Display Name">
        <textarea name="bio" placeholder="Bio"></textarea>
        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="current_password" placeholder="Confirm Current Password">

        <button type="submit">Save Changes</button>
    </form>
</div>
