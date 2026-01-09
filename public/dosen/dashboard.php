<?php
/**
 * public/dosen/dashboard.php - Lecturer Portal
 */
require_once __DIR__ . '/../../core/Guard.php';
Guard::protect(['dosen']);

$pageTitle = 'Monitoring Dosen';
require_once __DIR__ . '/../layout/header.php';
?>

<div class="row">
    <div class="card" style="grid-column: span 3;">
        <h2>Monitoring Mahasiswa Bimbingan</h2>
        <p style="color: var(--text-muted); margin-top: 5px;">Pantau performa dan integritas logbook mahasiswa bimbingan Anda secara real-time.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 25px;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid #f1f5f9;">
                    <th style="padding: 12px;">Mahasiswa</th>
                    <th style="padding: 12px;">Perusahaan</th>
                    <th style="padding: 12px;">Status</th>
                    <th style="padding: 12px;">Integritas</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.9rem;">
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 16px;">Rian Ardianto</td>
                    <td style="padding: 16px;">Gojek</td>
                    <td style="padding: 16px;"><span style="color: #10b981; font-weight: 600;">Aktif</span></td>
                    <td style="padding: 16px;"><i class="ph-bold ph-seal-check" style="color: #10b981;"></i> Valid</td>
                    <td style="padding: 16px;"><a href="#" style="color: var(--primary); font-weight: 600;">Lihat</a></td>
                </tr>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 16px;">Siska Amelia</td>
                    <td style="padding: 16px;">Shopee</td>
                    <td style="padding: 16px;"><span style="color: #10b981; font-weight: 600;">Aktif</span></td>
                    <td style="padding: 16px;"><i class="ph-bold ph-seal-check" style="color: #10b981;"></i> Valid</td>
                    <td style="padding: 16px;"><a href="#" style="color: var(--primary); font-weight: 600;">Lihat</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
