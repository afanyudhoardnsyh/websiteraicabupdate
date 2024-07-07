<?php
session_start();
var_dump('kwarran');

// Check if the user is logged in
if(isset($_SESSION['name']) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
    $kwarran = $_SESSION['kwarran'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("masjhiuh");
    exit(); // Stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploadBerkas/A1/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            $_SESSION['error_filetype'] = "Format file tidak sesuai, gunakan format JPG, JPEG, PNG atau PDF";
            header("location: ../berkas.php");
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                // Database connection
                include '../koneksi/config.php';

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO berkas_a1 (filename, filesize, filetype, kwarran) VALUES ('$filename', $filesize, '$filetype', '$kwarran'";

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke berkas.php
                    $_SESSION['success'] = "Berkas A1 berhasil diupload";
                    header("location: ../berkas.php");
                } else {
                    $_SESSION['error'] = "Maaf, terdapat masalah saat mengupload file";
                    header("location: ../berkas.php");
                }

                $conn->close();
            } else {
                $_SESSION['error'] = "Maaf, terdapat masalah saat mengupload file";
                header("location: ../berkas.php");
            }
        }
    } else {
        $_SESSION['error_empty'] = "Tidak ada file yang diupload";
        header("location: ../berkas.php");
    }
}
?>

