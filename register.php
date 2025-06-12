<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun - Lapor Sinyal Desa</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <!-- Logo di luar efek blur -->
   <!-- Tambahkan Bootstrap dan Font Awesome di <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Kontainer Form -->
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    
    <!-- Logo dan Judul -->
    <div class="text-center mb-4">
      <h1 class="h5 fw-bold">Lapor Sinyal Muara Enim</h1>
      <img src="asset/images/logo-muara-enim.jpg" alt="Logo Kabupaten Muara Enim" class="img-fluid" style="max-height: 100px;">
    </div>

    <h2 class="h5 text-center mb-3">Register</h2>

    <!-- Form Register -->
    <form method="POST" action="">

      <!-- Nama Lengkap -->
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nama lengkap" required>
        </div>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
            <i class="fas fa-eye" id="eye-icon"></i>
          </span>
        </div>
      </div>

      <!-- Tombol Register -->
      <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
  </div>
</div>

</body>
</html>
