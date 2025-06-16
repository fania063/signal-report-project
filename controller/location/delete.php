<?php

include '../../config/connect.php';

function deleteLocation($id) {
    global $koneksi;

    $stmt = $koneksi->prepare("DELETE FROM lokasi WHERE id = ?");
    if (!$stmt) {
        die("Gagal menyiapkan statement: " . $koneksi->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    if (deleteLocation($id)) {
        header("Location: ../../location.php");
        exit;
    } else {
        echo "Gagal menghapus lokasi.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
