<?php
include 'config/connect.php';

function loginUser($email, $passwordInput) {
    global $koneksi;

    $query = $koneksi->prepare("SELECT * FROM user WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (md5($passwordInput) === $user['password']) {
             $_SESSION['user'] = [
                'id' => $user['id'],
                'nama' => $user['nama'],
                'email' => $user['email'],
                'role' => $user['role'],
                'lokasi_id' => $user['lokasi_id']
            ];

            header("Location: dashboard.php");
         
            exit();
        } else {
            return "Password salah!";
        }
    } else {
        return "Email tidak ditemukan!";
    }
}
?>
