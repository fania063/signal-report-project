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
            <form method="POST" action="proses-laporan.php" class="mt-4 p-4 border rounded shadow-sm bg-white">

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Judul</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="judul" class="form-control border-0 bg-transparent" placeholder="Masukkan Judul" value="Bilqis Nabila Ummami" required>

                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Lokasi</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi" class="form-control border-0 bg-transparant" placeholder="Contoh: Jl. Palawaran 1, Gang Salak" value="Jl. Palawaran 1, Gang salak" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Waktu</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="waktu" class="form-control border-0 bg-transparant" placeholder="Contoh: Senin, 8 Juni 2025" value="Senin, 8 Juni 2025" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label fw-bold">Deskripsikan Gangguan</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <textarea name="deskripsi_gangguan" class="form-control border-0 bg-transparant" rows="3" placeholder="Contoh: Sinyal hilang akibat tiang listrik rubuh" required>Sinyal hilang akibat,tiang Listrik rubuh</textarea>
                    </div>
                </div>

                <div class="row mb-5">
    <label class="col-sm-3 col-form-label fw-bold">Status</label>
    <div class="col-sm-1 text-center">:</div>
    <div class="col-sm-8">
        <tex name="status" class="form-control border-0 bg-transparant" rows="3"
        
         Status proses dengan garis -->
        <div class="d-flex align-items-center justify-content-between mt-3">
            <div class="text-center w-100">
                <span class="badge bg-secondary">Ajukan</span>
                <div class="border-top mx-2" style="height: 2px;"></div>
            </div>
            <div class="text-center w-100">
                <span class="badge bg-warning text-dark">Proses</span>
                <div class="border-top mx-2" style="height: 2px;"></div>
            </div>
             <div class="text-center w-100">
                <span class="badge bg-secondary">Selesai</span>
                <div class="border-top mx-2" style="height: 2px;"></div>
            </div>
        </div>
    </div>
</div>
                <div class="d-flex flex-row mb-3">
    <button type="submit" class="btn btn-danger px-4">Batal Ajukan</button>
</div>

                
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>
