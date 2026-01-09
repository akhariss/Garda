<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garda | Authentication System</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --accent: #c084fc;
            --bg: #09090b;
            --card: rgba(24, 24, 27, 0.8);
            --border: rgba(255, 255, 255, 0.1);
            --text: #fafafa;
            --text-muted: #a1a1aa;
        }

        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(192, 132, 252, 0.1) 0%, transparent 40%);
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: var(--card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.8);
        }

        .logo-area {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-text {
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            background: linear-gradient(135deg, var(--text) 0%, var(--text-muted) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .tagline {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 8px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .input-control {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 16px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
            background: rgba(0, 0, 0, 0.5);
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.5);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            padding: 12px;
            border-radius: 12px;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 24px;
            display: none;
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }

        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }

        .loader {
            width: 20px; height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
            display: none;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .footer-note {
            text-align: center;
            margin-top: 32px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .blockchain-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(16, 185, 129, 0.1);
            color: #34d399;
            padding: 4px 10px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .glass-orb {
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="glass-orb" style="top: -100px; right: -100px; background: rgba(99, 102, 241, 0.2);"></div>
<div class="glass-orb" style="bottom: -100px; left: -100px; background: rgba(192, 132, 252, 0.15);"></div>

<div class="login-wrapper">
    <div class="card">
        <div class="logo-area">
            <div class="blockchain-badge">
                <span class="dot" style="width: 8px; height: 8px; background: #10b981; border-radius: 50%;"></span>
                BLOCKCHAIN SECURED
            </div>
            <h1 class="logo-text">GARDA</h1>
            <p class="tagline">Integrity System v1.0</p>
        </div>

        <div id="alertBox" class="alert"></div>

        <form id="authForm">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="input-control" placeholder="admin" required autocomplete="username">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="input-control" placeholder="••••••••" required autocomplete="current-password">
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <span id="btnText">Sign In to Dashboard</span>
                <div class="loader" id="loader"></div>
            </button>
        </form>
    </div>

    <p class="footer-note">
        &copy; 2026 Garda Professional Framework. <br>
        All transactions are hashed and verified.
    </p>
</div>

<script>
    const authForm = document.getElementById('authForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const loader = document.getElementById('loader');
    const alertBox = document.getElementById('alertBox');

    authForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        alertBox.style.display = 'none';
        btnText.style.display = 'none';
        loader.style.display = 'block';
        submitBtn.disabled = true;

        const formData = new FormData(authForm);
        
        try {
            const response = await fetch('../api/auth_login.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                submitBtn.style.background = '#10b981';
                btnText.textContent = 'Redirecting...';
                btnText.style.display = 'block';
                loader.style.display = 'none';
                
                setTimeout(() => {
                    window.location.href = 'router.php';
                }, 800);
            } else {
                showAlert(result.message);
            }
        } catch (error) {
            showAlert('ERR_CONNECTION: Gagal terhubung ke API.');
        } finally {
            if (!alertBox.style.display || alertBox.style.display === 'none') {
            } else {
                resetBtn();
            }
        }
    });

    function showAlert(msg) {
        alertBox.textContent = msg;
        alertBox.style.display = 'block';
        resetBtn();
    }

    function resetBtn() {
        btnText.style.display = 'block';
        loader.style.display = 'none';
        submitBtn.disabled = false;
    }
</script>

</body>
</html>
