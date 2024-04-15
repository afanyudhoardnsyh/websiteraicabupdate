<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../login/config.php';
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
$submit = $_POST['submit']; // changed from $login to $submit

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
            header('location: ../dashboard/dashboard.php'); // assuming $urladmin is defined somewhere else
            die();
        } else {
            // cek jika user login gagal
            header("location:login.php?pesan=gagal");
            exit(); // exit after redirection
        }
    }
}
?>