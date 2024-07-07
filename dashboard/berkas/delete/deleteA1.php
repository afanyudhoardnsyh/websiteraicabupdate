<?php
session_start();

// koneksi
include '../koneksi/config.php';

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
    $kwarran = $_SESSION['kwarran'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("masjhiuh");
    exit(); // Stop further execution
}

$sql = "DELETE FROM berkas_a1 WHERE kwarran='$kwarran'";
$a1 = $conn->query($sql);


// mengalihkan halaman kembali ke berkas.php
header("location: ../berkas.php");


?>  
