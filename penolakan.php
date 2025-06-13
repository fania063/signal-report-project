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
         <div class="position-absolute top-0 start-0 p-3">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvasExample">
                <i class="fas fa-bars text-white me-2"></i> 
            </button>
        </div>
        <div class="position-absolute top-0 end-0 p-3">
            <i class="fas fa-user text-primary me-2"></i> blqisnbila@gmail.com
        </div>

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <form method="POST" action="proses-laporan.php" class="mt-4 p-4 border rounded shadow-sm bg-white">

                <div class="row mb-2 align-items-start">
                    <div class="col-sm-3 fw-bold">Judul</div>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <div class="fw-bold">Bilqis Nabila Ummami</div>
                    </div>
                </div>

                <div class="row mb-2 align-items-start">
                    <div class="col-sm-3 fw-bold">Lokasi</div>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <div class="fw-bold">Jl. Palawaran 1, Gang salak</div>
                    </div>
                </div>

                <div class="row mb-2 align-items-start">
                    <div class="col-sm-3 fw-bold">Waktu</div>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <div class="fw-bold">Senin, 8 Juni 2025</div>
                    </div>
                </div>

                <div class="row mb-2 align-items-start">
                    <div class="col-sm-3 fw-bold">Deskripsikan Gangguan</div>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <div class="fw-bold">Sinyal hilang akibat,tiang Listrik rubuh</div>
                    </div>
                </div>

               <div class="row mb-2 align-items-start">
                    <div class="col-sm-3 fw-bold">Status</div>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <span class="badge bg-danger fs-6">Ditolak</span>
                        <p class="text-danger mt-2 mb-0" style="font-size: 0.9rem;">
                        Tidak ada bukti gangguan yang valid.
                        </p>
                    </div>
                </div>

                
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>
