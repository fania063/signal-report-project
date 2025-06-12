 <?php

$user = $_SESSION['user'];
?>
 
 <div class="position-absolute top-0 start-0 p-3">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvasExample">
        <i class="fas fa-bars text-white me-2"></i> 
    </button>
</div>
<div class="position-absolute top-0 end-0 p-3">
    <i class="fas fa-user text-primary me-2"></i> <?= $user['email'] ?>
</div>