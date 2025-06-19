<?php 
include 'controller/report/getAllbyComplete.php';

$dataSelesai = getLaporanSelesai();

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
        <!-- Header -->
        <?php include 'asset\component\header.php'; ?>  

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <h4 class="mb-4">Riwayat Laporan Selesai</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>NAMA PELAPOR</th>
                            <th>LOKASI</th>
                            <th>WAKTU</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($dataSelesai)) {
                            foreach ($dataSelesai as $laporan) {
                                $tanggal = date("l, j F Y", strtotime($laporan['tgl_laporan']));
                                ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= htmlspecialchars($laporan['nama']) ?></td>
                                    <td><?= htmlspecialchars($laporan['lokasi']) ?></td>
                                    <td><?= $tanggal ?></td>
                                    <td>
                                        <a href="reportdetail.php?id=<?= $laporan['id'] ?>" class="text-dark">
                                            <i class="fas fa-eye fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center">Belum ada laporan yang selesai.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
