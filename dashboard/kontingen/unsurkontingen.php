<?php
// Start session
session_start();

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("masjhiuh");
    exit(); // Stop further execution
}

include '../koneksi/config.php';

$data_peserta = mysqli_query($conn ,"SELECT * FROM peserta");
$jumlah_peserta = mysqli_num_rows($data_peserta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/stylekontingen.css">
    <title>Raicab | Data Unsur Kontingen</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
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
                <a href="#" class="active";>
                <span class="material-symbols-outlined">
                        assignment_ind
                </span>
                    <h3>Data Unsur Kontingen</h3>
                </a>
                <a href="../buktipembayaran/buktibayar.php">
                <span class="material-symbols-outlined">
                        payments
                </span> 
                    <h3>Bukti Pembayaran</h3>
                    <!-- <span class="message-count">27</span> -->
                </a>
                <a href="/WebsiteRaicabUpdate/index.php">
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
                <h2>Data Unsur Kontingen</h2>
                <a href="../Kontingen/tambah.php" class="tambah">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Add Kontingen</h3>
                </a>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Kwarran</th>
                            <th>Golongan</th>
                            <th></th>
                        </tr>
                    </thead>
                        <?php 
                            include '../koneksi/config.php';
                            $no = 1;
	                        $data = mysqli_query($conn, "select * from unsur_kontingen");
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['jenis_kelamin']; ?></td>
                            <td><?php echo $d['kwarran']; ?></td>
                            <td><?php echo $d['golongan']; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
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
                        <p>Hey, <b> <?=$name?></b></p>
                        <small class="text-muted">Admin</small>
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
                            volume_up
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

            </div>
        </div>
    </div>
    <script src="../asset/js/index.js"></script>
</body>
</html>