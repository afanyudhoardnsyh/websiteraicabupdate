<?php
// Start session
session_start();

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Assign the name to the $name variable
    $name = $_SESSION['name'];
} else {
    // If not logged in, redirect to login page or handle accordingly
    header("Location: masjhiuh.php"); // Corrected redirection to login page
    exit(); // Stop further execution
}

// Assuming $kwarran needs to be fetched or defined somewhere before these queries
$kwarran = ''; // Replace with appropriate logic to fetch or define $kwarran

// Include database connection and other necessary includes
include '../koneksi/config.php';
include '../includes/ucapan.php';

// Execute SQL queries
$sql_a1 = "SELECT * FROM berkas_a1 WHERE kwarran='$kwarran'";
$a1 = $conn->query($sql_a1);

$sql_a2 = "SELECT * FROM berkas_a2 WHERE kwarran='$kwarran'";
$a2 = $conn->query($sql_a2);

$sql_a3 = "SELECT * FROM berkas_a3 WHERE kwarran='$kwarran'";
$a3 = $conn->query($sql_a3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raicab | Berkas Kontingen</title>
    <link rel="shortcut icon" href="../asset/image/favicon.svg" type="image/x-icon">
    <!-- Stylesheets and scripts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/styledashboard.css">
    <link rel="stylesheet" href="../asset/css/styleberkas.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Sidebar Section -->
    <aside>
        <div class="toggle">
            <div class="logo">
                <img src="../asset/image/OFC_Logo_Raicab_Polos.webp" alt="Logo">
                <h2>Raicab III<span class="danger"></span></h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div>
        </div>
        <div class="sidebar">
            <!-- Sidebar links based on session kwarran -->
            <?php if ($_SESSION['kwarran'] == "all") { ?>
                <!-- Sidebar links for kwarran == "all" -->
                <!-- Add your sidebar links here -->
            <?php } else { ?>
                <!-- Sidebar links for other conditions -->
                <!-- Add your sidebar links here -->
            <?php } ?>
        </div>
    </aside>
    <!-- End of Sidebar Section -->

    <!-- Main Content -->
    <main>
        <!-- Table for displaying data -->
        <div class="recent-orders">
            <h2>Berkas Kontingen</h2>
            <table>
                <thead>
                    <tr>
                        <th>Berkas</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Lihat File</th>
                        <th>Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows for each type of file -->
                    <!-- Example for A1 -->
                    <tr>
                        <td>A1</td>
                        <td>Kesediaan Ranting</td>
                        <?php if ($a1->num_rows > 0) { ?>
                            <!-- If files exist, show status and file link -->
                            <td><button class="btnStatus">Terkirim</button></td>
                            <?php while ($row = $a1->fetch_assoc()) { ?>
                                <td><a href="./uploadBerkas/A1/<?php echo $row['filename']; ?>" class="btnLihat" target="_blank"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                            <?php } ?>
                        <?php } else { ?>
                            <!-- If no files, show appropriate message and upload button -->
                            <td>Tidak ada file</td>
                            <td><button class="btnAction" onclick="window.dialog1.showModal();">Upload Berkas</button></td>
                        <?php } ?>
                    </tr>
                    <!-- Repeat similar structure for A2 and A3 -->
                    <!-- Example for A2 -->
                    <tr>
                        <td>A2</td>
                        <td>Kesediaan Gugus Depan</td>
                        <!-- Similar logic as A1 -->
                    </tr>
                    <!-- Example for A3 -->
                    <tr>
                        <td>A3</td>
                        <td>Bukti Pembayaran</td>
                        <!-- Similar logic as A1 -->
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End of Table -->

        <!-- Include form dialogs for uploading files -->
        <?php include('./includes/dialog.php') ?>

    </main>
    <!-- End of Main Content -->

    <!-- Right Section -->
    <div class="right-section">
        <!-- Profile and navigation links -->
        <!-- Include necessary profile information and links -->
    </div>

    <!-- Scripts -->
    <script src="../asset/js/index.js"></script>
    <script src="../asset/js/sweetalert.js"></script>
    <script src="../asset/js/audio.js"></script>
</body>
</html>