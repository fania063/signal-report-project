<?php
    $koneksi = mysqli_connect("localhost", "root", "", "signal_report_db");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>
