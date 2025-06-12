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
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>NAMA PELAPOR</th>
                            <th>LOKASI</th>
                            <th>WAKTU</th>
                            <th>DESKRIPSI GANGGUAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Bilqis</td>
                            <td>Gangguan Sinyal</td>
                            <td>Jl. Pelawaran 1, Gang Salak</td>
                            <td>Senin, 8 Juni 2025</td>
                            <td>Sinyal hilang akibat tiang listrik rubuh</td>
                            <td><a href="daftarlapor.php" class="text-dark"><i class="fas fa-eye fa-lg"></i></a></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Zaidatul</td>
                            <td>Gangguan Sinyal</td>
                            <td>Karang Sentul</td>
                            <td>Minggu, 20 Mei 2025</td>
                            <td>Hilang sinyal 3 hari 1 jam sekali mati</td>
                            <td><a href="daftarlapor.php" class="text-dark"><i class="fas fa-eye fa-lg"></i></a></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Qhiara</td>
                            <td>Gangguan Sinyal</td>
                            <td>Jl. Tangsi</td>
                            <td>Rabu, 4 April 2025</td>
                            <td>Konsleting listrik</td>
                            <td><a href="daftarlapor.php" class="text-dark"><i class="fas fa-eye fa-lg"></i></a></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Vania</td>
                            <td>Gangguan Sinyal</td>
                            <td>Darussalam</td>
                            <td>Senin, 2 Februari 2025</td>
                            <td>Sinyal hilang akibat tiang listrik rubuh</td>
                            <td><a href="daftarlapor.php" class="text-dark"><i class="fas fa-eye fa-lg"></i></a></td>
                        </tr>
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
