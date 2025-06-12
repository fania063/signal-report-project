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

<div class="d-flex vh-100">
    <?php include 'asset\component\sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-grow-1 h-full p-4 bg-light">
        <!-- Email top-right -->
         <?php include 'asset\component\header.php'; ?>

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <h2 class="text-center fw-bold text-uppercase">
                Selamat Datang di Portal Laporan Kehilangan Sinyal,
                <div class="fs-5 fw-normal">Kabupaten Muara Enim</div>
            </h2>

            <p class="mt-4">
                Portal ini disediakan untuk masyarakat desa di wilayah Muara Enim yang mengalami gangguan atau kehilangan sinyal komunikasi, baik untuk jaringan telepon, SMS, maupun internet. 
                Melalui portal ini, warga dapat melaporkan secara langsung agar segera ditindaklanjuti oleh Dinas Komunikasi dan Informatika (Diskominfo) Muara Enim.
            </p>

            <p><strong>Tujuan:</strong></p>
            <p>
                Meningkatkan pelayanan dan mempercepat penanganan masalah jaringan di desa-desa yang terdampak kehilangan sinyal.
            </p>

            <p><strong>Cara Melaporkan:</strong></p>
            <ol>
                <li>Isi formulir laporan kehilangan sinyal.</li>
                <li>Sertakan nama desa, waktu kejadian, dan deskripsi gangguan.</li>
                <li>Laporan akan diverifikasi dan diteruskan ke pihak penyedia jaringan terkait.</li>
            </ol>

            <p class="mt-4">
                <i class="fas fa-map-pin text-danger"></i> Alamat: Dinas Kominfo Muara Enim, Jl. Jenderal Sudirman No.XX, Muara Enim <br>
                📧 Email: <a href="mailto:diskominfo@muaraenim.go.id">diskominfo@muaraenim.go.id</a><br>
                ☎️ Telepon: (0713) XXXXXXX
            </p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</body>
</html>
