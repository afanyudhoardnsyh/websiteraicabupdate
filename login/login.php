<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylelogin.css">
    <title>Raicab | Login</title>
</head>
<body>

    <?php include('../dashboard/includes/sweetalert.php') ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
        
        <!-- <!-Left Box -> -->
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #c1e4f6;">
            <div class="featured-image mb-3">
                <img src="../image/logo_raicab_text.png" class="img-fluid" style="width: 250px;">
            </div>
        </div> 

        <!-- Right Box -->
        <form action="./selamat_datang.php" method="post" class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Selamat datang</h2>
                    <p>Gunakan email dan password yang sudah terdaftar.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="input-group mb-2">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="myInput" placeholder="Masukkan password" required>
                </div>
                <div class="input-group mb-4">
                    <input type="checkbox" onclick="myFunction()" style="margin-right: 0.5rem; margin-bottom: 1rem;"> 
                    <p style="color: grey;">Show Password</p>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" value="submit" name="submit" class="btn btn-lg w-100 fs-6" style="background:#1786bd; color: #fff;">Login</button>
                </div>
                <div class="row" style="text-align:center">
                    <small>&#169; Raimuna Cabang III | All right reserved</small>
                </div>
            </div>
        </form> 
        </div>
    </div>

    <script src="../asset/showpass.js"></script>
</body>
</html>
