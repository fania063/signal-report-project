<?php

    $koneksi = mysqli_connect("localhost", "root", "", "signal_report_db");
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }
?>
