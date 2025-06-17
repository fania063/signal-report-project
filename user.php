<?php
 include 'controller/user/getAll.php';
    $data_user = getAllUser();
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
     <?php include 'asset\component\sidebar.php'; ?>
    <!-- Main Content -->
    <div class="vw-100 p-4 bg-light">
        <!-- Email top-right -->
        <?php include 'asset\component\header.php'; ?>  

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <div class="d-flex flex-column gap-2">
                <a href="createUser.php" class="btn btn-dark mode px-4 ms-auto">Create</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>LOKASI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_user as $index => $akun): ?>
                            <tr>
                                <td><?= $index + 1 ?>.</td>
                                <td><?= htmlspecialchars($akun['nama']) ?></td>
                                <td><?= htmlspecialchars($akun['email']) ?></td>
                                <td><?= htmlspecialchars($akun['nama_lokasi']) ?></td>
                                <td>
                                    <div class="d-flex w-fit justify-content-center gap-2">
                                        <a href="editUser.php?id=<?= $akun['id']?>" class="btn btn-secondary px-4">Edit</a>
                                        <a href="./controller/user/delete.php?id=<?= $user['id'] ?>" 
                                        class="btn btn-danger px-4"
                                        onclick="return confirm('Yakin ingin menghapus user ini?');">
                                        Delete
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
