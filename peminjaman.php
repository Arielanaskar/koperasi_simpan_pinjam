<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE id='$id'");
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
                    <li><a href="">Laporan Peminjaman</a></li>
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
            <div class="title">
                <h1>Laporan Peminjaman</h1>
            </div>
            <div class="pesan">
                <ul>
                    <?php if ($data === 'terima') : ?>
                        <li><a href="peminjaman.php?data=terima" style="background-color:mediumseagreen;">Diterima</a></li>
                        <li><a href="peminjaman.php?data=tolak">Ditolak</a></li>
                        <li><a href=" peminjaman.php">Belum dikonfirmasi</a></li>
                    <?php elseif ($data === 'tolak') : ?>
                        <li><a href="peminjaman.php?data=terima">Diterima</a></li>
                        <li><a href="peminjaman.php?data=tolak" style="background-color:mediumseagreen;">Ditolak</a></li>
                        <li><a href=" peminjaman.php">Belum dikonfirmasi</a></li>
                    <?php else : ?>
                        <li><a href="peminjaman.php?data=terima">Diterima</a></li>
                        <li><a href="peminjaman.php?data=tolak">Ditolak</a></li>
                        <li><a href="peminjaman.php" style="background-color:mediumseagreen;">Belum dikonfirmasi</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if ($data === 'terima') : ?>
                <table>
                    <?php foreach ($anggota as $key) : ?>
                        <tr>
                            <th id="id">Id</th>
                            <th>Tanggal</th>
                            <th>Nama Lengkap</th>
                            <th>Jumlah</th>
                            <th>Jml Angsur</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td><?= $key["id_anggota"] ?></td>
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
                </table>
            <?php elseif ($data === 'tolak') : ?>
                <table>
                    <tr>
                        <th id="id">Id</th>
                        <th>Tanggal</th>
                        <th>Nama Lengkap</th>
                        <th>Jumlah</th>
                        <th>Jml Angsur</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach ($anggota as $key) : ?>
                        <tr>
                            <td><?= $key["id_anggota"] ?></td>
                            <td><?= $key["tgl_pinjaman"] ?></td>
                            <td><?= $key["username"] ?></td>
                            <td><?= $key["nominal"] ?></td>
                            <td><?= $key["angsuran"] ?></td>
                            <td id="keterangan"><?= $key["ket"] ?></td>
                            <td style="color: red;"><?= $key["status"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <table>
                    <tr>
                        <th id="id">Id</th>
                        <th>Tanggal</th>
                        <th>Nama Lengkap</th>
                        <th>Jumlah</th>
                        <th>Jml Angsur</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($anggota as $key) : ?>
                        <tr>
                            <td><?= $key["id_anggota"] ?></td>
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
                </table>
            <?php endif; ?>
        </main>
    </div>
</body>

</html>