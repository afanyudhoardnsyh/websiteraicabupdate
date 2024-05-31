<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Raicab | Kegiatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/383c3b5422.js" crossorigin="anonymous"></script>
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/stylegiat.css">
</head>
<body>
<header>
    <nav class="navbar">
    <img src="image/OFC_WHITE Logo Raicab.webp" alt="Raimuna Cabang III Kota Depok">
        <div class="logo" href="#">RAIMUNA CABANG III KOTA DEPOK</div>
        <ul class="menu-links">
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
            <li><a href="index.php">BERANDA</a></li>
            <li><a href="tentang.php">TENTANG</a></li>
            <li><a href="mediaunduh.php">MEDIA UNDUH</a></li>
            <li><a href="kegiatan.php" class="active">KEGIATAN</a></li>
            <div><a href="./login/login.php" class="action_btn">MASUK</a></div>
        </ul>
        <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
</header>

<!-- Pop Up Script Kegiatan -->
<!-- Giat Rutin -->
<div class="modal fade" id="rutin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Giat Rutin</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Rutin adalah serangkaian kegiatan yang dilakukan secara teratur dalam periode waktu tertentu, membantu menciptakan struktur, produktivitas, dan keseimbangan dalam kehidupan sehari-hari.
            </div>
        </div>
    </div>
</div>

<!-- Giat Umum -->
<div class="modal fade" id="umum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Giat Umum</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Umum adalah kegiatan yang dilakukan tanpa pola waktu atau jadwal tetap, bersifat spontan dan biasa dilakukan oleh banyak orang.
            </div>
        </div>
    </div>
</div>

<!-- Giat Budaya -->
<div class="modal fade" id="budaya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Giat Budaya</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Budaya adalah kegiatan yang melibatkan masyarakat dalam menjaga dan menghargai aspek kebudayaan, seperti seni, tradisi, atau perayaan.
            </div>
        </div>
    </div>
</div>

<!-- Giat Wawasan -->
<div class="modal fade" id="wawasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Wawasan</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Wawasan adalah upaya meningkatkan pemahaman dan pengetahuan lintas bidang untuk pengembangan pengetahuan yang lebih luas.            
            </div>
        </div>
    </div>
</div>

<!-- Giat Prestasi -->
<div class="modal fade" id="prestasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Prestasi</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Prestasi adalah usaha mencapai kinerja unggul dalam berbagai bidang, seperti pendidikan, karier, atau olahraga.
            </div>
        </div>
    </div>
</div>

<!-- Giat Sako -->
<div class="modal fade" id="sako" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Saka & Sako</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Saka & Sako adalah upaya meningkatkan pengenalan satuan karya dan satuan komunitas di kota Depok untuk pengetahuan dan keterampilan yang lebih luas.
            </div>
        </div>
    </div>
</div>

<!-- Giat Outdoor -->
<div class="modal fade" id="outdoor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Outdoor</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Outdoor Activity adalah kegiatan di luar ruangan melibatkan interaksi alam, seperti hiking, camping, atau olahraga outdoor.
            </div>
        </div>
    </div>
</div>

<!-- Giat Wisata -->
<div class="modal fade" id="wisata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Wisata</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Wisata adalah kegiatan yang melibatkan perjalanan atau kunjungan ke tempat-tempat menarik untuk tujuan rekreasi, hiburan, atau eksplorasi.
            </div>
        </div>
    </div>
</div>

<!-- Giat Pinkon -->
<div class="modal fade" id="pinkon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title  id="exampleModalLabel">Giat Pinkon & Bindamping</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Pinkon dan Bindamping adalah kegiatan khusus yang diikuti oleh setiap pimpinan Kontingen dan pembina pendamping dari setiap kwartir.
            </div>
        </div>
    </div>
</div>

<!-- Giat Funsport -->
<div class="modal fade" id="funsport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title " id="exampleModalLabel">Giat Funsport</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                Giat Funsport adalah kegiatan olahraga yang menyenangkan dan santai, seperti ultimate frisbee, beach volleyball, atau sepak bola pantai.
            </div>
        </div>
    </div>
