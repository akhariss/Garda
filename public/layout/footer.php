</div> <!-- End #app -->

    <footer style="padding: 2rem 0; border-top: 1px solid var(--border-color); margin-top: 4rem;">
        <div class="container text-center">
            <p class="muted" style="font-size: 0.8rem;">&copy; <?= date('Y') ?> Garda. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Global Sidebar Toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('open');
                overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
            });
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.style.display = 'none';
            });
        }
    </script>

    <!-- Global Scripts -->
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
    <?php if (isset($extraJS)): ?>
        <script src="<?= BASE_URL ?>assets/js/<?= $extraJS ?>"></script>
    <?php endif; ?>
</body>
</html>
