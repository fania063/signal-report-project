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
                    <label class="col-sm-3 col-form-label fw-bold">Lokasi</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi" class="form-control bg-light" placeholder="Contoh: Jl. Palawaran 1, Gang Salak" value="Jl. Palawaran 1, Gang salak" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">SUBMIT</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>
