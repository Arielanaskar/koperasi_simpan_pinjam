<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE id='$id'");
    $anggota = query("SELECT * FROM anggota");
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
    <title>Anggota</title>
    <link rel="stylesheet" href="CSS/anggota.css">
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
                    <li><a href="">Data Anggota</a></li>
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
            <form action="" method="post">
                <div class="search">
                    <label for="search">Cari Anggota</label>
                    <input type="text" name="search" id="search">
                    <button type="submit">Cari</button>
                </div>
            </form>
            <table border="0" cellpadding="0">
                <tr>
                    <th id="id">Id</th>
                    <th>Nik</th>
                    <th id="nama">Nama_Anggota</th>
                    <th>Aksi</th>
                    <th>Detail</th>
                </tr>
                <?php foreach ($anggota as $key) : ?>
                    <tr>
                        <td><?= $key["id_anggota"] ?></td>
                        <td><?= $key["nik"] ?></td>
                        <td><?= $key["username"] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $key["id_anggota"] ?>" id="edit">EDIT</a> |
                            <a href="delete.php?id=<?= $key["id_anggota"] ?>" id="delete">DELETE</a>
                        </td>
                        <td>
                            <a href="simpanan.php?id=<?= $key["id_anggota"] ?>" id="simpanan">SIMPANAN</a> |
                            <a href="detailpinjaman.php?id=<?= $key["id_anggota"] ?>" id="peminjaman">PEMINJAMAN</a> |
                            <a href="laporan.php?id=<?= $key["id_anggota"] ?>" id="laporan">LAPORAN</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </div>
</body>

</html>