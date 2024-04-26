<?php 
include '../koneksi/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../asset/css/styleformtambahbayar.css">
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>

    <title>Raicab | Form Data Pembayaran</title>
</head>
<body>
    <div class="container">
        <header>Data Pembayaran</header>
        <form method="POST" action="../buktipembayaran/aksiupload.php" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>Kwarran</label>
                            <!-- <input type="text" name="kwarran" placeholder="Masukkan Kwarran" required> -->
                            <select name="kwarran" required>
                                <option disabled selected>Pilih Kwarran</option>
                                <option>Pancoran Mas</option>
                                <option>Cipayung</option>
                                <option>Sawangan</option>
                                <option>Bojongsari</option>
                                <option>Cinere</option>
                                <option>Limo</option>
                                <option>Beji</option>
                                <option>Cimanggis</option>
                                <option>Tapos</option>
                                <option>Sukmajaya</option>
                                <option>Cilodong</option>
                                <?php foreach ($datakwarran as $datakwarran) { ?>
                                    <option value="<?=$datakwarran['nama_kwarran']?>"><?=$datakwarran['nama_kwarran']?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Jumlah Terdaftar</label>
                            <input type="number" name="jumlah" placeholder="Masukkan Jumlah Terdaftar" required>
                        </div>

                        <div class="input-field">
                            <label>Nominal</label>
                            <input type="number" name="nominal" placeholder="Masukkan Nominal Pembayaran" required>
                        </div>

                        <div class="input-field">
                            <label for="file" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" name="file" class="form-control" id ="file" required>
                        </div>
                    </div>
                </div>
                
                <div class="details ID">
                    <a href="../buktipembayaran/buktibayar.php" class="backBtn">
                    <span class="btnText">Close</span>
                </a>
                    <button type="submit" class="nextBtn">Save Changes</button>
                </div>
        </form>
        </div>
    </div>
</body>
</html>