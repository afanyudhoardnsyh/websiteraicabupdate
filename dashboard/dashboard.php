<?php
// Start session
session_start();

include 'koneksi/config.php';
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

$data_peserta = mysqli_query($conn ,"SELECT * FROM peserta");
$jumlah_peserta = mysqli_num_rows($data_peserta);

$sql = "SELECT *FROM pembayaran";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="shortcut icon" href="./asset/image/favicon.svg" type="image/x-icon">
    <!-- google #sipalingraicabfont -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- css -->
    <link rel="stylesheet" href="./asset/css/styledashboard.css">
    <link rel="stylesheet" href="./asset/css/charts.css">
    <title>Raicab | Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../image/OFC_Logo_Raicab_Polos.webp">
                    <h2>Raicab III<span class="danger"></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active";>
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                
                <a href="../dashboard/berkas/berkas.php">
                <span class="material-symbols-outlined">
                        folder
                </span>
                    <h3>Berkas Kontingen</h3>
                </a>

                <a href="../dashboard/peserta/peserta.php">
                <span class="material-symbols-outlined">
                        assignment_ind
                </span>
                    <h3>Data Peserta</h3>
                </a>

                <a href="../dashboard/kontingen/unsurkontingen.php">
                <span class="material-symbols-outlined">
                        switch_account
                </span>
                    <h3>Data Unsur Kontingen</h3>
                </a>

                <a href="../dashboard/buktipembayaran/buktibayar.php">
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
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <!-- Dashboard -->
            <div class="dashboard">
                <div class="peserta">
                    <div class="status">
                        <div class="info">
                            <h3>Jumlah Peserta</h3>
                            <h1><?php echo $jumlah_peserta; ?> Orang</h1>
                        </div>
                        <div class="progresss">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                </div>
                <div class="kontingen">
                    <div class="status">
                        <div class="info">
                            <h3>Data Kontingen</h3>
                            <h1>11 Kontingen</h1>
                        </div>
                        <div class="progresss">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <?php include 'chart.php'; ?>

            <div class="recent-orders">
                <h2>Data Pembayaran Kontingen</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kontingen</th>
                            <th>Jumlah Peserta</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['kwarran']; ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td>Sukses</td>
                                    <td>Aktif</td>
                                    
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"><br>Belum ada file yang diupload</td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
                <a href="#" class="show">Show All</a>
            </div>
            <!-- End of Recent Orders -->
            
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
                
                <div class="profile">
                    <div class="info">
                        <p>Hai, <?php echo $ucapan ?> </p>
                        <small class="text-muted"><b> <?=$name?></b></small>
                    </div>
                    <div class="profile-photo">
                        <i class="fa-solid fa-user fa-2xl"></i>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../image/OFC_Logo_Raicab_Polos.webp">
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
                            <source src="./asset/audio/save-and-sound.mp3" type="audio/mp3">
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
    <script src="./asset/js/charts.js"></script>
    <script src="../asset/sweetalert.js"></script>
    <script src="./asset/js/audio.js"></script>

</body>

</html>