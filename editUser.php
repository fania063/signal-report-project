<?php
    include 'controller/user/getOne.php';
    include 'controller/location/getAll.php'; 
    include 'controller/user/update.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password']; // bisa kosong
        $lokasi_id = $_POST['lokasi_id'];
        
        updateUser($id, $nama, $email, $password, $lokasi_id);
    }
    $id = $_GET['id'];
    $data_user = getOneUser($id);
    $lokasi_list = getAllLokasi();    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Sinyal Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="asset/css/style.css" rel="stylesheet">
</head>
<body>

<div class="d-flex vh-100 vw-100">
     <?php include 'asset/component/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="vw-100 p-4 bg-light">
        <!-- Email top-right -->
        <?php include 'asset/component/header.php'; ?>

        <!-- Content -->
       <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <form method="POST" action="" class="mt-4 p-4 border rounded shadow-sm bg-white">
                <input type="hidden" name="id" value="<?= htmlspecialchars($data_user['id']) ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Nama</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control bg-light"  value="<?= htmlspecialchars($data_user['nama']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Email</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control bg-light" value="<?= htmlspecialchars($data_user['email']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Password</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control bg-light" >
                 </div>
                  </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Lokasi</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <select name="lokasi_id" class="form-select bg-light" required>
                            <option value="">-- Pilih Lokasi --</option>
                            <?php foreach ($lokasi_list as $lokasi): ?>
                                <option value="<?= $lokasi['id'] ?>" 
                                    <?= ($lokasi['id'] == $data_user['lokasi_id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($lokasi['nama_lokasi']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">SUBMIT</button>
                </div>
                
            </form>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
