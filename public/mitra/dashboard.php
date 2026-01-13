<?php
/**
 * public/mitra/dashboard.php - Mitra/Company Portal
 */
require_once __DIR__ . '/../../core/Guard.php';
Guard::protect(['mitra']);

$pageTitle = 'Mitra Dashboard';
require_once __DIR__ . '/../layout/header.php';
?>

<div class="row">
    <div class="col col-12">
        <div class="card">
            <h2>Intern Management</h2>
            <p class="muted mt-1">Review and verify progress of students currently placed at your company.</p>
            
            <div class="table-responsive mt-2">
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Position</th>
                            <th>Latest Update</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight: 800; color: var(--text-main);">Rian Ardianto</td>
                            <td class="muted">Web Developer Intern</td>
                            <td class="muted">Today, 10:45</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td><button class="btn btn-primary" style="padding: 6px 14px; font-size: 0.75rem; border-radius: 8px;">Verify Log</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
