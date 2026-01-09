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
    <div class="card" style="grid-column: span 2;">
        <h2>Progress Magang Kamu</h2>
        <p style="color: var(--text-muted); margin: 10px 0 20px 0;">Halo, teruskan semangat magangmu. Pastikan logbook harian selalu diisi untuk memudahkan pembuatan laporan otomatis.</p>
        
        <div style="background: #f1f5f9; height: 12px; border-radius: 6px; margin-bottom: 10px;">
            <div style="background: var(--primary); width: 65%; height: 100%; border-radius: 6px;"></div>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 0.85rem; font-weight: 600;">
            <span>Progress: 65%</span>
            <span>Target: 100% (Selesai Feb 2026)</span>
        </div>
    </div>

    <div class="card">
        <h3>Log Integrity</h3>
        <p style="font-size: 0.8rem; color: var(--text-muted); margin: 10px 0;">ID Transaksi Kamu:</p>
        <div class="hash-code">
            <?php echo $_SESSION['cap']; ?>
        </div>
        <p style="margin-top: 15px; font-size: 0.75rem;">Setiap aktivitasmu dicatat secara permanen di blockchain Garda untuk validitas laporan akhir.</p>
    </div>
</div>

<div class="row" style="margin-top: 24px;">
    <div class="card">
        <h4>Input Logbook</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted); margin: 10px 0;">Tambahkan aktivitas harianmu di perusahaan mitra.</p>
        <button class="nav-link active" style="border:none; cursor:pointer; padding: 10px 20px;">
            Input Harian
        </button>
    </div>
    <div class="card">
        <h4>Data Perusahaan</h4>
        <div style="font-weight: 700; margin: 10px 0;">PT. Teknologi Digital Nusantara</div>
        <p style="font-size: 0.8rem; color: var(--text-muted);">Pembimbing: Bapak Andi Santoso</p>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
