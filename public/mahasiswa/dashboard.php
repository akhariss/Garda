<?php
/**
 * public/mahasiswa/dashboard.php - Student Portal
 */
require_once __DIR__ . '/../../core/Guard.php';
Guard::protect(['mahasiswa']);

$pageTitle = 'Mahasiswa Portal';
require_once __DIR__ . '/../layout/header.php';
?>

<div class="row">
    <!-- Progress Section -->
    <div class="col col-8">
        <div class="card">
            <h2>Internship Tracking</h2>
            <p class="mt-1 muted">Keep up the good work. Don't forget to sync your daily logs for automated verification.</p>
            
            <div class="progress-container mt-2">
                <div class="progress-bar" style="width: 65%;"></div>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.8rem; font-weight: 800; color: var(--text-main);">
                <span>Progress: 65%</span>
                <span>Estimate: Feb 2026</span>
            </div>
            
            <div class="mt-2" style="display:flex; gap:10px; flex-wrap:wrap;">
                <button class="btn btn-primary">Add Daily Log</button>
                <button class="btn btn-accent">View Reports</button>
            </div>
        </div>
    </div>

    <!-- Integrity Sidebar -->
    <div class="col col-4">
        <div class="card">
            <h3>Identity Shield</h3>
            <p class="muted mt-1">Hashed Transaction ID:</p>
            <div class="hash-box mt-1">
                <?= $_SESSION['cap']; ?>
            </div>
            <p class="muted mt-2" style="font-size: 0.75rem;">
                Your activity is periodically encrypted to maintain original integrity.
            </p>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <div class="card">
            <h4 class="muted">Placement Details</h4>
            <div class="mt-1" style="font-weight: 800; font-size: 1.1rem; color: var(--primary-teal);">PT. Teknologi Digital Nusantara</div>
            <p class="muted">Supervisor: Mr. Andi Santoso</p>
            <div class="mt-1">
                <span class="badge badge-success">Registered</span>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
