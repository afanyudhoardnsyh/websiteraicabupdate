<?php
// Start session
session_start();

include '../koneksi/config.php';
include '../includes/ucapan.php';

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("masjhiuh");
    exit(); // Stop further execution
}

//Fetch the uploaded files from the database
$sql_bayar = "SELECT *FROM pembayaran";
$bayar_level = $conn->query($sql_bayar);

$sql = "SELECT *FROM pembayaran WHERE kwarran = '$_SESSION[kwarran]'";
$bayar = $conn->query($sql);

// Fetching total nominal properly
$data_nominal_query = mysqli_query($conn, "SELECT SUM(nominal) AS total_nominal FROM pembayaran WHERE
    kwarran = '$_SESSION[kwarran]'");
$data_nominal = [];
while ($row = mysqli_fetch_assoc($data_nominal_query)) {
    $data_nominal[] = $row;
}

$data_level_query = mysqli_query($conn, "SELECT SUM(nominal) AS total_nominal FROM pembayaran");
$level_nominal = [];
while ($row = mysqli_fetch_assoc($data_level_query)) {
    $level_nominal[] = $row;
}

// Fetching total terdaftar properly
$data_terdaftar_query = mysqli_query($conn, "SELECT SUM(jumlah) AS total_terdaftar FROM pembayaran WHERE 
    kwarran = '$_SESSION[kwarran]'");
$data_terdaftar = [];
while ($row = mysqli_fetch_assoc($data_terdaftar_query)) {
    $data_terdaftar[] = $row;
}

$data_terdaftar_lvl = mysqli_query($conn, "SELECT SUM(jumlah) AS total_terdaftar FROM pembayaran");
$data_terdaftar_level = [];
while ($row = mysqli_fetch_assoc($data_terdaftar_lvl)) {
    $data_terdaftar_level[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raicab | Bukti Pembayaran</title>
    <link rel="shortcut icon" href="../asset/image/favicon.svg" type="image/x-icon">
    <!-- google font icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/stylebayar.css">
</head>
<body>

    <?php include('../includes/sweetalert.php') ?>

    <div class="container">
        <!-- Sidebar Section -->
        <?php if ($_SESSION['kwarran'] == "all") { ?>
            <aside>
                <div class="toggle">
                    <div class="logo">
                        <img src="../asset/image/OFC_Logo_Raicab_Polos.webp">
                        <h2>Raicab III<span class="danger"></span></h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                </div>

                <div class="sidebar">
                    <a href="../dashboard.php">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="../berkas/berkas.php">
                    <span class="material-symbols-outlined">
                            folder
                    </span>
                        <h3>Berkas Kontingen</h3>
                    </a>

                    <a href="../peserta/peserta.php">
                    <span class="material-symbols-outlined">
                            assignment_ind
                    </span>
                        <h3>Data Peserta</h3>
                    </a>

                    <a href="../kontingen/unsurkontingen.php">
                    <span class="material-symbols-outlined">
                            switch_account
                    </span>
                        <h3>Data Unsur Kontingen</h3>
                    </a>

                    <a href="#" class="active";>
                    <span class="material-symbols-outlined">
                            payments
                    </span> 
                        <h3>Bukti Pembayaran</h3>
                    </a>

                    <a href="../rekapbaju.php">
                    <span class="material-symbols-outlined">
                        laundry
                    </span> 
                        <h3>Rekap Baju</h3>
                    </a>

                    <a href="#" id="out">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </a>
                </div>
            </aside>
        <?php } else { ?>
            <aside>
                <div class="toggle">
                    <div class="logo">
                        <img src="../asset/image/OFC_Logo_Raicab_Polos.webp">
                        <h2>Raicab III<span class="danger"></span></h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                </div>

                <div class="sidebar">
                    <a href="../dashboard.php">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="../berkas/berkas.php">
                    <span class="material-symbols-outlined">
                            folder
                    </span>
                        <h3>Berkas Kontingen</h3>
                    </a>

                    <a href="../peserta/peserta.php">
                    <span class="material-symbols-outlined">
                            assignment_ind
                    </span>
                        <h3>Data Peserta</h3>
                    </a>

                    <a href="../kontingen/unsurkontingen.php">
                    <span class="material-symbols-outlined">
                            switch_account
                    </span>
                        <h3>Data Unsur Kontingen</h3>
                    </a>

                    <a href="#" class="active";>
                    <span class="material-symbols-outlined">
                            payments
                    </span> 
                        <h3>Bukti Pembayaran</h3>
                    </a>

                    <a href="#" id="out">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </a>
                </div>
            </aside>
        <?php } ?>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
        <h2>Bukti Pembayaran</h2>
        <!-- Dashboard -->
        <div class="dashboard">
                <div class="peserta">
                    <div class="status">
                        <div class="info">
                            <h3>Total Peserta dan Unsur Kontingen</h3>
                            <?php if ($_SESSION['kwarran'] == "all"){ ?>
                                <?php foreach ($data_terdaftar_level as $data) { ?>
                                    <h1><?php echo number_format($data['total_terdaftar']); ?> Orang</h1>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php foreach ($data_terdaftar as $data) { ?>
                                    <h1><?php echo number_format($data['total_terdaftar']); ?> Orang</h1>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="progresss">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                </div>
                <div class="nominal">
                    <div class="status">
                        <div class="info">
                            <h3>Total Nominal</h3>
                            <?php if ($_SESSION['kwarran'] == "all"){ ?>
                                <?php foreach ($level_nominal as $data) { ?>
                                    <h1>Rp. <?php echo number_format($data['total_nominal']); ?></h1>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php foreach ($data_nominal as $data) { ?>
                                    <h1>Rp. <?php echo number_format($data['total_nominal']); ?></h1>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="progresss">
                            <img src="../asset/image/rupiah_biru.png">
                        </div>
                    </div>
                </div>
        </div>
            <!-- End of Analyses -->

        <!-- Table -->
            <div class="recent-orders">
                <a href="../buktipembayaran/tambah.php" class="tambah">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Add Pembayaran</h3>
                </a>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kwarran</th>
                            <th>Jumlah Terdaftar</th>
                            <th>Nominal</th>
                            <th>Bukti Pembayaran</th>
                            <th>Waktu Upload</th>
                        </tr>
                    </thead>
                    <?php if ($_SESSION['kwarran'] == "all") { ?>
                        <?php 
                            $no = 1;
                            if ($bayar_level->num_rows > 0) {
                                while ($row = $bayar_level->fetch_assoc()) {
                                    $file_path = "./uploadBukti/" . $row['filename'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kwarran']; ?></td>
                                        <td><?php echo $row['jumlah']; ?></td>
                                        <td>Rp. <?php echo number_format($row['nominal']); ?></td>
                                        <td><a href="<?php echo $file_path; ?>"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                                        <td><?php echo $row['upload_date']; ?></td>
                                        
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6"><br>Belum ada bukti pembayaran yang diupload</td>
                                </tr>
                                <?php
                            }
                        ?>
                    <?php } else { ?>
                        <?php 
                            $no = 1;
                            if ($bayar->num_rows > 0) {
                                while ($row = $bayar->fetch_assoc()) {
                                    $file_path = "./uploadBukti/" . $row['filename'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kwarran']; ?></td>
                                        <td><?php echo $row['jumlah']; ?></td>
                                        <td>Rp. <?php echo number_format($row['nominal']); ?></td>
                                        <td><a href="<?php echo $file_path; ?>"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                                        <td><?php echo $row['upload_date']; ?></td>
                                        
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6"><br>Belum ada bukti pembayaran yang diupload</td>
                                </tr>
                                <?php
                            }
                        ?>
                    <?php } ?>
                </table>
                <a href="#" class="show">Show All</a>
            </div>
            
        <!-- End of Table -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hai, <?php echo $ucapan ?></p>
                        <small class="text-muted"><b><?=$name?></b></small>
                    </div>
                    <div class="profile-photo">
                        <i class="fa-solid fa-user fa-2xl"></i>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../asset/image/OFC_Logo_Raicab_Polos.webp">
                    <h2>Raimuna Cabang III</h2>
                    <p>Kwartir Cabang Kota Depok</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            campaign
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Raimuna Cabang III</h3>
                            <small class="text_muted">
                                26 - 30 Agustus 2024
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <audio id="audio">
                            <source src="../asset/audio/themesongraicab.aac" type="audio/mp3">
                        </audio>
                        <span class="material-icons-sharp" onclick="togglePlay()">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Theme Song Raimuna</h3>
                            <small class="text_muted">
                                Click icon to play
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="../asset/js/index.js"></script>
    <script src="../asset/js/sweetalert.js"></script>
    <script src="../asset/js/audio.js"></script>
</body>
</html>
