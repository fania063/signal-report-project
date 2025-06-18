<?php
include 'controller/report/getOne.php';
$id = $_GET['id'] ?? 0;
$data_detail = getOneLaporan($id);
if (!$data_detail) {
    die("Laporan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penolakan Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex vh-100 vw-100">
    <?php include 'asset/component/sidebar.php'; ?>

    <div class="vw-100 p-4 bg-light">
        <div class="position-absolute top-0 end-0 p-3">
            <i class="fas fa-user text-primary me-2"></i> blqisnbila@gmail.com
        </div>

        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <form method="POST" action="proses-penolakan.php" class="mt-4 p-4 border rounded shadow-sm bg-white">

                <input type="hidden" name="id_laporan" value="<?= $id ?>">

                <h5 class="mb-4 text-danger fw-bold">Penolakan Laporan</h5>

                <div class="row mb-2">
                    <label class="col-sm-3 fw-bold">Judul</label>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-8"><?= $data_detail['judul'] ?></div>
                </div>

                <div class="row mb-2">
                    <label class="col-sm-3 fw-bold">Lokasi</label>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-8"><?= $data_detail['lokasi'] ?></div>
                </div>

                <div class="row mb-2">
                    <label class="col-sm-3 fw-bold">Waktu</label>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-8"><?= date('l, j F Y', strtotime($data_detail['tgl_laporan'])) ?></div>
                </div>

                <div class="row mb-2">
                    <label class="col-sm-3 fw-bold">Deskripsi Gangguan</label>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-8"><?= $data_detail['isi_laporan'] ?></div>
                </div>

                <div class="mb-3 mt-4">
                    <label for="catatan" class="form-label fw-bold text-danger">Catatan Penolakan</label>
                    <textarea name="catatan_admin" id="catatan" rows="4" class="form-control" placeholder="Masukkan alasan penolakan..." required></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="admlapmasuk.php" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-danger">Kirim Penolakan</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
