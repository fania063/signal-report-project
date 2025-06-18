<?php 
 include 'controller/report/getAllByIdUser.php';
 include 'asset\component\sidebar.php';
 
$user = $_SESSION['user'];
$data_report = getLaporanByUserId($user['id']);

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
    <!-- Main Content -->
    <div class="vw-100 p-4 bg-light">
        <!-- Email top-right -->
        <?php include 'asset\component\header.php'; ?>  

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <div class="table-responsive">
               <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NO</th>
                        <th>JUDUL</th>
                        <th>LOKASI</th>
                        <th>WAKTU</th>
                        <th>DESKRIPSI GANGGUAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_report as $laporan) {
                        // Format tanggal menjadi "Senin, 20 Juni 2025"
                        $tanggal = date("l, j F Y", strtotime($laporan['tgl_laporan']));
                        
                        // Tentukan warna status
                        $warna = '';
                        if ($laporan['status'] == 'Ajukan') {
                            $warna = 'background-color:rgb(33, 168, 221);';
                        } elseif ($laporan['status'] == 'Proses') {
                            $warna = 'background-color:rgb(213, 241, 88);';
                        } elseif ($laporan['status'] == 'Selesai') {
                            $warna = 'background-color:rgb(93, 212, 119);';
                        } elseif ($laporan['status'] == 'Ditolak') {
                            $warna = 'background-color:rgb(223, 41, 28);';
                        }
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= htmlspecialchars($laporan['judul']) ?></td>
                            <td><?= htmlspecialchars($laporan['lokasi']) ?></td>
                            <td><?= $tanggal ?></td>
                            <td><?= htmlspecialchars($laporan['isi_laporan']) ?></td>
                            <td>
                                <span style="<?= $warna ?> color: white; padding: 5px 10px; border-radius: 5px; font-weight: bold;">
                                    <?= htmlspecialchars($laporan['status']) ?>
                                </span>
                            </td>
                            <td><a href="reportDetail.php?id=<?= $laporan['id'] ?>" class="text-dark"><i class="fas fa-eye fa-lg"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>
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
