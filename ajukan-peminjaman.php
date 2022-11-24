<?php

include("konfig.php");

if (isset($_SESSION["anggota"])) {
    $id = $_SESSION["anggota"];
    $users = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
    $table = mysqli_fetch_assoc($users);
    $user = $table["username"];
    $pinjaman = mysqli_query($koneksi, "SELECT * FROM ajukan_pinjaman WHERE id_anggota='$id'");
    if (mysqli_num_rows($pinjaman) == 1) {
        $row = mysqli_fetch_assoc($pinjaman);
        $status = $row["status"];
    }
    if (isset($_POST["submit"])) {
        Pengajuan($_POST, $id);
    }
} else {
    header("Location: login.php");
}

$result = mysqli_query($koneksi, "SELECT * FROM ajukan_pinjaman WHERE id_anggota='$id'");
$data = query("SELECT * FROM ajukan_pinjaman WHERE id_anggota='$id'");




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form peminjaman</title>
    <link rel="stylesheet" href="CSS/ajukan_pinjaman.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="img/koprasi.png" alt="">
                <h4>Koperasi Simpan Pinjam</h4>
            </div>
            <ul id="primary">
                <li><a href="index.php">Home</a></li>
                <li><a href="">Tentang</a></li>
                <!-- <li><a href="">Contact</a></li> -->
            </ul>
            <div class="user">
                <?php if (isset($_SESSION["anggota"])) : ?>
                    <div class="user-title">
                        <h4><?= substr($user, 0, 10) ?></h4>
                    </div>
                    <div class="user-img">

                    </div>
                <?php else : ?>
                    <div class="not-login">
                        <a href="login.php">login</a> |
                        <a href="register.php">register</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (mysqli_num_rows($result) == 1) : ?>
            <?php if ($status === 'Diterima') : ?>
                <?php foreach ($data as $key) : ?>
                    <div class="data-pengajuan">
                        <table id="tbl-pengajuan">
                            <tr>
                                <th>Nama</th>
                                <th>Tgl credit</th>
                                <th>Nominal</th>
                                <th>Angsuran</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td><?= $key["username"] ?></td>
                                <td><?= $key["tgl_pinjaman"] ?></td>
                                <td><?= $key["nominal"] ?></td>
                                <td><?= $key["angsuran"] ?>x</td>
                                <td><?= $key["ket"] ?></td>
                                <td><?= $key["status"] ?></td>
                                <td>
                                    <button id="bayar">Bayar</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; ?>
                <div class="pembayaran">
                    <div class="header-pembayaran">
                        <img src="img/arrow.png" alt="" id="kembali">
                        <h2>
                            Pembayaran
                        </h2>
                    </div>
                    <div class="main-pembayaran">
                        <form action="" method="post">
                            <div class="grup-input">
                                <label for="nominal-pembayaran">masukan nominal</label>
                                <input type="text" name="nominal-pembayaran" id="nominal-pembayaran">
                            </div>
                            <div class="grup-input">
                                <label for="metode-pembayaran">metode pembayaran</label>
                                <select name="metode-pembayaran" id="metode-pembayaran">
                                    <!-- <img src="img/bca.png" alt="" srcset="" width="80"> -->
                                    <option value="BCA">&emsp; BCA</option>
                                    <option value="BNI"><img src="img/bni.png" alt="" srcset="">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Alfamart">Alfamart</option>
                                    <option value="Indomaret">Indomaret</option>
                                </select>
                            </div>
                            <button type="submit" name="bayar">Bayar</button>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <?php foreach ($data as $key) : ?>
                    <div class="data-pengajuan">
                        <table id="tbl-pengajuan">
                            <tr>
                                <th>Nama</th>
                                <th>Tgl credit</th>
                                <th>Nominal</th>
                                <th>Angsuran</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td><?= $key["username"] ?></td>
                                <td><?= $key["tgl_pinjaman"] ?></td>
                                <td><?= $key["nominal"] ?></td>
                                <td><?= $key["angsuran"] ?>x</td>
                                <td><?= $key["ket"] ?></td>
                                <td><?= $key["status"] ?></td>
                                <td>
                                    <button name="cancel" id="cancel">cancel</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else : ?>
            <form action="" method="post">
                <div class="title">
                    <h2>
                        Formulir Pengajuan Peminjaman
                    </h2>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <div class="imgbox">
                            <img src="img/user (1).png" alt="" srcset="">
                        </div>
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" id="namaLengkap" name="namaLengkap" value="<?= $user ?>">
                    </div>
                    <div class="input-box">
                        <div class="imgbox">
                            <img src="img/home.png" alt="" srcset="">
                        </div>
                        <label for="lama-angsuran">Lama-Angsuran</label>
                        <select name="lama-angsuran" id="lama-angsuran">
                            <option value="2">2 x</option>
                            <option value="3">3 x</option>
                            <option value="4">4 x</option>
                            <option value="5">5 x</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <div class="imgbox">
                            <img src="img/calendar.png" alt="" srcset="">
                        </div>
                        <label for="tanggal">Tanggal</label>
                        <input type="text" id="tanggal" name="tanggal" value="<?= date("Y-m-d") ?>">
                    </div>
                    <div class="input-box">
                        <div class="imgbox">
                            <img src="img/pay.png" alt="" srcset="">
                        </div>
                        <label for="nominal">Nominal</label>
                        <input type="text" name="nominal" id="nominal" maxlength="7" placeholder="Limit : 5.000.000">
                        <p style="color:red ;" id="pesan">Maaf Anda Telah Mencapai Limit Nominal</p>
                    </div>
                    <div class="input-box">
                        <div class="imgbox">
                            <img src="img/information.png" alt="" srcset="">
                        </div>
                        <label for="keterangan">Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan">
                    </div>
                </div>
                <button type="submit" id="btn-submit" name="submit">Kirim Pengajuan</button>
            </form>
            <div class="table">
                <div class="title">
                    <h2>Simulasi Pinjaman</h2>
                </div>
                <table id="simulasi-pinjaman">
                    <tr>
                        <th>Ags ke</th>
                        <th>Biaya Bunga</th>
                        <th>Biaya Admin</th>
                        <th>Jumlah Tagihan</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>30%</td>
                        <td>1.500</td>
                        <td>1.500</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>30%</td>
                        <td>1.500</td>
                        <td>1.500</td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>