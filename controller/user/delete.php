<?php
include '../../config/connect.php';

function deleteUser($id) {
    global $koneksi;

    $check = $koneksi->prepare("SELECT COUNT(*) AS total FROM laporan WHERE user_id = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();
    $check->close();

    if ($res['total'] > 0) {
        return ['status' => 'has_reports', 'total' => $res['total']];
    }

    $cek = $koneksi->prepare("SELECT id FROM user WHERE id = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows === 0) {
        $cek->close();
        return ['status' => 'not_found'];
    }
    $cek->close();

    $stmt = $koneksi->prepare("DELETE FROM user WHERE id = ?");
    if (!$stmt) {
        return ['status' => 'error', 'message' => $koneksi->error];
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        return ['status' => 'success'];
    } else {
        $stmt->close();
        return ['status' => 'error', 'message' => $stmt->error];
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $result = deleteUser($id);

    if ($result['status'] === 'success') {
        header("Location: ../../user.php");
        exit;
    } elseif ($result['status'] === 'has_reports') {
        echo "<script>
                alert('Tidak bisa menghapus user: masih ada {$result['total']} laporan yang terkait.');
                window.location.href = '../../user.php';
              </script>";
        exit;
    } elseif ($result['status'] === 'not_found') {
        echo "<script>
                alert('User tidak ditemukan.');
                window.location.href = '../../user.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Gagal menghapus user: {$result['message']}');
                window.location.href = '../../user.php';
              </script>";
        exit;
    }
} 
?>
