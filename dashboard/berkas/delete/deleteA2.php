<?php
// koneksi
include '../koneksi/config.php';

$sql = "DELETE FROM berkas_a2";
$a2 = $conn->query($sql);


// mengalihkan halaman kembali ke index.php
header("location: ../berkas.php");


?>  