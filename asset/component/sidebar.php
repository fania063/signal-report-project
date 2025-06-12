<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<div class="flex-grow-1 offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header bg-dark text-white p-4">
        <button data-bs-dismiss="offcanvas" class="btn btn-outline-light">
            <i class="fas fa-close text-white me-2"></i>
        </button>
    </div>
    <div class="offcanvas-body bg-dark text-white p-4">
        <div class="text-center mb-4">
            <img src="asset/images/logo-muara-enim.jpg" alt="Logo" class="img-fluid mb-2" style="max-height: 120px;">
            <h5 class="mt-2">Lapor Sinyal Desa</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link <?= $current_page == 'dashboard.php' ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="dashboard.php">
                    <i class="fas fa-home me-4"></i> Homepage
                </a>
            </li>
            <?php if ($user['role'] == 'pelapor'): ?>
                <li class="nav-item mb-3">
                    <a class="nav-link <?= $current_page == 'lapor.php' ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="lapor.php">
                        <i class="fas fa-pen me-4"></i> Tulis Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'daftar.php' ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="daftar.php">
                        <i class="fas fa-list me-4"></i> Daftar Laporan
                    </a>
                </li>
            <?php endif; ?>
             <?php if ($user['role'] == 'admin'): ?>
                <li class="nav-item mb-3">
                    <a class="nav-link <?= $current_page == 'manage_users.php' ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="manage_users.php">
                        <i class="fas fa-users-cog me-4"></i>Laporan Masuk
                    </a>
                </li>

                <li class="nav-item mb-3">
                    <a class="nav-link <?= $current_page == 'report.php' ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="report.php">
                        <i class="fas fa-chart-bar me-4"></i> Riwayat Laporan
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
