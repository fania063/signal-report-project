<?php
include_once __DIR__ . '/../../config/connect.php'; // Sesuaikan path jika perlu

function getOneLokasi($id) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM lokasi WHERE id = ?");
    if (!$stmt) {
        die("Gagal menyiapkan statement: " . $koneksi->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
