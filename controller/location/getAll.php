<?php
include 'config/connect.php';
function getAllLokasi() {
    global $koneksi;

    $sql = "SELECT * FROM lokasi";
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
