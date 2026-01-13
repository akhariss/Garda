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
    <div class="col col-12">
        <div class="card">
            <h2>Student Monitoring</h2>
            <p class="muted mt-1">Track performance and verify logbook integrity of your assigned students in real-time.</p>
            
            <div class="table-responsive mt-2">
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Placement</th>
                            <th>Status</th>
                            <th>Integrity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight: 800; color: var(--text-main);">Rian Ardianto</td>
                            <td class="muted">Gojek Indonesia</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><span style="color: var(--primary-teal); font-weight: 800;">✓ Verified</span></td>
                            <td><a href="#" class="link-primary" style="font-size: 0.8rem;">Review</a></td>
                        </tr>
                        <tr>
                            <td style="font-weight: 800; color: var(--text-main);">Siska Amelia</td>
                            <td class="muted">Shopee Digital</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><span style="color: var(--primary-teal); font-weight: 800;">✓ Verified</span></td>
                            <td><a href="#" class="link-primary" style="font-size: 0.8rem;">Review</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
