<?php
include 'config/connect.php';

function createUser($nama, $email, $password, $lokasi_id) {
    global $koneksi;

    if (!empty($nama) && !empty($email) && !empty($password) && !empty($lokasi_id)) {
        // Cek apakah email sudah terdaftar
        $cek = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
        $cek->bind_param("s", $email);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            echo "<script>
                alert('Email sudah terdaftar. Gunakan email lain.');
                window.history.back(); // Kembali ke halaman form
            </script>";
            $cek->close();
            return;
        }
        $cek->close();

        $hashedPassword = md5($password);

        $stmt = $koneksi->prepare("INSERT INTO user (nama, email, password, lokasi_id, role) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $koneksi->error);
        }

        $role = "pelapor";
        $stmt->bind_param("sssis", $nama, $email, $hashedPassword, $lokasi_id, $role);

        if ($stmt->execute()) {
            echo "<script>
                alert('User berhasil ditambahkan!');
                window.location.href = 'user.php';
            </script>";
        } else {
            echo "Gagal menambahkan user: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Semua field harus diisi.";
    }
}
?>

