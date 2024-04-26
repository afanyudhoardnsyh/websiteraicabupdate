<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kwarran = $_POST["kwarran"];
    $jumlah = $_POST["jumlah"];
    $nominal = $_POST["nominal"];
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "./uploadBukti/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                // Database connection
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "raicab";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO pembayaran (kwarran, jumlah, nominal, filename, filesize, filetype) VALUES ('$kwarran', '$jumlah', '$nominal','$filename', $filesize, '$filetype')";

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke buktibayar.php
                    header("location: ../buktipembayaran/buktibayar.php");
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

