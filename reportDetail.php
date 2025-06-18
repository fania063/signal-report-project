<?php
    include 'controller/report/getOne.php';
    $id = $_GET['id'];
    $data_detail = getOneLaporan($id);
    $riwayat_status=GetAllRiwayatByIdLaporan($id);

    $status_sekarang=strtolower($data_detail['status']);
    
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

            <?php if ($status_sekarang === 'ajukan' || $status_sekarang === 'proses'): ?>
                <div class="row align-items-start mt-4">
                    <div class="col-md-10">
                        <div class="p-3 rounded h-100 d-flex align-items-center" style="background-color: #f4f2ff; border: 1px solid #d3cfe5;">
                            <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                Terima kasih atas laporannya. Kami akan segera menindaklanjuti gangguan sinyal di wilayah 
                                <?= $data_detail['lokasi'] ?> yang disebabkan oleh tiang listrik roboh. Tim teknis akan 
                                berkoordinasi dengan pihak terkait untuk memperbaiki kerusakan dan memulihkan jaringan secepatnya. 
                                Mohon kesabarannya.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex flex-column justify-content-between gap-2">
                        <button type="submit" name="action" value="tolak" class="btn btn-danger w-100">TOLAK</button>
                        <button type="submit" name="action" value="proses" class="btn btn-primary w-100">PROSES</button>
                    </div>
                </div>
            <?php endif; ?>



        </form>
    </div>
</div>

</body>
</html>
