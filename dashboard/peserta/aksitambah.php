<?php
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
    $target_dir_sfh = "./uploadFile/sfh/"; // Change this to the desired directory for uploaded files
    $target_dir_bpjs = "./uploadFile/bpjs/"; // Change this to the desired directory for uploaded files
    $sfh = $target_dir_sfh . basename($_FILES['sfh']['name']);
    $bpjs = $target_dir_bpjs . basename($_FILES['bpjs']['name']);

            // Move the uploaded file to the specified directory
            if ((move_uploaded_file($_FILES['sfh']['tmp_name'], $sfh)) &&
                (move_uploaded_file($_FILES['bpjs']['tmp_name'], $bpjs))) {
                
                // File upload success, now store information in the database
                $sfh = $_FILES["sfh"]["name"];
                $bpjs = $_FILES["bpjs"]["name"];

                // Database connection
                include '../koneksi/config.php';

                // Insert the file information into the database
                $sql = "INSERT INTO peserta (nama, ttl, kategori, kwarran, jenis_kelamin, nohp, ukuran_kaos, golongan, sfh, bpjs) VALUES ('$nama', '$ttl', '$kategori', '$kwarran', '$jk', '$nohp', '$ukkaos', '$golongan', '$sfh', '$bpjs')";

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke buktibayar.php
                    header("location: ../peserta/peserta.php");
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

