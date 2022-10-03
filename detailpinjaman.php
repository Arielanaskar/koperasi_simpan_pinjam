<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE id='$id'");
    $id_anggota = $_GET["id"];
    $anggota = query("SELECT * FROM ajukan_pinjaman WHERE id_anggota='$id_anggota'");
    $no_rek = query("SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
    $angsuran = query("SELECT * FROM angsuran WHERE id_anggota='$id_anggota'");
} else {
    $id_anggota = '';
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pinjaman</title>
    <link rel="stylesheet" href="CSS/detail.css">
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="peminjaman.php">Laporan Peminjaman</a></li>
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
        </header>
        <main>
            <h1>Detail Peminjaman</h1>
            <div class="kotak">
                <?php foreach ($anggota as $key): ?>
                    <ul>
                        <li>
                            <h4>Id Anggota:</h4>
                            <p><?= $key["id_anggota"] ?></p>
                        </li>
                        <li>
                            <h4>Nama: </h4>
                            <p><?= $key["username"] ?></p>
                        </li>
                        <li>
                            <h4>Tgl Pinjam: </h4>
                            <p><?= $key["tgl_pinjaman"] ?></p>
                        </li>
                        <li>
                            <h4>Jumlah Pinjaman: </h4>
                            <p><?= $key["nominal"] ?></p>
                        </li>
                        <li>
                            <h4>Lama Angsuran: </h4>
                            <p><?= $key["angsuran"] ?>x</p>
                        </li>
                <?php endforeach; ?>
                <?php foreach ($no_rek as $key): ?>
                        <li>
                            <h4>No rekening: </h4>
                            <p><?= $key["no_rek"] ?></p>
                        </li>
                <?php endforeach; ?>
                    </ul>
            </div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Angsuran</th>
                    <th>Biaya Admin</th>
                    <th>Total Bayar</th>
                    <th>Sisa</th>
                    <th>Jatuh-Tempo</th>
                    <th>Tanggal bayar</th>
                </tr>
                <!-- <tr>
                    <td>1</td>
                    <td>10000</td>
                    <td>5000</td>
                    <td>250.000</td>
                    <td>perbulan</td>
                    <td>2022-29-03</td>
                </tr> -->
            </table>
        </main>
    </div>
</body>

</html>