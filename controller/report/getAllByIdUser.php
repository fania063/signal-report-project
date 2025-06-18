<?php 
include 'config/connect.php';
    function getLaporanByUserId($user_id) {
        global $koneksi;

        $sql = "SELECT laporan.*, user.nama 
                FROM laporan 
                JOIN user ON laporan.user_id = user.id 
                WHERE user_id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();
        return $data;
    }
?>