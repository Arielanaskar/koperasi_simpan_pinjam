<?php
 
require 'konfig.php';
global $koneksi;

if (!isset($_SESSION["anggota"])) {
    header("Location: login.php");
}

$id_anggota = $_SESSION ["anggota"];
$users = query("SELECT * FROM anggota WHERE id_anggota=$id_anggota");
$nama_lengkap = mysqli_query($koneksi,"SELECT username FROM anggota WHERE id_anggota = $id_anggota");
$result = mysqli_fetch_assoc($nama_lengkap);
$split_nama = explode(" ",$result["username"]);
$nama_depan = $split_nama[0];
$nama_belakang = $split_nama[1];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/acount.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?= $result["username"] ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <?php foreach ($users as $user): ?>
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nama</label><input type="text" class="form-control" placeholder="Awal name" value="<?= $nama_depan?>"></div>
                        <div class="col-md-6"><label class="labels">Nama belakang</label><input type="text" class="form-control" value="<?= $nama_belakang ?>" placeholder="Nama belakang"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12"><label class="labels">Jabatan</label><input type="text" class="form-control" placeholder="Jabatan" value="<?= $user["jabatan"] ?>"></div>
                        <div class="col-md-12"><label class="labels">No telp</label><input type="text" class="form-control" placeholder="No telp" value="<?= $user["no_tlpn"] ?>"></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" placeholder="Alamat" value="<?= $user["alamat"] ?>"></div>
                        <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input type="text" class="form-control" placeholder="Tanggal Lahir" value="<?= $user["ttl"] ?>"></div>
                        <div class="col-md-12"><label class="labels">Jenis Kelamin</label><input type="text" class="form-control" placeholder="Jenis kelamin" value="<?= $user["jk"] ?>"></div>
                    </div>
                    <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="button">Perbarui</button></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4 mt-5">
            <?php foreach ($users as $user): ?>
                <div class="p-3 py-5">
                    <div class="col-md-12"><label class="labels">No Rekening</label><input type="text" class="form-control" placeholder="Nomor rekening" value="<?= $user["no_rek"] ?>"></div> <br>
                    <div class="col-md-12"><label class="labels">Nik</label><input type="text" class="form-control" placeholder="Nik" value="<?= $user["nik"] ?>"></div>
                    <div class="d-flex justify-content-between align-items-center experience">
                        <a href="logout.php" class="border px-3 p-1 add-experience btn btn-primary">
                            <i class="fa fa-plus"></i>Logout
                        </a>
                    </div><br>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="JS/account.js"></script>
</body>
</html>