<?php
// mengaktifkan session pada php
session_start();
error_reporting(1);

// menghubungkan php dengan koneksi database
include 'config.php'; // pastikan file ini ada dan benar
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

// menangkap data yang dikirim dari form login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $submit = $_POST['submit']; // pastikan bahwa ini sesuai dengan nama button di form login

    if ($submit === "submit") {
        $error = array();

        // cek data login ke database
        if (empty($error)) {
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            
            if ($result->num_rows > 0) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_level'] = $row['user_level'];
                $_SESSION['kwarran'] = $row['kwarran'];
                header('location: ../dashboard/dashboard.php');
                exit();
            } else {
                // cek jika user login gagal
                $_SESSION['error_login'] = "Username dan Password Tidak Sesuai!";
                header("location: ./login/login.php");
                exit();
            }
        }
    }
}
?>
