<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../login/config.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($conn, "select * from users where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login 
	if($_SESSION['email'] = $email){

		// buat session login dan email
		$_SESSION['email'] = $email;
		// alihkan ke halaman dashboard admin
		header("location: ../dashboard/dashboard.php");

	// cek jika user login sebagai user
	} else{

		//  alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}