<?php 
include 'config/connect.php';

function getLaporanSelesai() {
    global $koneksi;
    $sql = "SELECT laporan.*, user.nama 
            FROM laporan 
            JOIN user ON laporan.user_id = user.id 
            WHERE status = 'Selesai'";
    $result = $koneksi->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}
