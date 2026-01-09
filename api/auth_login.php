<?php
/**
 * api/auth_login.php - Handle login POST request
 */
require_once __DIR__ . '/../core/Auth.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid Request']);
    exit();
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Username and Password are required.']);
    exit();
}

$result = Auth::login($username, $password);

echo json_encode($result);
