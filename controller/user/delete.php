<?php
include '../../config/connect.php';

function deleteUser($id) {
    global $koneksi;

    // Cek apakah user dengan ID tersebut ada
    $cek = $koneksi->prepare("SELECT id FROM user WHERE id = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows === 0) {
        $cek->close();
        echo "User dengan ID tersebut tidak ditemukan.";
        return false;
    }
    $cek->close();

    // Hapus user
    $stmt = $koneksi->prepare("DELETE FROM user WHERE id = ?");
    if (!$stmt) {
        die("Gagal menyiapkan statement: " . $koneksi->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Gagal menghapus user: " . $stmt->error;
        return false;
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    if (deleteUser($id)) {
        header("Location: ../../user.php");
        exit;
    } else {
        echo "<br>Proses penghapusan gagal.";
    }
} else {
    echo "ID tidak ditemukan di URL.";
}
?>
