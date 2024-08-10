<?php
// Start session
session_start();
error_reporting(1);

// Menghubungkan PHP dengan koneksi database
include './koneksi/config.php';
include './includes/ucapan.php';

// Check if the user is logged in
if (isset($_SESSION['name']) && isset($_SESSION['user_level']) && isset($_SESSION['kwarran'])) {
    // Assign the name, user_level, and kwarran to the variables
    $name = $_SESSION['name'];
    $user_level = $_SESSION['user_level'];
    $kwarran = $_SESSION['kwarran'];
} else {
    // If not logged in, redirect to login page
    header("Location: ../login/login.php");
    exit();
}

// Fetch data using prepared statements
$stmt = $conn->prepare("SELECT * FROM peserta WHERE kwarran = ?");
$stmt->bind_param("s", $kwarran);
$stmt->execute();
$data_peserta = $stmt->get_result();
$jumlah_peserta = $data_peserta->num_rows;
$stmt->close();

$level1_peserta = mysqli_query($conn, "SELECT * FROM peserta");
$total_peserta = mysqli_num_rows($level1_peserta);

$sql = "SELECT * FROM pembayaran";
$result = $conn->query($sql);
if (!$result) {
    echo "Error executing query: " . $conn->error;
    exit();
}
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
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./asset/css/styledashboard.css">
    <link rel="stylesheet" href="./asset/css/charts.css">
    <title>Raicab | Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
        <?php if ($_SESSION['kwarran'] == "all") { ?>
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
                    <a href="#" class="active">
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

                    <a href="./rekapbaju.php">
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
        <?php }else{ ?>
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
                    <a href="#" class="active">
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

                    <a href="../logout/logout.php" id="out">
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
            <h1>Dashboard</h1>
            <!-- Dashboard -->
            <div class="dashboard">
                <div class="peserta">
                    <div class="status">
                        <div class="info">
                            <h3>Jumlah Peserta</h3>
                            <?php if ($_SESSION['kwarran'] == "all") { ?>
                                <h1><?php echo $total_peserta ?> Orang</h1>
                            <?php }else{ ?>
                                <h1><?php echo $jumlah_peserta; ?> Orang</h1>
                            <?php } ?>
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
                            <i class="fa-solid fa-group-arrows-rotate"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Dashboard -->

            <!-- chart kontingen -->
            <div class="chart-kontingen">
                <h2>Data Kontingen</h2>
                <div id="chart-profile-visit"></div>
            </div>

            <!-- Table data pembayaran kontingen -->
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
    <script src="./asset/js/charts.js"></script>
    <script src="./asset/apexcharts/apexcharts.js"></script>
    <script>
        var optionsProfileVisit = {
        annotations: {
            position: "back",
        },
        dataLabels: {
            enabled: false,
        },
        chart: {
            type: "bar",
            height: 300,
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {},
        series: [
            {
            name: "Jumlah",
            data: [
                <?php 
                    $jumlah_beji = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Beji'");
                    echo mysqli_num_rows($jumlah_beji);
                ?>, 
                <?php 
                    $jumlah_bojongsari = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Bojongsari'");
                    echo mysqli_num_rows($jumlah_bojongsari);
                ?>, 
                <?php 
                    $jumlah_cilodong = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Cilodong'");
                    echo mysqli_num_rows($jumlah_cilodong);
                ?>, 
                <?php 
                    $jumlah_cimanggis = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Cimanggis'");
                    echo mysqli_num_rows($jumlah_cimanggis);
                ?>, 
                <?php 
                    $jumlah_cinere = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Cinere'");
                    echo mysqli_num_rows($jumlah_cinere);
                ?>, 
                <?php 
                    $jumlah_cipayung = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Cipayung'");
                    echo mysqli_num_rows($jumlah_cipayung);
                ?>, 
                <?php 
                    $jumlah_limo = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Limo'");
                    echo mysqli_num_rows($jumlah_limo);
                ?>, 
                <?php 
                    $jumlah_panmas = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Pancoran Mas'");
                    echo mysqli_num_rows($jumlah_panmas);
                ?>, 
                <?php 
                    $jumlah_sawangan = mysqli_query($conn,"SELECT * FROM peserta WHERE kwarran='Sawangan'");
                    echo mysqli_num_rows($jumlah_sawangan);
                ?>, 

                        
            ],
            },
        ],
        colors: "#1786BD",
        xaxis: {
            categories: [
            "Beji",
            "Bojongsari",
            "Cilodong",
            "Cimanggis",
            "Cinere",
            "Cipayung",
            "Limo",
            "Pancoran Mas",
            "Sawangan",
            ],
        },
        }

        var chartProfileVisit = new ApexCharts(
            document.querySelector("#chart-profile-visit"),
            optionsProfileVisit
        )

        chartProfileVisit.render()
    </script>
</body>
</html>
