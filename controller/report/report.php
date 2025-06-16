<?php

function getAllLaporan()
{
    global $koneksi;

    $sql = "SELECT 
                laporan.id,
                user.nama AS nama_pelapor,
                lokasi.nama_lokasi,
                laporan.tanggal,
                laporan.deskripsi,
                laporan.status
            FROM laporan
            JOIN user ON laporan.user_id = user.id
            JOIN lokasi ON user.lokasi_id = lokasi.id
            ORDER BY laporan.id DESC";

    $result = $koneksi->query($sql);

    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}
?>
