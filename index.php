<?php
/**
 * Main Entry Point
 */
if (!file_exists(__DIR__ . '/config/config.php')) {
    header("Location: setup.php");
    exit();
}

require_once __DIR__ . '/config/config.php';

// If already configured, go to login
header("Location: public/index.php");
exit();
