<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE user_id='$id'");
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
                    <li><a href="#tentang">Tentang</a></li>
                </ul>
                <div class="user">
                    <?php if (isset($_SESSION["anggota"])) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-title">
                                <div class="kotak-akun">
                                    <h4><?= substr($user["username"], 0, 10) ?></h4>
                                    <img src="img/panahbawah.png" alt="" srcset="" id="panahbawah">
                                </div>
                                <p>anggota</p>
                            </div>
                            <div class="dropdown-menu" slidedown="no">
                                <a href="acount.php">account</a>
                            </div>
                        <?php endforeach; ?>
                    <?php elseif (isset($_SESSION["admin"])) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-title">
                                <div class="kotak-akun">
                                    <h4><?= substr($user["username"], 0, 10) ?></h4>
                                    <img src="img/panahbawah.png" alt="" srcset="" id="panahbawah">
                                </div>
                                <p>admin</p>
                            </div>
                            <div class="dropdown-menu" slidedown="no">
                                <a href="acount.php">account</a>
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
            <h2>Detail Peminjaman</h2>
            <div class="kotak">
                <?php foreach ($anggota as $key): ?>
                    <ul>
                        <li>
                            <h4><pre>Id Anggota           :</pre></h4>
                            <p><?= $key["id_anggota"] ?></p>
                        </li>
                        <li>
                            <h4><pre>Nama                       :</pre></h4>
                            <p><?= $key["username"] ?></p>
                        </li>
                        <li>
                            <h4><pre>Tgl Pinjam             :</pre></h4>
                            <p><?= $key["tgl_pinjaman"] ?></p>
                        </li>
                        <li>
                            <h4><pre>Jumlah Pinjaman   :</pre></h4>
                            <p><?= $key["nominal"] ?></p>
                        </li>
                        <li>
                            <h4><pre>Lama Angsuran   :</pre></h4>
                            <p><?= $key["angsuran"] ?>x</p>
                        </li>
                <?php endforeach; ?>
                <?php foreach ($no_rek as $key): ?>
                        <li>
                            <h4><pre>No rekening             :</pre></h4>
                            <p><?= $key["no_rek"] ?></p>
                        </li>
                <?php endforeach; ?>
                    </ul>
            </div>
            <div class="tabel-detail">
                <div class="data-tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Angsuran</th>
                                <th>Biaya Admin</th>
                                <th>Total Bayar</th>
                                <th>Sisa</th>
                                <th>Jatuh-Tempo</th>
                                <th>Tanggal bayar</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>3</td>
                                <td>10000</td>
                                <td>100.000</td>
                                <td>200.000</td>
                                <td>20-19-2022</td>
                                <td>19-19-2022</td>
                                <td>tahi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="JS/jquery-3.6.1.min.js"></script>
    <script>
        $("#panahbawah").on('click', function() {
            let slidedown = $(".dropdown-menu").attr("slidedown");
            // console.log(slidedown);
            if (slidedown == "no") {
                $(".dropdown-menu").css({
                "animation" : "slidedown 1s ease-in-out forwards",
                });
                $(".dropdown-menu").attr("slidedown" , "yes");
            } else if(slidedown == "yes") {
                $(".dropdown-menu").css({
                "animation" : "slideup 1s ease-in-out forwards",
                });
                $(".dropdown-menu").attr("slidedown" , "no");
            }
            // $(".dropdown-menu").attr("slidedown" , "yes");
        })
    </script>
</body>

</html>