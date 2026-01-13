<?php
require_once __DIR__ . '/../../config/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pageTitle = $pageTitle ?? 'Garda | Professional System';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <?php if (isset($extraCSS)): ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/<?= $extraCSS ?>">
    <?php endif; ?>
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
    <nav class="navbar">
        <div class="container nav-container">
            <a href="<?= BASE_URL ?>public/router.php" class="nav-brand">
                <div class="dot"></div> GARDA
            </a>
            
            <div class="nav-links-desktop">
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="<?= BASE_URL ?>public/admin/dashboard.php" class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'admin') !== false) ? 'active' : '' ?>">Admin</a>
                <?php elseif ($_SESSION['role'] === 'mahasiswa'): ?>
                    <a href="<?= BASE_URL ?>public/mahasiswa/dashboard.php" class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'mahasiswa') !== false) ? 'active' : '' ?>">Mahasiswa</a>
                <?php elseif ($_SESSION['role'] === 'dosen'): ?>
                    <a href="<?= BASE_URL ?>public/dosen/dashboard.php" class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'dosen') !== false) ? 'active' : '' ?>">Dosen</a>
                <?php elseif ($_SESSION['role'] === 'mitra'): ?>
                    <a href="<?= BASE_URL ?>public/mitra/dashboard.php" class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'mitra') !== false) ? 'active' : '' ?>">Mitra</a>
                <?php endif; ?>
                <a href="<?= BASE_URL ?>public/logout.php" class="nav-link" style="color:#ef4444; border-left: 1px solid var(--border-color); margin-left:10px; padding-left:15px;">Logout</a>
            </div>

            <button class="menu-toggle" id="menuToggle">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-nav">
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="<?= BASE_URL ?>public/admin/dashboard.php" class="nav-link">Admin Dashboard</a>
            <?php elseif ($_SESSION['role'] === 'mahasiswa'): ?>
                <a href="<?= BASE_URL ?>public/mahasiswa/dashboard.php" class="nav-link">My Dashboard</a>
            <?php elseif ($_SESSION['role'] === 'dosen'): ?>
                <a href="<?= BASE_URL ?>public/dosen/dashboard.php" class="nav-link">Dosen Portal</a>
            <?php elseif ($_SESSION['role'] === 'mitra'): ?>
                <a href="<?= BASE_URL ?>public/mitra/dashboard.php" class="nav-link">Mitra Portal</a>
            <?php endif; ?>
            <hr style="border:0; border-top:1px solid var(--border-color); margin: 0.5rem 0;">
            <a href="<?= BASE_URL ?>public/logout.php" class="nav-link" style="color:#ef4444;">Keluar</a>
        </div>
    </div>
    <?php endif; ?>

<div id="app" class="container" style="margin-top: 1.5rem;">
