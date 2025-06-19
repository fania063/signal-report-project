<?php
$targetDir = "../asset/images/"; // path nyata untuk simpan
$publicPath = "asset/images/";   // path untuk ditampilkan ke TinyMCE (tanpa ../)

// buat folder jika belum ada
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// cek apakah ada file yang diupload
if (!empty($_FILES['file']['name'])) {
    $file = $_FILES['file'];
    $fileName = uniqid() . "_" . basename($file["name"]);
    $targetFile = $targetDir . $fileName;     // untuk menyimpan ke folder
    $returnPath = $publicPath . $fileName;    // untuk dikirim balik ke editor

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        echo json_encode(['location' => $returnPath]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Gagal menyimpan gambar.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Tidak ada file yang dikirim.']);
}
?>
