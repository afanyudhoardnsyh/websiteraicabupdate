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

//Fetch the uploaded files from the database
$sql = "SELECT *FROM pembayaran";
$bayar = $conn->query($sql);

$data_nominal_query = mysqli_query($conn, "SELECT SUM(nominal) AS total_nominal FROM pembayaran");

// Fetching total nominal properly
$data_nominal = [];
while ($row = mysqli_fetch_assoc($data_nominal_query)) {
    $data_nominal[] = $row;
}

$data_terdaftar_query = mysqli_query($conn, "SELECT SUM(jumlah) AS total_terdaftar FROM pembayaran");

// Fetching total terdaftar properly
$data_terdaftar = [];
while ($row = mysqli_fetch_assoc($data_terdaftar_query)) {
    $data_terdaftar[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../asset/css/stylebayar.css">
    <title>Raicab | Bukti Pembayaran</title>
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
                <a href="../kontingen/unsurkontingen.php">
                <span class="material-symbols-outlined">
                        assignment_ind
                </span>
                    <h3>Data Unsur Kontingen</h3>
                </a>
                <a href="#" class="active";>
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
        <!-- Dashboard -->
        <h2>Bukti Pembayaran</h2>
        <div class="dashboard">
                <div class="peserta">
                    <div class="status">
                        <div class="info">
                            <h3>Total Peserta dan Unsur Kontingen</h3>
                            <?php foreach ($data_terdaftar as $data) { ?>
                                <h1><?php echo number_format($data['total_terdaftar']); ?> Orang</h1>
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
                            <?php foreach ($data_nominal as $data) { ?>
                                <h1>Rp. <?php echo number_format($data['total_nominal']); ?></h1>
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
                                <td colspan="6"><br>Belum ada file yang diupload</td>
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
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="../asset/js/index.js"></script>
</body>
</html>