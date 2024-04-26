<?php 
// koneksi database
include '../koneksi/config.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$kategori = $_POST['kategori'];
$kwarran = $_POST['kwarran'];
$jk = $_POST['jenis_kelamin'];
$nohp = $_POST['nohp'];
$ukkaos = $_POST['ukuran_kaos'];
$serti = $_POST['serti'];
$bpjs = $_POST['bpjs'];
$golongan = $_POST['golongan'];

// menginput data ke database
mysqli_query($conn, "insert into peserta (nama, ttl, kategori, kwarran, jenis_kelamin, nohp, ukuran_kaos, serti, bpjs, golongan) 
            values ('$nama','$ttl','$kategori','$kwarran','$jk','$nohp','$ukkaos','$serti','$bpjs','$golongan')");

// mengalihkan halaman kembali ke peserta.php
header("location: ../peserta/peserta.php");

?>