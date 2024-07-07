<?php
// Start session
session_start();

include './koneksi/config.php';
include './includes/ucapan.php';

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("masjhiuh");
    exit(); // Stop further execution
}


// Hitung jumlah kaos peserta
$kaos_s_peserta = mysqli_query($conn ,"SELECT * FROM peserta where ukuran_kaos='S'");
$jk_s_peserta = mysqli_num_rows($kaos_s_peserta);

$kaos_m_peserta = mysqli_query($conn ,"SELECT * FROM peserta where ukuran_kaos='M'");
$jk_m_peserta = mysqli_num_rows($kaos_m_peserta);

$kaos_l_peserta = mysqli_query($conn ,"SELECT * FROM peserta where ukuran_kaos='L'");
$jk_l_peserta = mysqli_num_rows($kaos_l_peserta);

$kaos_xl_peserta = mysqli_query($conn ,"SELECT * FROM peserta where ukuran_kaos='XL'");
$jk_xl_peserta = mysqli_num_rows($kaos_xl_peserta);


// Hitung jumlah kaos kontingen
$kaos_s_kontingen = mysqli_query($conn ,"SELECT * FROM unsur_kontingen where ukuran_kaos='S'");
$jk_s_kontingen = mysqli_num_rows($kaos_s_kontingen);

$kaos_m_kontingen = mysqli_query($conn ,"SELECT * FROM unsur_kontingen where ukuran_kaos='M'");
$jk_m_kontingen = mysqli_num_rows($kaos_m_kontingen);

$kaos_l_kontingen = mysqli_query($conn ,"SELECT * FROM unsur_kontingen where ukuran_kaos='L'");
$jk_l_kontingen = mysqli_num_rows($kaos_l_kontingen);

$kaos_xl_kontingen = mysqli_query($conn ,"SELECT * FROM unsur_kontingen where ukuran_kaos='XL'");
$jk_xl_kontingen = mysqli_num_rows($kaos_xl_kontingen);

// total kaos kontingen
$total_kaos_s = $jk_s_peserta + $jk_s_kontingen;
$totalkaos_s = $total_kaos_s;

$total_kaos_m = $jk_m_peserta + $jk_m_kontingen;
$totalkaos_m = $total_kaos_m;

$total_kaos_l = $jk_l_peserta + $jk_l_kontingen;
$totalkaos_l = $total_kaos_l;

$total_kaos_xl = $jk_xl_peserta + $jk_xl_kontingen;
$totalkaos_xl = $total_kaos_xl;

$total_semua_kaos = $total_kaos_s +  $total_kaos_m + $total_kaos_l + $total_kaos_xl;
$totalkaos = $total_semua_kaos;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raicab | Data Unsur Kontingen</title>
    <link rel="shortcut icon" href="./asset/image/favicon.svg" type="image/x-icon">
    <!-- font gppg;e icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- css -->
    <link rel="stylesheet" href="./asset/css/stylekontingen.css">
</head>
<body>

    <?php include('../includes/sweetalert.php') ?>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="./asset/image/OFC_Logo_Raicab_Polos.webp">
                    <h2>Raicab III<span class="danger"></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="./dashboard.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>

                <a href="./berkas/berkas.php">
                <span class="material-symbols-outlined">
                        folder
                </span>
                    <h3>Berkas Kontingen</h3>
                </a>

                <a href="./peserta/peserta.php">
                <span class="material-symbols-outlined">
                        assignment_ind
                </span>
                    <h3>Data Peserta</h3>
                </a>

                <a href="./kontingen/unsurkontingen.php">
                <span class="material-symbols-outlined">
                        switch_account
                </span>
                    <h3>Data Unsur Kontingen</h3>
                </a>

                <a href="../buktipembayaran/buktibayar.php">
                <span class="material-symbols-outlined">
                        payments
                </span> 
                    <h3>Bukti Pembayaran</h3>
                </a>

                <a href="#" class="active">
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
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>

        <!-- Table -->
            <div class="recent-orders">
                <h2>Rekap Ukuran Baju</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ukuran Baju</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                        <tr>
                            <td> S</td>
                            <td> Peserta</td>
                            <td> <?php echo $jk_s_peserta ?> pcs</td>
                            <td> Unsur Kontingen</td>
                            <td> <?php echo $jk_s_kontingen ?> pcs</td>
                            <td> <?php echo $totalkaos_s ?> pcs</td>
                        </tr>
                        <tr>
                            <td> M</td>
                            <td> Peserta</td>
                            <td><?php echo $jk_m_peserta ?> pcs</td>
                            <td> Unsur Kontingen</td>
                            <td> <?php echo $jk_m_kontingen ?> pcs</td>
                            <td> <?php echo $totalkaos_m ?> pcs</td>
                        </tr>
                        <tr>
                            <td> L</td>
                            <td> Peserta</td>
                            <td> <?php echo $jk_l_peserta ?> pcs</td>
                            <td> Unsur Kontingen</td>
                            <td> <?php echo $jk_l_kontingen ?> pcs</td>
                            <td> <?php echo $totalkaos_l ?> pcs</td>
                        </tr>
                        <tr>
                            <td> XL</td>
                            <td> Peserta</td>
                            <td> <?php echo $jk_xl_peserta ?> pcs</td>
                            <td> Unsur Kontingen</td>
                            <td> <?php echo $jk_xl_kontingen ?> pcs</td>
                            <td> <?php echo $totalkaos_xl ?> pcs</td>
                        </tr>
                        <tr>
                        </tr>
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Semua Kaos</th>
                            <th></th>
                            <th></th>
                            <th><?php echo $totalkaos ?> pcs</th>
                        </tr>
                        </thead>
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
                    <img src="./asset/image/OFC_Logo_Raicab_Polos.webp">
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
                                18 Juni 2024
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
                            <source src="./asset/audio/themesongraicab.aac" type="audio/mp3">
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
    <script src="./asset/js/index.js"></script>
    <script src="./asset/js/sweetalert.js"></script>
    <script src="./asset/js/audio.js"></script>
</body>
</html>