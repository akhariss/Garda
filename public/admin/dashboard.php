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
    <!-- Main Card -->
    <div class="card" style="grid-column: span 2;">
        <h2 style="margin-bottom: 20px;">Administrator Overview</h2>
        <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 20px;">
            Sistem Garda saat ini sedang berjalan dalam mode operasional penuh. Anda memiliki otorisasi tingkat tinggi untuk mengelola akses pengguna, memvalidasi laporan PKL, serta memantau integritas data yang disimpan dalam ledger internal.
        </p>
        <button class="nav-link active" style="border:none; cursor:pointer; display:inline-flex; width:auto; padding: 12px 24px;">
            Mulai Audit Sistem
        </button>
    </div>

    <!-- Integrity Status -->
    <div class="card">
        <h3>System Integrity</h3>
        <p style="font-size: 0.8rem; color: var(--text-muted); margin: 10px 0;">Current Session Identity Hash (CAP):</p>
        <div class="hash-code" style="background: #f1f5f9; padding: 10px; border-radius: 8px; word-break: break-all;">
            <?php echo $_SESSION['cap']; ?>
        </div>
        <div style="margin-top: 20px; font-size: 0.85rem; color: #10b981; font-weight: 600;">
            <i class="ph-bold ph-sketch-logo"></i> Sync Status: Blockchain Linked
        </div>
    </div>
</div>

<div class="row" style="margin-top: 24px;">
    <div class="card">
        <h4>User Statistik</h4>
        <div style="font-size: 2rem; font-weight: 800; margin: 10px 0; color: var(--primary);">142</div>
        <p style="font-size: 0.8rem; color: var(--text-muted);">Mahasiswa aktif terdaftar</p>
    </div>
    <div class="card">
        <h4>Laporan Pending</h4>
        <div style="font-size: 2rem; font-weight: 800; margin: 10px 0; color: #f59e0b;">12</div>
        <p style="font-size: 0.8rem; color: var(--text-muted);">Menunggu verifikasi admin</p>
    </div>
    <div class="card">
        <h4>Server Health</h4>
        <div style="font-size: 2rem; font-weight: 800; margin: 10px 0; color: #10b981;">99.9%</div>
        <p style="font-size: 0.8rem; color: var(--text-muted);">Uptime bulan ini</p>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
