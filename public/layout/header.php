<?php
/**
 * header.php - Unified Dashboard Header
 */
require_once __DIR__ . '/../../config/config.php';
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Dashboard'; ?> | <?php echo APP_NAME; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        :root {
            --primary: #6366f1;
            --sidebar-bg: #111113;
            --body-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: var(--body-bg); color: var(--text-dark); display: flex; min-height: 100vh; }

        /* Sidebar */
        aside {
            width: 280px;
            background: var(--sidebar-bg);
            color: white;
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 40px;
            color: white;
            text-decoration: none;
        }

        .nav-list { list-style: none; flex: 1; }
        .nav-item {
            margin-bottom: 8px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }
        .nav-link.active { background: var(--primary); color: white; }

        .logout-area {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
        }

        /* Main Content */
        main { flex: 1; display: flex; flex-direction: column; }
        header {
            height: 80px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
        }

        .welcome-text h1 { font-size: 1.25rem; font-weight: 700; color: #0f172a; }
        .welcome-text p { font-size: 0.875rem; color: #64748b; }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .avatar {
            width: 40px; height: 40px;
            background: #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary);
        }

        .content-body { padding: 40px; }

        .row { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; }
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
            transition: 0.3s;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05); }

        .integrity-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ecfdf5;
            color: #059669;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 24px;
        }
        .hash-code { font-family: 'JetBrains Mono', monospace; font-size: 0.7rem; color: #94a3b8; margin-top: 8px; }
    </style>
</head>
<body>

<aside>
    <a href="#" class="brand">
        <i class="ph-fill ph-shield-check"></i>
        <span>GARDA</span>
    </a>

    <ul class="nav-list">
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="ph-bold ph-squares-four"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="ph-bold ph-users"></i>
                Users / Role
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="ph-bold ph-chart-line-up"></i>
                Analytics
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="ph-bold ph-cube"></i>
                Blockchain Log
            </a>
        </li>
    </ul>

    <div class="logout-area">
        <a href="../logout.php" class="nav-link" style="color: #ef4444;">
            <i class="ph-bold ph-sign-out"></i>
            Logout Session
        </a>
    </div>
</aside>

<main>
    <header>
        <div class="welcome-text">
            <h1>Selamat Datang di Portal Utama</h1>
            <p>Sistem Manajemen Magang & PKL Mahasiswa</p>
        </div>

        <div class="user-profile">
            <div style="text-align: right">
                <div style="font-weight: 700; font-size: 0.9rem;"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                <div style="font-size: 0.75rem; color: #64748b;"><?php echo strtoupper($_SESSION['role']); ?></div>
            </div>
            <div class="avatar">
                <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
            </div>
        </div>
    </header>

    <div class="content-body">
        <div class="integrity-pill">
            <i class="ph-fill ph-check-circle"></i>
            Data Integrity Verified by Chain
        </div>
