<?php

include '../../config/connect.php';

function deleteLocation($id) {
    global $koneksi;
    $check = $koneksi->prepare("SELECT COUNT(*) AS total FROM user WHERE lokasi_id = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();
    $count = $res['total'];
    $check->close();

    if ($count > 0) {
        return $count;
    }

    $stmt = $koneksi->prepare("DELETE FROM lokasi WHERE id = ?");
    if (!$stmt) {
        die("Gagal menyiapkan statement: " . $koneksi->error);
    }
    $stmt->bind_param("i", $id);

    $success = $stmt->execute();
    $stmt->close();

    return $success ? 0 : -1;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = deleteLocation($id);
    if ($result === 0) {
        header("Location: ../../location.php");
        exit;
    } elseif ($result > 0) {
        echo "<script>
                alert('Tidak bisa menghapus lokasi: masih ada $result user yang terkait.');
                window.location.href = '../../location.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Gagal menghapus lokasi karena error pada sistem.');
                window.location.href = '../../location.php';
              </script>";
        exit;
    }
} else {
    echo "<script>
            alert('ID lokasi tidak ditemukan.');
            window.location.href = '../../location.php';
          </script>";
    exit;
}
?>
