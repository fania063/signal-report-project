<?php
include 'config/connect.php';

function updateStatusLaporan($id_laporan, $status_baru, $keterangan) {
    global $koneksi;

    $stmt = $koneksi->prepare("UPDATE laporan SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status_baru, $id_laporan);
    $stmt->execute();

    $stmt2 = $koneksi->prepare("INSERT INTO riwayat_status (laporan_id, status, tgl, keterangan) VALUES (?, ?, NOW(), ?)");
    $stmt2->bind_param("iss", $id_laporan, $status_baru, $keterangan);
    $stmt2->execute();
}
