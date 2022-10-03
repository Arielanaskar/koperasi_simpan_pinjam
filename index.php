<?php

include("konfig.php");

global $koneksi;

if (isset($_SESSION["anggota"])) {
    $id = $_SESSION["anggota"];
    $users = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
} elseif (isset($_SESSION["admin"])) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE id='$id'");
}else {
    $id = '';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="navbar">
                <div class="logo">
                    <img src="img/koprasi.png" alt="">
                    <h4>Koperasi Simpan Pinjam</h4>
                </div>
                <ul id="primary">
                    <li><a href="">Home</a></li>
                    <li><a href="">Tentang</a></li>
                </ul>
                <div class="user">
                    <?php if (isset($_SESSION["anggota"])) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-title">
                                <h4><?= substr($user["username"], 0, 10) ?></h4>
                            </div>
                            <div class="user-img">

                            </div>
                        <?php endforeach; ?>
                    <?php elseif (isset($_SESSION["admin"])) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-title">
                                <h4><?= substr($user["username"], 0, 10) ?></h4>
                                <p>Admin</p>
                            </div>
                            <div class="user-img">

                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="not-login">
                            <a href="login.php">login</a> |
                            <a href="register.php">register</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bg">
                <div class="bg-img">
                    <div class="bg-title">
                        <h1>Koperasi Simpan Pinjam</h1>
                        <h1>PT.SEJAHTERA JAYA</h1>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <?php if (isset($_SESSION["anggota"])) : ?>
                <h1>Menu</h1>
                <div class="menu-anggota">
                    <a href="ajukan-peminjaman.php" class="ajukan-pinjaman">
                        <div class="isi">
                            <h2 class="title1">Pinjaman</h2>
                        </div>
                    </a>
                    <a href="simpanan.php" class="simpanan">
                        <div class="isi">
                            <h2 class="title2">Simpanan</h2>
                        </div>
                    </a>
                </div>
            <?php elseif (isset($_SESSION["admin"])) : ?>
                <h1>Menu Admin</h1>
                <div class="menu">
                    <a href="anggota.php" class="anggota">
                        <div class="isi">
                            <h2 class="title1">Anggota</h2>
                        </div>
                    </a>
                    <a href="peminjaman.php" class="peminjaman">
                        <div class="isi">
                            <h2 class="title2">Peminjaman</h2>
                        </div>
                    </a>
                    <a href="simpanan.php" class="simpanan">
                        <div class="isi">
                            <h2 class="title2">Simpanan</h2>
                        </div>
                    </a>
                    <a href="laporan.php" class="laporan">
                        <div class="isi">
                             <h2 class="title2">Laporan</h2>
                        </div>
                    </a>
                </div>
            <?php else : ?>
                <h1>GADA MENU</h1>
            <?php endif; ?>
        </main>
        <section>
            <div class="visi">
                <div class="title">
                    <h2>VISI</h2>
                </div>
                <p>
                    Menjadi koperasi yang berpredikat SEHAT dengan jumlah anggota 100.000 orang pada akhir tahun 2022
                </p>
            </div>
            <div class="misi">
                <div class="title">
                    <h2>MISI</h2>
                    <p>
                        1. Menyediakan produk yang berkualitas dan sesuai dengan kebutuhan anggota <br>
                        2. Meningkatkan kualitas SDM sehingga dapat memberikan pelayanan yang prima <br>
                        3. Menerapkan tata kelola koperasi sehat yang terakreditasi <br>
                        4. Memperluas jaringan pelayanan dengan membuka TP-TP baru dengan fasilitas memadai <br>
                        5. Memaksimalkan semua anggota untuk berpartisipasi untuk memajukan koperasi <br>
                    </p>
                </div>
            </div>
            <div class="tujuan">
                <div class="title">
                    <h2>TUJUAN</h2>
                    <p>
                        Meningkatkan kesejahteraan ekonomi anggota koperasi di sekitarnya. Menjadi sokoguru dalam <br> perekonomian nasional. Membantu produsen dengan memberikan penawaran harga yang relatif lebih tinggi.
                    </p>
                </div>
            </div>
        </section>
        <footer>

        </footer>
    </div>
</body>

</html>