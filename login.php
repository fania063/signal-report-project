<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Pelaporan Sinyal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow-lg">
        <div class="card-body">
          <h4 class="text-center mb-4">Login</h4>
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
              <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>

          <form action="auth/login.php" method="POST">
            <div class="mb-3">
              <label>Email</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
