<?php
/**
 * public/admin/dashboard.php - Admin Professional Dashboard
 */
require_once __DIR__ . '/../../core/Guard.php';
Guard::protect(['admin']);

$pageTitle = 'Admin Central';
require_once __DIR__ . '/../layout/header.php';
?>

<div class="row">
    <!-- Main Info Section -->
    <div class="col col-8">
        <div class="card">
            <h2>Dashboard Overview</h2>
            <p class="mt-1 muted">System Status: <span class="badge badge-success">Online</span></p>
            <p class="mt-2">
                Manage internship ecosystem, validate logbooks, and ensure data integrity via internal blockchain ledger. Fully authorized control center.
            </p>
            <div class="mt-2" style="display:flex; gap:10px; flex-wrap:wrap;">
                <button class="btn btn-primary">Audit System</button>
                <button class="btn btn-accent">User Manager</button>
            </div>
        </div>
    </div>

    <!-- Integrity Sidebar -->
    <div class="col col-4">
        <div class="card">
            <h3>Integrity Shield</h3>
            <p class="muted mt-1">Identity Hash (CAP):</p>
            <div class="hash-box mt-1">
                <?= $_SESSION['cap']; ?>
            </div>
            <div class="mt-2">
                <p style="color: var(--primary-teal); font-weight: 800; font-size: 0.75rem; letter-spacing: 0.05em;">
                    SECURED BY BLOCKCHAIN
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <div class="card text-center">
            <h4 class="muted">Active Students</h4>
            <div style="font-size: 2rem; font-weight: 900; color: var(--text-main); margin: 0.5rem 0;">142</div>
            <p class="badge badge-success">Verified</p>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <h4 class="muted">Pending Logs</h4>
            <div style="font-size: 2rem; font-weight: 900; color: var(--accent-gold); margin: 0.5rem 0;">12</div>
            <p class="badge badge-warning">Review Needed</p>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <h4 class="muted">System Uptime</h4>
            <div style="font-size: 2rem; font-weight: 900; color: var(--primary-teal); margin: 0.5rem 0;">99.9%</div>
            <p class="muted">Encrypted Health</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
