-- ==========================================================
-- GARDA SYSTEM DATABASE SCHEMA
-- Source of Truth for Database Structure
-- ==========================================================

-- 1. Table for Users (RBAC Core)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'mahasiswa', 'dosen', 'mitra') NOT NULL,
    cap_aktif VARCHAR(64) DEFAULT NULL, -- SHA-256 integrity hash
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Simulated Blockchain Registry (Integrity Proof)
CREATE TABLE IF NOT EXISTS blockchain_registry (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cap_hash VARCHAR(64) NOT NULL,
    block_index INT NOT NULL,
    prev_hash VARCHAR(64) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
