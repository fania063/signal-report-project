<?php
include '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $lokasi = trim($_POST['lokasi']);

    $stmt = $koneksi->prepare("UPDATE lokasi SET nama_lokasi = ? WHERE id = ?");
    $stmt->bind_param("si", $lokasi, $id);

    if ($stmt->execute()) {
       header("Location: ../../location.php");
        exit;
    } else {
        echo "Gagal memperbarui data lokasi.";
    }
}
?>
