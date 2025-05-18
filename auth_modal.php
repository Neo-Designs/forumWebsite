<?php if (isset($_GET['error'])): ?>
    <div class="error-msg">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>
            
<div class="modal-content">
    <span class="close-btn">&times;</span>
    <h2 id="modal-title">Login</h2>
    <div id="authMessage" class="auth-message"></div>

    <form id="authForm">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" id="authSubmit">Login</button>
    </form>

    <p class="switch-auth">New to Bridgify? <a href="#" id="switchLink">Sign up!</a></p>
</div>