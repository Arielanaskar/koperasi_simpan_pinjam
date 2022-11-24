<?php

include("konfig.php");

global $koneksi;

if ($_SESSION["admin"]) {
    $id = $_SESSION["admin"];
    $users = mysqli_query($koneksi, "SELECT * FROM adminn WHERE user_id='$id'");
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
                <h2>Anggota</h2>
            </div>
            <div class="tabel-anggota">
                <div class="header-tabel-anggota">
                     <form action="" method="post">
                        <div class="search">
                            <input type="text" name="search" id="search" placeholder="Cari anggota">
                            <!-- <button type="submit">Cari</button> -->
                        </div>
                    </form>
                </div>
                <?php $i=1; ?>
                <div class="data-tabel">

                    <table border="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th id="id">No</th>
                                <th>Nik</th>
                                <th id="nama">Nama_Anggota</th>
                                <th>Aksi</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($anggota as $key) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $key["nik"] ?></td>
                                <td><?= $key["username"] ?></td>
                                <td id="aksi">
                                    <a href="edit.php?id=<?= $key["id_anggota"] ?>" id="edit">
                                        <img src="img/pencil.png" alt="" srcset="">
                                        EDIT
                                    </a>
                                    <a href="delete.php?id=<?= $key["id_anggota"] ?>" id="delete" onclick="return confirm('anda yakin ingin menghapus?')">
                                        <img src="img/trash.png" alt="" srcset="">
                                        DELETE
                                    </a>
                                </td>
                                <td>
                                    <a href="simpanan.php?id=<?= $key["id_anggota"] ?>" id="simpanan">SIMPANAN</a> |
                                    <a href="detailpinjaman.php?id=<?= $key["id_anggota"] ?>" id="peminjaman">PEMINJAMAN</a> |
                                    <a href="laporan.php?id=<?= $key["id_anggota"] ?>" id="laporan">LAPORAN</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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