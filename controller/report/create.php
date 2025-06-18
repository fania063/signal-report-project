<?php
include 'config/connect.php';

function createLaporan($user_id, $judul, $lokasi, $tgl_laporan, $isi_laporan) {
    global $koneksi;

    if (!empty($user_id) && !empty($judul) && !empty($lokasi) && !empty($tgl_laporan) && !empty($isi_laporan)) {
        $status = "Ajukan";

        // Insert ke tabel laporan
        $stmt = $koneksi->prepare("INSERT INTO laporan (user_id, judul, lokasi, tgl_laporan, isi_laporan, status) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed (laporan): " . $koneksi->error);
        }

        $stmt->bind_param("isssss", $user_id, $judul, $lokasi, $tgl_laporan, $isi_laporan, $status);
        
        if ($stmt->execute()) {
            // Ambil ID laporan yang baru dibuat
            $laporan_id = $stmt->insert_id;
            $stmt->close();

            // Insert ke tabel riwayat (atau nama tabelmu itu)
            $keterangan = "Laporan baru diajukan";
            $tgl = date('Y-m-d');

            $stmt2 = $koneksi->prepare("INSERT INTO riwayat_status (laporan_id, status, keterangan, tgl) VALUES (?, ?, ?, ?)");
            if (!$stmt2) {
                die("Prepare failed (riwayat): " . $koneksi->error);
            }

            $stmt2->bind_param("isss", $laporan_id, $status, $keterangan, $tgl);
            $stmt2->execute();
            $stmt2->close();

            echo "<script>
                alert('Laporan berhasil diajukan!');
                window.location.href = 'report.php';
            </script>";
        } else {
            echo "Gagal menambahkan laporan: " . $stmt->error;
        }

    } else {
        echo "<script>alert('Semua field harus diisi.'); window.history.back();</script>";
    }
}



