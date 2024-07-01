<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Link For Icons -->
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Css -->
    <link rel="stylesheet" href="../asset/css/styleberkas.css">
    <link rel="stylesheet" href="../asset/css/swiper-bundle.min.css">
</head>
<body>
    <!-- Modal Prestasi Pramuka -->
    <dialog id="dialog1">
        <h2>Upload Berkas A1</h2>
        <form action="../berkas/upload/uploadA1.php" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="mb-3">
                <label for="file" class="form-label">Select file</label>
                <input type="file" class="form-control" name="file" id ="file">
            </div>
            <button type="submit" class="btnUpload" name="submit">Upload file</button>
        </form>
            <button onclick="window.dialog1.close();" aria-label="close" class="x">❌</button>
    </dialog>
    
    <!-- Modal Prestasi Paskibra -->
    <dialog id="dialog2">
        <h2>Upload Berkas A2</h2>
        <form action="../berkas/upload/uploadA2.php" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="mb-3">
                <label for="file" class="form-label">Select file</label>
                <input type="file" class="form-control" name="file" id ="file">
            </div>
            <button type="submit" class="btnUpload" name="submit">Upload file</button>
        </form>
            <button onclick="window.dialog2.close();" aria-label="close" class="x">❌</button>
    </dialog>

    <!-- Modal Prestasi Futsal-->
    <dialog id="dialog3">
        <h2>Upload Berkas A3</h2>
        <form action="../berkas/upload/uploadA3.php" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="mb-3">
                <label for="file" class="form-label">Select file</label>
                <input type="file" class="form-control" name="file" id ="file">
            </div>
            <button type="submit" class="btnUpload" name="submit">Upload file</button>
        </form>
            <button onclick="window.dialog3.close();" aria-label="close" class="x">❌</button>
    </dialog>
</body>
</html>