<?php
// Mengaktifkan session pada PHP
session_start();
error_reporting(1);

// Menghubungkan PHP dengan koneksi database
include 'config.php'; // Pastikan file ini ada dan benar
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Menangkap data yang dikirim dari form login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $db->real_escape_string($_POST['email']);
    $password = $db->real_escape_string($_POST['password']);
    $submit = $_POST['submit']; // Pastikan bahwa ini sesuai dengan nama button di form login

    if ($submit === "submit") {
        // Cek data login ke database
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        
        if ($result->num_rows > 0) {
            // Buat session login dan username sesuai level user
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_level'] = $row['user_level'];
            $_SESSION['kwarran'] = $row['kwarran'];
            $_SESSION['name'] = $row['name'];
            
            if ($row['user_level'] == "99") {
                // Alihkan ke halaman dashboard admin
                header("location: ../dashboard/dashboard.php");
            } elseif ($row['user_level'] == "3") {
                // Alihkan ke halaman dashboard pegawai
                header("location: ../dashboard/dashboard.php");
            } elseif ($row['user_level'] == "1") {
                // Alihkan ke halaman dashboard pegawai
                header("location: ../dashboard/dashboard.php");
            } elseif ($row['user_level'] == "2") {
                // Alihkan ke halaman dashboard pegawai
                header("location: ../dashboard/dashboard.php");
            } elseif ($row['user_level'] == "4") {
                // Alihkan ke halaman dashboard pengurus
                header("location: ../dashboard/dashboard.php");
            } else {
                // Alihkan ke halaman login kembali jika level tidak dikenali
                header("Location: index.php?pesan=gagal");
            }
            exit();
        } else {
            // Cek jika user login gagal
            $_SESSION['error_login'] = "Username dan Password Tidak Sesuai!";
            header("Location: ../login/login.php");
            exit();
        }
    }
}
?>