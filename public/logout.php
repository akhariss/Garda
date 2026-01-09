<?php
/**
 * public/logout.php - Logout
 */
require_once __DIR__ . '/../core/Auth.php';
Auth::logout();
header("Location: index.php?msg=logged_out");
exit();
