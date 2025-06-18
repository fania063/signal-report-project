<?php
include 'config/connect.php';

function createLaporan($user_id, $judul, $lokasi, $tgl_laporan, $isi_laporan) {
    global $koneksi;

    // Validasi input (pastikan semua field terisi)
    if (!empty($user_id) && !empty($judul) && !empty($lokasi) && !empty($tgl_laporan) && !empty($isi_laporan)) {
        // Nilai default untuk status
        $status = "Ajukan";

        // Query untuk insert data laporan
        $stmt = $koneksi->prepare("INSERT INTO laporan (user_id, judul, lokasi, tgl_laporan, isi_laporan, status) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $koneksi->error);
        }

        $stmt->bind_param("isssss", $user_id, $judul, $lokasi, $tgl_laporan, $isi_laporan, $status);

        if ($stmt->execute()) {
            echo "<script>
                alert('Laporan berhasil diajukan!');
                window.location.href = 'report.php';
            </script>";
        } else {
            echo "Gagal menambahkan laporan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Semua field harus diisi.'); window.history.back();</script>";
    }
}


