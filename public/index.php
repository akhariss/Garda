<?php
/**
 * Standalone Login Page - Minimalist Gen-Z Focus
 * No header/footer includes to keep it 100% clean
 */
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garda | Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
</head>
<body class="login-body">

<main class="login-page">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-logo"><div class="dot"></div>GARDA</h1>
            <p class="login-tagline">Secure access to your ecosystem.</p>
        </div>

        <div id="loginAlert" class="alert"></div>

        <form id="loginForm">
            <div class="input-group">
                <label for="username" class="input-label">Username</label>
                <input type="text" id="username" name="username" class="input-control" placeholder="Enter username" required>
            </div>
            
            <div class="input-group">
                <label for="password" class="input-label">Password</label>
                <div class="input-password-wrapper">
                    <input type="password" id="password" name="password" class="input-control" placeholder="••••••••" required>
                    <span class="pw-toggle" id="pwToggle">👁️</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login" id="loginBtn">
                <span id="btnText">Sign In</span>
                <div class="loader" id="loginLoader" style="display:none;"></div>
            </button>
        </form>
    </div>
</main>

<script src="<?= BASE_URL ?>assets/js/main.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const pwToggle = document.getElementById('pwToggle');
    const pwInput = document.getElementById('password');

    pwToggle.addEventListener('click', () => {
        const type = pwInput.getAttribute('type') === 'password' ? 'text' : 'password';
        pwInput.setAttribute('type', type);
        pwToggle.textContent = type === 'password' ? '👁️' : '🔒';
    });

    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const loader = document.getElementById('loginLoader');

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        btnText.style.display = 'none';
        loader.style.display = 'block';
        loginBtn.disabled = true;

        const formData = new FormData(loginForm);
        const result = await App.post('../api/auth_login.php', formData);

        if (result.success) {
            btnText.textContent = 'Auth Success';
            btnText.style.display = 'block';
            loader.style.display = 'none';
            setTimeout(() => {
                window.location.href = 'router.php';
            }, 300);
        } else {
            App.showAlert('loginAlert', result.message, 'error');
            btnText.style.display = 'block';
            loader.style.display = 'none';
            loginBtn.disabled = false;
        }
    });
});
</script>
</body>
</html>
