<?php
include 'config/connect.php';
function getAllUser() {
    global $koneksi;

    $sql = "SELECT user.*, lokasi.nama_lokasi 
        FROM user 
        JOIN lokasi ON user.lokasi_id = lokasi.id";
    $result = $koneksi->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $koneksi->close();
    return $data;
}
?>
