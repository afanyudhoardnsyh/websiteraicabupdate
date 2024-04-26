<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploadBerkas/A3/"; // Change this to the desired directory for uploaded files
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

                // Update the file information into the database
                $sql = "UPDATE berkas_a3 SET filename='$filename', filesize='$filesize', filetype='$filetype'" ;

                if ($conn->query($sql) === TRUE) {
                    // mengalihkan halaman kembali ke berkas.php
                    header("location: ../berkas.php");
                } else {
                    echo "Sorry, there was an error editing your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error editing your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/editberkas.css">
	<title>File upload and download</title>
</head>
<body>
	<div class="container">
    <a href="../berkas.php" class="btnClose"><i class="fa-solid fa-circle-xmark"></i></a>
		<h2>Edit Berkas A3</h2>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="file" class="form-label">Select file</label>
				<input type="file" class="form-control" name="file" id = "file">
			</div>
			<button type="submit" class="btn btn-primary">Upload file</button>
		</form>
	</div>

</body>
</html>