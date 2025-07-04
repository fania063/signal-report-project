<?php
    include 'controller/location/getAll.php';
    $data_lokasi = getAllLokasi();
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
                <a href="createlocation.php" class="btn btn-dark mode px-4 ms-auto">Create</a>
            </div>
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA LOKASI</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_lokasi as $index => $lokasi): ?>
                        <tr>
                            <td><?= $index + 1 ?>.</td>
                            <td><?= htmlspecialchars($lokasi['nama_lokasi']) ?></td>
                            <td>
                                <div class="d-flex w-fit justify-content-center gap-2">
                                    <a href="editLocation.php?id=<?= $lokasi['id'] ?>" class="btn btn-secondary px-4">Edit</a>

                                    <a href="./controller/location/delete.php?id=<?= $lokasi['id'] ?>" 
                                        class="btn btn-danger px-4"
                                        onclick="return confirm('Yakin ingin menghapus lokasi ini?');">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>
