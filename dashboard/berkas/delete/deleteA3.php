<?php
// koneksi
include '../koneksi/config.php';

$sql = "DELETE FROM berkas_a3";
$a3 = $conn->query($sql);


// mengalihkan halaman kembali ke berkas.php
header("location: ../berkas.php");


?>  