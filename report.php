<?php
include "controller/report/create.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $judul = $_POST['judul'];
    $lokasi = $_POST['lokasi'];
    $tgl_laporan = $_POST['waktu'];
    $isi_laporan = $_POST['deskripsi_gangguan'];

    createLaporan($user_id, $judul, $lokasi, $tgl_laporan, $isi_laporan);
}
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
<script src="https://cdn.tiny.cloud/1/eds3p4ld667yso01tcd39wu1290sbd56o5jo5sfgd0a2h2q8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea[name="deskripsi_gangguan"]',
    height: 300,
    menubar: false,
    
    plugins: 'lists link image preview',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview',
    branding: false,

    // 🔽 Konfigurasi upload
    automatic_uploads: true,
    images_upload_url: 'controller/upload-image.php',
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
      if (meta.filetype === 'image') {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.onchange = function () {
          const file = this.files[0];
          const reader = new FileReader();

          reader.onload = function () {
            const id = 'blobid' + (new Date()).getTime();
            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
          };

          reader.readAsDataURL(file);
        };

        input.click();
      }
    }
  });
</script>

<body>

<div class="d-flex min-vh-100 vw-100 bg-light">
     <?php include 'asset\component\sidebar.php'; ?>
    <!-- Main Content -->
    <div class="vw-100 p-4 ">
        <!-- Email top-right -->
         <?php include 'asset\component\header.php'; ?>

        <!-- Content -->
        <div class="bg-primary bg-opacity-25 p-4 rounded shadow mt-5">
            <form method="POST" action="" class="mt-4 p-4 border rounded shadow-sm bg-white">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Judul</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="judul" class="form-control bg-light" placeholder="Masukkan Judul" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Lokasi</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi" class="form-control bg-light" placeholder="Contoh: Jl. Palawaran 1, Gang Salak" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Waktu</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <input type="date" name="waktu" class="form-control bg-light" placeholder="Contoh: Senin, 8 Juni 2025" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label fw-bold">Deskripsikan Gangguan</label>
                    <div class="col-sm-1 text-center">:</div>
                    <div class="col-sm-8">
                        <textarea name="deskripsi_gangguan" class="form-control bg-light" rows="3" placeholder="Masukkan deskripsi gangguan" ></textarea>
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
