<?php

include("konfig.php");

global $koneksi;

if (isset($_SESSION["anggota"])) {
    $id = $_SESSION["anggota"];
    $users = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
} elseif (isset($_SESSION["admin"])) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE user_id='$id'");
} else {
    $id = '';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="CSS/simpanan.css">
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
                            <div class="kotak-akun">
                                    <h4><?= substr($user["username"], 0, 10) ?></h4>
                                    <img src="img/panahbawah.png" alt="" srcset="" id="panahbawah">
                                </div>
                                <p>admin</p>
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
            <div class="input-group">
                <div class="input-box">
                    <label for="nama">NAMA</label>
                    <input type="text" name="nama" placeholder="masukan nama anda">
                </div>
                <div class="input-box">
                    <label for="saldo">SALDO</label>
                    <input type="text" name="saldo" placeholder="masukan saldo anda">
                </div>
                <div class="input-box">
                    <label for="anggota">ANGGOTA</label>
                    <input type="text" name="anggota" placeholder="masukan anggota anda">
                </div>
                <div class="input-box">
                    <label for="tanggal">TANGGAL</label>
                    <input type="date" name="tanggal" placeholder="masukan tanggal">
                </div>
                <div class="input-box">
                    <label for="jenis_simpanan">JENIS SIMPANAN</label>
                    <select name="jenis_simpanan" id="jenis_simpanan">
                        <option value="">PILIH JENIS SIMPANAN</option>
                        <option value="pokok">SIMPANAN POKOK</option>
                        <option value="wajib">SIMPANAN WAJIB</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="nominal">NOMINAL</label>
                    <input type="text" name="nominal" placeholder="masukan nominal anda">
                </div>
                <div class="button">
                    <button type="submit">Simpan</button>
                </div>
            </div>
            <div class="simpanan">
                <h2>Simpanan</h2>
                <div class="tabel-simpanan">
                    <div class="header-tblsimpanan">
                        <button id="btn-tambahSimpanan">Tambah</button>
                        <div class="report">
                            <p>Report</p>
                            <input type="date" name="" id="list-tanggal" placeholder="hh/bb/tt">
                        </div>
                        <input type="text" name="" id="list-cari" placeholder="Pencarian">
                    </div>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Simpanan</th>
                            <th>Simpanan</th>
                            <th>Saldo</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2022-19-17</td>
                            <td>Pokok</td>
                            <td>500.000</td>
                            <td>500.000</td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
</body>

</html>