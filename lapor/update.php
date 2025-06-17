<?php
include 'config/connect.php';

function updateUser($id, $nama, $email, $password, $lokasi_id) {
    global $koneksi;

    if (!empty($id) && !empty($nama) && !empty($email) && !empty($lokasi_id)) {
        // Cek apakah email digunakan oleh user lain
        $cek = $koneksi->prepare("SELECT id FROM user WHERE email = ? AND id != ?");
        $cek->bind_param("si", $email, $id);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            echo "<script>
                alert('Email sudah digunakan oleh user lain.');
                window.history.back();
            </script>";
            $cek->close();
            return;
        }
        $cek->close();

        // Cek apakah password diisi atau tidak
        if (!empty($password)) {
            $hashedPassword = md5($password);
            $stmt = $koneksi->prepare("UPDATE user SET nama = ?, email = ?, password = ?, lokasi_id = ? WHERE id = ?");
            $stmt->bind_param("sssii", $nama, $email, $hashedPassword, $lokasi_id, $id);
        } else {
            $stmt = $koneksi->prepare("UPDATE user SET nama = ?, email = ?, lokasi_id = ? WHERE id = ?");
            $stmt->bind_param("ssii", $nama, $email, $lokasi_id, $id);
        }

        if ($stmt->execute()) {
            echo "<script>
                alert('Data user berhasil diperbarui!');
                window.location.href = 'user.php';
            </script>";
        } else {
            echo "Gagal memperbarui user: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Nama, Email, dan Lokasi wajib diisi.";
    }
}
?>