</div>

<!-- kegiatan section start -->
<section class="kegiatan" id="kegiatan">
<div class="max-width">
<h2 class="title">Kegiatan Raimuna Cabang III Kota Depok</h2>
    <div class="wrapper">
        <i id="left" class="fa-solid fa-chevron-left"></i>
        <div class="carousel">
            <img src="image/giatrutin.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#rutin">
            <img src="image/GiatUmum.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#umum">
            <img src="image/GiatBudaya.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#budaya">
            <img src="image/GiatWawasan.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#wawasan">
            <img src="image/GiatPrestasi.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#prestasi">
            <img src="image/GiatSako.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#sako">
            <img src="image/GiatOutdoor.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#outdoor">
            <img src="image/GiatWisata.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#wisata">
            <img src="image/GiatPinkon.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#pinkon">
            <img src="image/GiatFunsport.webp" alt="img" draggable="false" data-bs-toggle="modal" data-bs-target="#funsport">
        </div>
        <i id="right" class="fa-solid fa-chevron-right"></i>
    </div>
</div>
</section>

<!-- contact section start -->
<section class="contact" id="contact">
        <div class="max-width">
            <div class="contact-content">
                <div class="column left">
                    <img src="image/OFC_Logo_Raicab_Polos.webp">
                    <div class="text">
                        <spam class="text-1">RAIMUNA CABANG III</spam><br>
                        <span class="text-2">KOTA DEPOK</span><br>
                        <span class="text-3">2024</span>
                    </div>
                    <P> Ini adalah situs resmi Raimuna Cabang lll Tahun 2024. Konten yang tercantum di situs ini dimaksudkan untuk tujuan informasional, 
                        bukan tujuan komersial. Setiap penjualan yang ditampilkan dimaksudkan sebagai tanda kemitraan dan selalu akan mengarahkan Anda 
                        ke situs mitra kami.
                    </P>
                </div>
                <div class="column right">
                    <div class="text">Kontak Kami</div>
                    <div class="alamat">
                        <div class="text1">Alamat</div>
                        <div class="text2">Jl. Boulevard Raya Grand Depok City Kalimulya, Kec. Cilodong, Kota Depok, Jawa Barat 16413</div>
                    <div class="row">
                        <div class="info-sosmed">
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=dkckotadepok@gmail.com&su=Raicab%20III%202024&body=Halo kaa," target="_blank"><img class="email" style="margin:2px" src="image/gmail.webp" width="30" height="30" alt="Email"></a>
                            <a href="https://www.instagram.com/dkc_kotadepok" target="_blank"><img  class="ig" style="margin:5px" src="https://cdn-icons-png.flaticon.com/128/2111/2111463.png" width="25" height="25" alt="Instagram"></a>
                        </div>
                    </div>
                </div>
                    <div class="container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7355482140233!2d106.82496667423598!3d-6.428011162858869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebf8cc5cf5bd%3A0x1cb0348aaa9190e1!2sGedung%20Pramuka%20Depok%20(Kwarcab%20Depok)!5e0!3m2!1sid!2sid!4v1709527268342!5m2!1sid!2sid" width="200" height="145" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- footer section start -->
<footer>
        <div class="row">
            <div class="info-footer">
                <a href="#" target="_blank"><img class="maskot" src="image/Maskot-Raicab.webp" alt="Maskot Raicab"></a>
                <a href="#" target="_blank"><img class="logo" src="image/OFC_Logo_Raicab_Polos.webp" alt="Logo Raicab"></a>
            </div>
            <div class="text">Raimuna Cabang III</div>
            <div class="text1">|</div> 
            <div class="text2">2024 All rights reserved.</div> 
        </div>
</footer>
    <script src="asset/app.js"></script>
    <script src="asset/navbar.js"></script>
    <script src="asset/activenavbar.js"></script>  
    
</body>
</html>