<?php
include 'config/connect.php';

 function createLokasi($lokasi) {
    global $koneksi;
     if (!empty($lokasi)) {
        $stmt = $koneksi->prepare("INSERT INTO lokasi (nama_lokasi) VALUES (?)");
        $stmt->bind_param("s", $lokasi);

        if ($stmt->execute()) {
            echo "<script>
                alert('Lokasi berhasil ditambahkan!');
                window.location.href = 'location.php'; 
            </script>";
        } else {
            echo "Gagal menambahkan lokasi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Form lokasi tidak boleh kosong.";
    }
}

?>