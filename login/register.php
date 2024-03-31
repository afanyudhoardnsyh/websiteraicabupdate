<?php

    include '../login/config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, ($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, ($_POST['confirm-password']));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $msg = "<div class='alert alert-info'>Pendaftaran Berhasil dilakukan silahkan login!!</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Pendaftaran Gagal Dilakukan</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password Tidak Cocok!</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Raicab | Daftar</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />

    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="../css/stylelogin.css" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="../image/maskot_raicab.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Daftar Sekarang !</h2>
                        <p>Daftar untuk bergabung bersama kami.</p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Masukkan Nama" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Masukkan Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Masukkan Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Konfirmasi Password" required>
                            <button name="submit" class="btn" type="submit">Daftar</button>
                        </form>
                        <div class="social-icons">
                            <p>Sudah punya akun? <a href="../login/login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="../asset/jquery.min.js"></script>
</body>
</html>