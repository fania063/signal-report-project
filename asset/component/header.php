<?php

$user = $_SESSION['user'];
?>

<!-- Tombol Sidebar -->
<div class="position-absolute top-0 start-0 p-3">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvasExample">
        <i class="fas fa-bars text-white me-2"></i> 
    </button>
</div>

<!-- Email dan Dropdown Logout -->
<div class="position-absolute top-0 end-0 p-3">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user text-primary me-2"></i>
            <?= htmlspecialchars($user['email']) ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            <li>
                <a class="dropdown-item text-danger" href="logout.php">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</div>
