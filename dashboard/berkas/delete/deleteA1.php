<?php
// koneksi
include '../koneksi/config.php';

$sql = "DELETE FROM berkas_a1 WHERE kwarran=$kwarran";
$a1 = $conn->query($sql);


// mengalihkan halaman kembali ke berkas.php
header("location: ../berkas.php");


?>  
