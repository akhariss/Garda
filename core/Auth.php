<?php
/**
 * Auth.php - Enterprise Grade Authentication Logic
 */
require_once __DIR__ . '/Connection.php';

class Auth {
    /**
     * Generate Integrity CAP (Hash) - Production Ready
     * Uses a salt from config to prevent hash manipulation
     */
    public static function generateCap($username, $role, $password_hash) {
        return hash('sha256', $username . $role . $password_hash . AUTH_SALT);
    }

    /**
     * User Login with full integrity verification
     */
    public static function login($username, $password) {
        try {
            $db = Connection::getInstance();
            
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND status = 'active' LIMIT 1");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if (!$user) {
                return ['success' => false, 'message' => 'Kredensial tidak valid.'];
            }

            // 1. Password Verification
            if (!password_verify($password, $user['password_hash'])) {
                return ['success' => false, 'message' => 'Kredensial tidak valid.'];
            }

            // 2. Generate Local Integrity CAP
            $localCap = self::generateCap($user['username'], $user['role'], $user['password_hash']);

            // 3. Blockchain/Integrity Layer Verification
            if (!self::verifyIntegrity($user['id'], $localCap)) {
                return [
                    'success' => false, 
                    'message' => 'Kegagalan Integritas Terdeteksi. Akun terkunci sementara.'
                ];
            }

            // 4. Session Management
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            // Regenerate ID to prevent session fixation
            session_regenerate_id(true);
            
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['cap']      = $localCap;
            $_SESSION['last_act'] = time();

            return ['success' => true, 'role' => $user['role']];

        } catch (Exception $e) {
            error_log("Login Error: " . $e->getMessage());
            return ['success' => false, 'message' => 'Internal Server Error.'];
        }
    }

    /**
     * Mock Blockchain Integrity Verification
     */
    private static function verifyIntegrity($userId, $localCap) {
        $db = Connection::getInstance();
        
        $stmt = $db->prepare("SELECT cap_hash FROM blockchain_registry WHERE user_id = ? ORDER BY id DESC LIMIT 1");
        $stmt->execute([$userId]);
        $registered = $stmt->fetch();

        // If no registry yet (first migration), create first block
        if (!$registered) {
            return self::syncBlockchain($userId, $localCap);
        }

        return $registered['cap_hash'] === $localCap;
    }

    /**
     * Sync Local Hash to "Blockchain"
     */
    public static function syncBlockchain($userId, $cap) {
        try {
            $db = Connection::getInstance();
            
            // Get previous hash for chain linking
            $stmt = $db->prepare("SELECT cap_hash FROM blockchain_registry ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $prev = $stmt->fetch();
            $prevHash = $prev ? $prev['cap_hash'] : str_repeat('0', 64);

            $stmt = $db->prepare("INSERT INTO blockchain_registry (user_id, cap_hash, block_index, prev_hash) VALUES (?, ?, ?, ?)");
            $stmt->execute([$userId, $cap, 1, $prevHash]);

            // Update user record
            $stmt = $db->prepare("UPDATE users SET cap_aktif = ? WHERE id = ?");
            $stmt->execute([$cap, $userId]);
            
            return true;
        } catch (Exception $e) {
            error_log("Blockchain Sync Error: " . $e->getMessage());
            return false;
        }
    }

    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
}
