<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Raicab | Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="../css/stylelogin.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script>alert ('Username dan Password Tidak Sesuai!')</script>";
		}
	}
    ?>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="../image/logo_raicab_text.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Masuk Sekarang !</h2>
                        <p>Masuk untuk lanjut ke dalam Raicab. </p>
                        <form action="../login/welcome.php" method="post">
                            <input type="email" class="email" name="email" placeholder="Masukkan Email" required>
                            <input type="password" class="password" name="password" placeholder="Masukkan Password" style="margin-bottom: 2px;" required>
                            <button value="submit" name="submit" class="btn" type="submit">Masuk</button>
                        </form>
                        <div class="social-icons">
                            <p>Belum punya akun? <a href="../login/register.php">Daftar</a></p>
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