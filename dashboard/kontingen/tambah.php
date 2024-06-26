<?php 

include '../koneksi/config.php';

$query_kwarran = "SELECT * FROM kwarran";
$result = $conn->query($query_kwarran);
$datakwarran = $result;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../asset/image/favicon.svg" type="image/x-icon">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../asset/css/styleformtambah.css">
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>

    <title>Raicab | Form Unsur Kontingen</title>
</head>
<body>
    <div class="container">
        <header>Unsur Kontingen</header>

        <form method="POST" action="../kontingen/aksitambah.php" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Lengkap</label>
                            <input type="text" class="input" name="nama" placeholder="Masukkan Nama Lengkap" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat, Tanggal Lahir</label>
                            <input type="text" class="input" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" required>
                        </div>

                        <div class="input-field">
                            <label>Kategori</label>
                            <select name="kategori">
                                <option disabled selected>Pilih Kategori</option>
                                <option>Pinkon</option>
                                <option>Bindamping</option>
                            </select>
                        </div>

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
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" required>
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Nomer Handphone</label>
                            <input type="number" class="input" name="nohp" placeholder="Masukkan Nomer Handphone" required>
                        </div>

                        <div class="input-field">
                            <label>Ukuran Kaos</label>
                            <select name="ukuran_kaos" required>
                                <option disabled selected>Pilih Ukuran</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Golongan (T/D)</label>
                            <select name="golongan" required>
                                <option disabled selected>Pilih Golongan</option>
                                <option>Penegak</option>
                                <option>Pandega</option>
                                <option>Pembina</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>BPJS <span style="color: red;">*opsional</span></label>
                            <input type="file" class="form-upload" name="bpjs" id="file">
                        </div>

                    </div>
                </div>

                <div class="details ID">
                    <a href="../kontingen/unsurkontingen.php" class="backBtn">
                        <span class="btnText">Close</span>
                    </a>
                    <button type="submit" class="nextBtn" name="submit">
                        <span class="btnText">Save Changes</span>
                    </button>
                </div> 
            </div>
        </form>
    </div>
</body>
</html>