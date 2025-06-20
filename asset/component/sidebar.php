<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$menuItems = [
    [
        'title' => 'Homepage',
        'icon' => 'fas fa-home',
        'href' => 'dashboard.php',
        'role' => ['pelapor', 'admin', 'superadmin'] 
    ],
    [
        'title' => 'Tulis Laporan',
        'icon' => 'fas fa-pen',
        'href' => 'report.php',
        'role' => ['pelapor', 'superadmin']
    ],
    [
        'title' => 'Daftar Laporan',
        'icon' => 'fas fa-list',
        'href' => 'reportList.php',
        'role' => ['pelapor', 'superadmin']
    ],
    [
        'title' => 'Laporan Masuk',
        'icon' => 'fas fa-users-cog',
        'href' => 'reportEntry.php',
        'role' => ['admin', 'superadmin']
    ],
    [
        'title' => 'Riwayat Laporan',
        'icon' => 'fas fa-chart-bar',
        'href' => 'reporthistory.php',
        'role' => ['admin', 'superadmin']
    ],
    [
        'title' => 'Registrasi Lokasi',
        'icon' => 'fas fa-map-marker-alt',
        'href' => 'location.php',
        'role' => ['admin', 'superadmin']
    ],
    [
        'title' => 'Registrasi Akun',
        'icon' => 'fas fa-user',
        'href' => 'user.php',
        'role' => ['admin', 'superadmin']
    ],
];


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
            <?php foreach ($menuItems as $item): ?>
                <?php if (in_array($user['role'], $item['role'])): ?>
                    <li class="nav-item mb-3">
                        <a class="nav-link <?= $current_page == $item['href'] ? 'text-black bg-white text-dark fw-bold rounded' : 'text-white-50' ?>" href="<?= $item['href'] ?>">
                            <i class="<?= $item['icon'] ?> me-4"></i> <?= $item['title'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
