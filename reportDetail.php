<?php
    include 'controller/report/getOne.php';
    include 'controller/report/updateStatus.php';
    
    $id = $_GET['id'];
    $data_detail = getOneLaporan($id);
    $riwayat_status=GetAllRiwayatByIdLaporan($id);

    $status_sekarang=strtolower($data_detail['status']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $action = $_POST['action'] ?? '';
        $keterangan = $_POST['deskripsi'] ?? '';

        if ($id <= 0 || empty($action) || empty($keterangan)) {
            die("Data tidak lengkap.");
        }

        $status_baru = match ($action) {
            'tolak' => 'Ditolak',
            'proses' => 'Proses',
            'selesai' => 'Selesai',
            default => null,
        };

        if ($status_baru === null) {
            die("Aksi tidak valid.");
        }

        // Jalankan update
        updateStatusLaporan($id, $status_baru, $keterangan);
    }
    
    switch ($status_sekarang) {
        case 'ajukan':
            $tahapan = [
                ['label' => 'Ajukan', 'deskripsi' => 'Laporan anda sudah diajukan', 'badge' => 'primary'],
                ['label' => 'Proses', 'deskripsi' => 'Menunggu diproses', 'badge' => 'secondary'],
                ['label' => 'Selesai', 'deskripsi' => 'Belum selesai', 'badge' => 'secondary']
            ];
            break;
        case 'proses':
            $tahapan = [
                ['label' => 'Ajukan', 'deskripsi' => 'Laporan anda sudah diajukan', 'badge' => 'primary'],
                ['label' => 'Proses', 'deskripsi' => 'Laporan sedang diproses', 'badge' => 'primary'],
                ['label' => 'Selesai', 'deskripsi' => 'Belum selesai', 'badge' => 'secondary']
            ];
            break;
        case 'selesai':
            $tahapan = [
                ['label' => 'Ajukan', 'deskripsi' => 'Laporan anda sudah diajukan', 'badge' => 'primary'],
                ['label' => 'Proses', 'deskripsi' => 'Laporan diproses', 'badge' => 'primary'],
                ['label' => 'Selesai', 'deskripsi' => 'Laporan telah selesai', 'badge' => 'success']
            ];
            break;
        case 'ditolak':
            $tahapan = [
                ['label' => 'Ajukan', 'deskripsi' => 'Laporan anda sudah diajukan', 'badge' => 'primary'],
                ['label' => 'Ditolak', 'deskripsi' => end($riwayat_status)['catatan_admin'] ?? 'Laporan ditolak oleh admin', 'badge' => 'danger']
            ];
            break;
        default:
            $tahapan = [];
    }

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
     <?php include 'asset\component\sidebar.php'; ?>
      <?php include 'asset\component\header.php';
        
    $isAdmin = isset($_SESSION['user']) && in_array($_SESSION['user']['role'], ['admin', 'superadmin']);
      ?>
    <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-4">
        <form method="POST" action="#" class="bg-white p-4 rounded shadow-sm">

            <h5 class="fw-bold text-primary mb-4"><i class="fas fa-info-circle me-2"></i>Detail Laporan</h5>

            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Judul</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8"><?= $data_detail['judul']; ?></div>
            </div>

             <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Nama Pelapor</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8"><?= $data_detail['nama_pelapor']; ?></div>
            </div>


            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Status Sekarang</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8">
                    <?php
                    $badgeClass = match($status_sekarang) {
                        'ajukan', 'proses' => 'primary',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                        default => 'secondary'
                    };
                    ?>
                    <span class="badge bg-<?= $badgeClass ?> fs-6"><?= ucfirst($data_detail['status']) ?></span>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Deskripsi Gangguan</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8"><?= $data_detail['isi_laporan']; ?></div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Tanggal Kejadian</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8"><?= date('l, j F Y', strtotime($data_detail['tgl_laporan'])); ?></div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 fw-bold">Lokasi</label>
                <div class="col-sm-1">:</div>
                <div class="col-sm-8"><?= $data_detail['lokasi']; ?></div>
            </div>

            <!-- TAHAPAN -->
            <div class="my-4">
                <div class="d-flex justify-content-between align-items-center text-center">
                    <?php foreach ($tahapan as $i => $step): ?>
                        <div class="flex-fill">
                            <span class="badge bg-<?= $step['badge'] ?> mb-2">
                                <?= ($status_sekarang === 'ditolak' && strtolower($step['label']) === 'ditolak') ? '❌' : $i + 1 ?> 
                            </span>
                            <div class="fw-bold"><?= $step['label'] ?></div>
                            <p class="small text-muted mt-1"><?= $step['deskripsi'] ?></p>
                        </div>
                        <?php if ($i < count($tahapan) - 1): ?>
                            <div class="flex-fill border-top mx-2" style="height: 2px;"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php foreach ($riwayat_status as $data): ?>
                <div class="col-md-10 mb-3">
                    <div class="p-3 rounded h-100 d-flex align-items-center" style="background-color: #f4f2ff; border: 1px solid #d3cfe5;">
                        <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                            <strong>Status:</strong> <?= $data['status']; ?> <br>
                            <strong>Tanggal:</strong> <?= date('d M Y', strtotime($data['tgl'])); ?> <br>
                            <?= $data['keterangan']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>


        <?php if ($isAdmin): ?>
            <?php if ($status_sekarang === 'ajukan' || $status_sekarang === 'proses'): ?>
                <form method="POST" action="">
                    <div class="row align-items-start mt-4">
                        <div class="col-md-10 mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Catatan / Deskripsi Status</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>

                        <div class="col-md-2 d-flex flex-column justify-content-between gap-2 mt-4">
                            <?php if ($status_sekarang === 'ajukan'): ?>
                                <button type="submit" name="action" value="tolak" class="btn btn-danger w-100">TOLAK</button>
                                <button type="submit" name="action" value="proses" class="btn btn-primary w-100">PROSES</button>
                            <?php elseif ($status_sekarang === 'proses'): ?>
                                <button type="submit" name="action" value="selesai" class="btn btn-success w-100">SELESAI</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        <?php endif; ?>



        </form>
    </div>
</div>

</body>
</html>
