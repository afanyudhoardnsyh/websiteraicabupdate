<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $kategori = $_POST['kategori'];
    $kwarran = $_POST['kwarran'];
    $jk = $_POST['jenis_kelamin'];
    $nohp = $_POST['nohp'];
    $ukkaos = $_POST['ukuran_kaos'];
    $golongan = $_POST['golongan'];

    // Check if a file was uploaded without errors
    $target_dir_bpjs = "./uploadFile/bpjs/"; // Change this to the desired directory for uploaded files
    $bpjs = $target_dir_bpjs . basename($_FILES['bpjs']['name']);

            // Move the uploaded file to the specified directory
            if ((move_uploaded_file($_FILES['bpjs']['tmp_name'], $bpjs))) {
                
                // File upload success, now store information in the database
                $bpjs = $_FILES["bpjs"]["name"];

                // Database connection
                include '../koneksi/config.php';

                // Insert the file information into the database
                $sql = "INSERT INTO unsur_kontingen (nama, ttl, kategori, kwarran, jenis_kelamin, nohp, ukuran_kaos, golongan, bpjs) VALUES ('$nama', '$ttl', '$kategori', '$kwarran', '$jk', '$nohp', '$ukkaos', '$golongan', '$bpjs')";

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke buktibayar.php
                    $_SESSION['success']="Data berhasil ditambahkan";
                    header("location: ../kontingen/unsurkontingen.php");
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
        echo "No file was uploaded.";
    }
?>

