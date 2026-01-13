<?php
/**
 * Guard.php - Access Control Layer
 */

class Guard {
    public static function protect($allowedRoles = []) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 1. Session Existence
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
            self::kickOut("unauthorized");
        }

        // 2. Role Authorization
        if (!empty($allowedRoles) && !in_array($_SESSION['role'], $allowedRoles)) {
            self::kickToRouter("forbidden");
        }

        // 3. Session Timeout (15 mins)
        $timeout = 15 * 60;
        if (isset($_SESSION['last_act']) && (time() - $_SESSION['last_act'] > $timeout)) {
            require_once __DIR__ . '/Auth.php';
            Auth::logout();
            self::kickOut("timeout");
        }
        $_SESSION['last_act'] = time();

        // 4. Integrity Check Reference
        // Ideally, we'd verify current state against DB here if high security is needed
    }

    private static function kickOut($reason) {
        $dest = defined('BASE_URL') ? BASE_URL . 'public/index.php' : '../index.php';
        header("Location: " . $dest . "?error=" . $reason);
        exit();
    }

    private static function kickToRouter($reason) {
        $dest = defined('BASE_URL') ? BASE_URL . 'public/router.php' : '../router.php';
        header("Location: " . $dest . "?error=" . $reason);
        exit();
    }
}
