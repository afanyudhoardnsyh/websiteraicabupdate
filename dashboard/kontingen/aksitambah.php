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
    $bpjs = NULL; // Default value if no file is uploaded

    // Check if a file was uploaded without errors
    if (isset($_FILES['bpjs']) && $_FILES['bpjs']['error'] == UPLOAD_ERR_OK) {
        $target_dir_bpjs = "./uploadFile/bpjs/"; // Change this to the desired directory for uploaded files
        $bpjs = $target_dir_bpjs . basename($_FILES['bpjs']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['bpjs']['tmp_name'], $bpjs)) {
            // File upload success
            $bpjs = $_FILES["bpjs"]["name"];
        } else {
            // Handle file upload error
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            header("location: ../kontingen/tambah.php");
            exit();
        }
    }

    // Database connection
    include '../koneksi/config.php';

    // Insert the file information into the database
    $sql = "INSERT INTO unsur_kontingen (nama, ttl, kategori, kwarran, jenis_kelamin, nohp, ukuran_kaos, golongan, bpjs) VALUES ('$nama', '$ttl', '$kategori', '$kwarran', '$jk', '$nohp', '$ukkaos', '$golongan', '$bpjs')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to peserta.php with success message
        $_SESSION['success'] = 'Data berhasil ditambahkan';
        header("location: ../kontingen/unsurkontingen.php");
    } else {
        // Handle database insert error
        $_SESSION['error'] = "Sorry, there was an error storing information in the database: " . $conn->error;
        header("location: ../kontingen/tambah.php");
    }

    $conn->close();
}
?>
