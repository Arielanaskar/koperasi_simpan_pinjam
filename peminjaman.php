<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE user_id='$id'");
    // $data = query()
    if (isset($_GET["data"])) {
        $data = $_GET["data"];
        if ($data === 'terima') {
            $anggota = query("SELECT * FROM ajukan_pinjaman WHERE status='Diterima'");
        } elseif ($data === 'tolak') {
            $anggota = query("SELECT * FROM ajukan_pinjaman WHERE status='Ditolak'");
        }
    } else {
        $anggota = query("SELECT * FROM ajukan_pinjaman WHERE status='menunggu konfirmasi'");
        $data = '';
    }
} else {
    header("Location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="CSS/peminjaman.css">
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
            <div class="title">
                <h2>Laporan Peminjaman</h2>
            </div>
            <div class="tabel-pinjaman">
                <div class="header-tabel-pinjaman">
                    <ul>
                        <?php if ($data === 'terima') : ?>
                            <li><a href="peminjaman.php?data=terima" style="background-color:mediumseagreen; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Diterima</a></li>
                            <li><a href="peminjaman.php?data=tolak">Ditolak</a></li>
                            <li><a href=" peminjaman.php" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">Belum dikonfirmasi</a></li>
                            <!-- <li><a href="">Pembayaran</a></li> -->
                        <?php elseif ($data === 'tolak') : ?>
                            <li><a href="peminjaman.php?data=terima" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Diterima</a></li>
                            <li><a href="peminjaman.php?data=tolak" style="background-color:mediumseagreen;">Ditolak</a></li>
                            <li><a href=" peminjaman.php" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">Belum dikonfirmasi</a></li>
                            <!-- <li><a href="">Pembayaran</a></li> -->
                        <?php else : ?>
                            <li><a href="peminjaman.php?data=terima" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Diterima</a></li>
                            <li><a href="peminjaman.php?data=tolak">Ditolak</a></li>
                            <li><a href="peminjaman.php" style="background-color:mediumseagreen; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">Belum dikonfirmasi</a></li>
                            <!-- <li><a href="">Pembayaran</a></li> -->
                        <?php endif; ?>
                        <!-- <li><a href="">Pembayaran</a></li> -->
                    </ul>
                </div>
                <div class="data-tabel">
                    <?php $i=1; ?>
                    <?php if ($data === 'terima') : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th id="id">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jumlah</th>
                                    <th>Jml Angsur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($anggota as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key["tgl_pinjaman"] ?></td>
                                    <td><?= $key["username"] ?></td>
                                    <td><?= $key["nominal"] ?></td>
                                    <td><?= $key["angsuran"] ?></td>
                                    <td id="keterangan"><?= $key["ket"] ?></td>
                                    <td style="color: mediumseagreen;"><?= $key["status"] ?></td>
                                    <td>
                                        <a href="detailpinjaman.php?id=<?= $key["id_anggota"] ?>" id="detail">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php elseif ($data === 'tolak') : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th id="id">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jumlah</th>
                                    <th>Jml Angsur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $key) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $key["tgl_pinjaman"] ?></td>
                                        <td><?= $key["username"] ?></td>
                                        <td><?= $key["nominal"] ?></td>
                                        <td><?= $key["angsuran"] ?></td>
                                        <td id="keterangan"><?= $key["ket"] ?></td>
                                        <td style="color: red;"><?= $key["status"] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th id="id">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jumlah</th>
                                    <th>Jml Angsur</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $key) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $key["tgl_pinjaman"] ?></td>
                                        <td><?= $key["username"] ?></td>
                                        <td><?= $key["nominal"] ?></td>
                                        <td><?= $key["angsuran"] ?></td>
                                        <td id="keterangan"><?= $key["ket"] ?></td>
                                        <td>
                                            <a href="terima.php?id=<?= $key["id_anggota"] ?>" id="terima">terima</a>
                                            <a href="tolak.php?id=<?= $key["id_anggota"] ?>" id="tolak">tolak</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
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