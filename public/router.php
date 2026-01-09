<?php
/**
 * public/router.php - Smart redirection based on role
 */
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /public/index.php");
    exit();
}

$role = $_SESSION['role'];

switch ($role) {
    case 'admin':
        header("Location: admin/dashboard.php");
        break;
    case 'mahasiswa':
        header("Location: mahasiswa/dashboard.php");
        break;
    case 'dosen':
        header("Location: dosen/dashboard.php");
        break;
    case 'mitra':
        header("Location: mitra/dashboard.php");
        break;
    default:
        session_destroy();
        header("Location: index.php?error=unknown_role");
        break;
}
exit();
