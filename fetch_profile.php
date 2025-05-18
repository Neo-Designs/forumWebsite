<div class="main-profile">
    <div class="profile-header">
        <img src="images/<?= htmlspecialchars($user['avatar']); ?>" class="profile-user-avatar" id="user-avatar" alt="User Avatar">
        <div class="profile-names">
            <div class="display-name" id="display-name">
                <h1><?php echo $user['display_name']; ?></h1>
            </div>
            <div class="username" id="username">
                <h3>@<?php echo $user['username']; ?></h3>
            </div>
        </div>
    </div>

    <div class="tab">
        <button class="tablinks" onclick="switchTab(event, 'Posts')" id="defaultOpen">Posts</button>
        <button class="tablinks" onclick="switchTab(event, 'Replies')">Replies</button>
        <button class="tablinks" onclick="switchTab(event, 'Following')">Following</button>
    </div>

    <div id="Posts" class="tabcontent">
        <div class="posts" id="posts-container">
            <?php $postData = $userPosts;
            include 'fetch_posts.php';?>
        </div>
    </div>

    <div id="Replies" class="tabcontent">
        <div class="posts" id="replies-container">
            <h2>This is where replies should go</h2>
            <p>I should style them and add them to the project</p>
        </div>
    </div>    
    
    <div id="Following" class="tabcontent">
        <div class="following" id="following-container">
            <?php while ($row = $followed_subjects->fetch_assoc()): ?>
                <div class="subject-badge">
                    <img src="images/<?= htmlspecialchars($row['subject_img']); ?>" alt="Subject Icon">
                    <div><?= htmlspecialchars($row['name']); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<aside class="right-profile-container">
    <div class = "right-profile">
        <h3 id="sidebar-name"><?php echo $user['display_name']; ?></h3>
        <p id="user-bio"><?php echo $user['bio']; ?></p>
        <p id="join-date"><?php echo $user['date_joined']; ?></p>

        <hr>
        <p>Total Posts: <span id="total-posts"><?php echo $totalPosts['total_posts']; ?></span></p>
        <p>Total Replies: <span id="total-replies"><?php echo $totalReplies['total_replies']; ?></span></p>

        <?php if($user['id'] === $userId): ?>
            <hr>
            <div class="edit-buttons" id="owner-buttons">
                <button id ="editProfileBtn">Edit Profile</button>
                <button onclick="logout()">Logout</button>
                <button onclick="deleteAccount()">Delete Account</button>
            </div>
        <?php endif; ?>
    </div>
</aside>

<div id="editModal" class="modal">
<div class="edit-modal-content">
    <span class="close-btn">&times;</span>
    <h2>Edit Profile</h2>
    <form id="editProfileForm" method="POST" action="update_profile.php" enctype="multipart/form-data">
        <div class="avatar-preview-wrapper">
            <img src="images/<?= htmlspecialchars($user['avatar']) ?>" id="avatarPreview" alt="Avatar">
            <button type="button" class="change-avatar-btn" onclick="document.getElementById('avatarInput').click()">+</button>
        </div>
        <input type="file" name="avatar" id="avatarInput" style="display: none;">

        <input type="text" name="display_name" placeholder="Display Name">
        <textarea name="bio" placeholder="Bio"></textarea>
        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="current_password" placeholder="Confirm Current Password">

        <button type="submit">Save Changes</button>
    </form>
</div>
</div>

<script>
        function switchTab(evt, tab) {
        var i, tabcontent, tablinks;
      
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
      
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
      
        document.getElementById(tab).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();


    const editProfileModal = document.getElementById("editModal");
    const editProfileBtn = document.getElementById("editProfileBtn");
    const editCloseBtn = editProfileModal.querySelector(".close-btn");

    editProfileModal.style.visibility = "hidden";
    editProfileModal.style.opacity = "0";

    editProfileBtn.addEventListener("click", () => {
        editProfileModal.style.visibility = "visible";
        editProfileModal.style.opacity = 1;
    });

    editCloseBtn.onclick = () => {
        editProfileModal.style.visibility = "hidden";
        editProfileModal.style.opacity = 0;
    };
    
    window.addEventListener("click", (e) => {
        if (e.target === editProfileModal) {
            editProfileModal.style.visibility = "hidden";
            editProfileModal.style.opacity = 0;
        }
    });

    document.getElementById("avatarTrigger").addEventListener("click", () => {
        document.getElementById("avatarInput").click();
    });

    document.getElementById("avatarInput").addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("avatarPreview").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    const form = document.getElementById("editProfileForm");
    const newPassword = form.querySelector('input[name="password"]');
    const confirmPassword = form.querySelector('input[name="current_password"]');

    form.addEventListener("submit", function (e) {
        if (newPassword.value.trim() !== "") {
            if (confirmPassword.value.trim() === "") {
                e.preventDefault();
                alert("Please confirm your current password to change your password.");
                confirmPassword.focus();
            }
        }
    });

    function logout() {
        if (confirm("Are you sure you want to logout? 😥")) {
            window.location.href = 'logout.php';
        }
    }
    
    function deleteAccount() {
        if (confirm("Are you sure you want delete your account? 🥺")) {
            window.location.href = 'delete_account.php';
        }
    }
</script>