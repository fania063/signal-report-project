<?php
include_once __DIR__ . '/../../config/connect.php'; // Sesuaikan path jika perlu

function getOneLaporan($id) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT laporan.id, laporan.judul, user.nama as nama_pelapor, laporan.lokasi, laporan.tgl_laporan, laporan.isi_laporan, laporan.status FROM laporan  inner join user on user.id=laporan.user_id WHERE laporan.id = ?");
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

function GetAllRiwayatByIdLaporan($id) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM riwayat_status WHERE laporan_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan semua data sebagai array asosiatif
    } else {
        return []; // Kembalikan array kosong agar aman saat di-loop
    }
}
