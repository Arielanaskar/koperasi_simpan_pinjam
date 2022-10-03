<?php
 
include("konfig.php");

if (isset($_SESSION["admin"]) || isset($_SESSION["anggota"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    daftar($_POST);
}
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/register.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="title">
                <img src="img/koprasi.png" alt="">
                <h3>REGISTER</h3>
                <h3>PT. SEJAHTERA JAYA</h3>
            </div>
            <div class="wrapper">
                <div class="inputbox">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" placeholder="masukan nama lengkap" required maxlength='32' name="nama_lengkap" id="nama_lengkap">
                </div>
                <div class="inputbox">
                    <label for="ttl">Tempat/tgl lahir</label>
                    <input type="date" placeholder="masukan tempat tanggal lahir" required name="ttl" id="ttl">
                </div>
                <div class="inputbox">
                    <label for="nik">Nik</label>
                    <input type="text" placeholder="masukan nik" required name="nik" id="nik" minlength="15" maxlength="16">
                </div>
                <div class="inputbox">
                    <label for="alamat">Alamat</label>
                    <input type="text" placeholder="masukan alamat" required name="alamat" id="alamat">
                </div>
                <div class="inputbox">
                    <label for="no_rekening">No Rek</label>
                    <input type="text" placeholder="masukan nomor rekening" required name="no_rekening" minlength="14" maxlength="15" id="no_rekening">
                </div>
                <div class="inputbox">
                    <label for="no_telp">No telphone</label>
                    <input type="text" placeholder="masukan nomer telpon" required name="no_telp" id="no_telp">
                </div>
                <div class="inputbox">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jk">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="inputbox">
                    <label for="SJ">Status Jabatan</label>
                    <select name="status_jabatan" id="SJ">
                        <option value="Karyawan">Karyawan</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
                <div class="inputbox">
                    <label for="pw">Kata Sandi</label>
                    <input type="password" placeholder="masukan password" required name="password" id="pw" minlength="8" maxlength="100">
                </div>
                <div class="inputbox">
                    <label for="konfirmasi">Konfirmasi Sandi</label>
                    <input type="password" placeholder="konfirmasi password" required name="konfirmasi" id="konfirmasi" minlength="8" maxlength="100">
                </div>
            </div>
            <div class="input">
                <button type="sudmit" name="submit">DAFTAR</button>
            </div>
        </form>
    </div>
</body>

</html>