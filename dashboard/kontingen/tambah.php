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

        <form method="POST" action="../Kontingen/aksitambah.php" >
            <div class="form first">
                <div class="details personal">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat, Tanggal Lahir</label>
                            <input type="text" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" required>
                        </div>

                        <div class="input-field">
                            <label>Kategori</label>
                            <input type="text" name="kategori" placeholder="Masukkan Kategori" required>
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
                            <input type="number" name="nohp" placeholder="Masukkan Nomer Handphone" required>
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
                            <label>Sertifikat SFH</label>
                            <input name="serti" type="text" placeholder="Masukkan Sertifikat" required>
                        </div>

                        <div class="input-field">
                            <label>BPJS *Opsional</label>
                            <input name="bpjs" type="text" placeholder="Masukkan BPJS">
                        </div>

                        <div class="input-field">
                            <label>Golongan (T/D)</label>
                            <input name="golongan" type="text" placeholder="Masukkan Golongan" required>
                        </div>

                    </div>
                </div>

                <div class="details ID">
                    <a href="../kontingen/unsurkontingen.php" class="backBtn">
                        <span class="btnText">Close</span>
                    </a>
                    <button type="submit" class="nextBtn">
                        <span class="btnText">Save Changes</span>
                    </button>
                </div> 
            </div>
        </form>
    </div>
</body>
</html>