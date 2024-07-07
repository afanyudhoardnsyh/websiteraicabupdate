<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
    $kwarran = $_SESSION['kwarran'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("Location: ../login.php"); // Redirect to a proper login page
    exit(); // Stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploadBerkas/A2/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            $_SESSION['error_filetype'] = "Format file tidak sesuai, gunakan format JPG, JPEG, PNG, atau PDF";
            header("Location: ../berkas.php");
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
                $sql = "INSERT INTO berkas_a2 (filename, filesize, filetype, kwarran) VALUES ('$filename', $filesize, '$filetype', '$kwarran')";

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke berkas.php
                    $_SESSION['success'] = "Berkas A2 berhasil diupload";
                    header("Location: ../berkas.php");
                } else {
                    $_SESSION['error'] = "Maaf, terdapat masalah saat menyimpan informasi file ke database: " . $conn->error;
                    header("Location: ../berkas.php");
                }

                $conn->close();
            } else {
                $_SESSION['error'] = "Maaf, terdapat masalah saat mengupload file";
                header("Location: ../berkas.php");
            }
        }
    } else {
        $_SESSION['error_empty'] = "Tidak ada file yang diupload";
        header("Location: ../berkas.php");
    }
}
?>
