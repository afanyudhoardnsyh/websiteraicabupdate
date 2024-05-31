<?php
// koneksi
include '../koneksi/config.php';

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

$sql = "SELECT *FROM berkas_a1";
$a1 = $conn->query($sql);

$sql = "SELECT *FROM berkas_a2";
$a2 = $conn->query($sql);

$sql = "SELECT *FROM berkas_a3";
$a3 = $conn->query($sql);

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="   ../asset/css/styledashboard.css">
    <link rel="stylesheet" href="../asset/css/styleberkas.css">
    <title>Raicab | Berkas Kontingen</title>
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
                <a href="#"  class="active";>
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
                                <tr>
                                    <td>A1</td>
                                    <td>Kesediaan Ranting</td>
                                    <?php 
                                        if ($a1->num_rows > 0){
                                            echo "<td><button class='btnStatus'>Terkirim</butto></td>";
                                        } else{
                                            echo "<td>Tidak ada file</td>";
                                        }
                                    ?>

                                    <?php 
                                        if ($a1->num_rows > 0){
                                        while ($row = $a1->fetch_assoc()){
                                        $file_path = "./uploadBerkas/A1/" . $row['filename'];
                                    ?>
                                        <td><a href="<?php echo $file_path; ?>" class="btnLihat"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                                    <?php
                                    }
                                    } else {
                                        echo "<td>Tidak ada file</td>";
                                    }
                                    ?>

                                    <?php 
                                        if ($a1->num_rows == 0){
                                            echo "<td><button class='btnAction' onclick='openFormA1()'>Upload Berkas</button></td>";
                                        }else{
                                            echo 
                                            "<td class='action'> 
                                                <a href='../berkas/edit/editA1.php' class='btnEdit'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>
                                                <a href='../berkas/delete/deleteA1.php' class='btnDelete'><i class='fa-solid fa-square-minus fa-xl'></i></a>
                                            </td>";
                                        }
                                    ?>
                                </tr>

                                <tr>
                                    <td>A2</td>
                                    <td>Kesediaan Gugus Depan</td>
                                    <?php 
                                        if ($a2->num_rows > 0){
                                            echo "<td><button class='btnStatus'>Terkirim</button></td>";
                                        }else{
                                            echo "<td>Tidak ada file</td>";
                                        }
                                    ?>

                                    <?php 
                                        if ($a2->num_rows > 0) {
                                        while ($row = $a2->fetch_assoc()) {
                                        $file_path = "./uploadBerkas/A2/" . $row['filename'];
                                    ?>
                                        <td><a href="<?php echo $file_path; ?>" class="btnLihat"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                                    <?php
                                    }
                                    } else {
                                        echo "<td>Tidak ada file</td>";
                                    }
                                    ?>

                                    <?php 
                                        if ($a2->num_rows == 0){
                                            echo "<td><button class='btnAction' onclick='openFormA2()'>Upload Berkas</button></td>";
                                        }else{
                                            echo 
                                            "<td class='action'> 
                                                <a href='../berkas/edit/editA2.php' class='btnEdit'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>
                                                <a href='../berkas/delete/deleteA2.php' class='btnDelete'><i class='fa-solid fa-square-minus fa-xl'></i></a>
                                            </td>";
                                        }
                                    ?>
                                </tr>

                                <tr>
                                    <td>A3</td>
                                    <td>Bukti Pembayaran</td>
                                    <?php 
                                        $status = "terkirim";
                                        if ($a3->num_rows > 0){
                                            echo "<td><button class='btnStatus'>Terkirim</button></td>";
                                        }else{
                                            echo "<td>Tidak ada file</td>";
                                        }
                                    ?>

                                    <?php 
                                        if ($a3->num_rows > 0) {
                                        while ($row = $a3->fetch_assoc()) {
                                        $file_path = "./uploadBerkas/A3/" . $row['filename'];
                                    ?>
                                        <td><a href="<?php echo $file_path; ?>" class="btnLihat"><i class="fa-solid fa-eye"></i> Lihat</a></td>
                                    <?php
                                    }
                                    } else {
                                        echo "<td>Tidak ada file</td>";
                                    }
                                    ?>

                                    <?php 
                                        if ($a3->num_rows == 0){
                                            echo "<td><button class='btnAction' onclick='openFormA3()'>Upload Berkas</button></td>";
                                        }else{
                                            echo 
                                            "<td class='action'> 
                                                <a href='../berkas/edit/editA3.php' class='btnEdit'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>
                                                <a href='../berkas/delete/deleteA3.php' class='btnDelete'><i class='fa-solid fa-square-minus fa-xl'></i></a>
                                            </td>";
                                        }
                                    ?>
                                </tr>
                    </tbody>
                </table>
            </div>
        <!-- End of Table -->

        <!-- Form Upload Berkas -->
        <div class="container mt-5" id="myFormA1">
                <h2>Upload Berkas A1</h2>
                <button class="btnClose" onclick="closeFormA1()">x</button>
                <form action="../berkas/upload/uploadA1.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <div class="mb-3">
                        <label for="file" class="form-label">Select file</label>
                        <input type="file" class="form-control" name="file" id ="file">
                    </div>
                <button type="submit" class="btnUpload">Upload file</button>
                </form>
            </div>

            <div class="container mt-5" id="myFormA2">
                <h2>Upload Berkas A2</h2>
                <button class="btnClose" onclick="closeFormA2()">x</button>
                <form action="../berkas/upload/uploadA2.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <div class="mb-3">
                        <label for="file" class="form-label">Select file</label>
                        <input type="file" class="form-control" name="file" id ="file">
                    </div>
                <button type="submit" class="btnUpload">Upload file</button>
                </form>
            </div>

            <div class="container mt-5" id="myFormA3">
                <h2>Upload Berkas A3</h2>
                <button class="btnClose" onclick="closeFormA3()">x</button>
                <form action="../berkas/upload/uploadA3.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <div class="mb-3">
                        <label for="file" class="form-label">Select file</label>
                        <input type="file" class="form-control" name="file" id ="file">
                    </div>
                <button type="submit" class="btnUpload">Upload file</button>
                </form>
            </div>

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