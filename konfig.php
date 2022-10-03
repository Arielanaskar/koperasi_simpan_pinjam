<?php

$koneksi = mysqli_connect("localhost", "root", "", "koperasi_simpan_pinjam");
session_start();

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function daftar($post)
{
    global $koneksi;

    $nama_lengkap = $post["nama_lengkap"];
    $status_jabatan = $post["status_jabatan"];
    $alamat = $post["alamat"];
    $no_telp = $post["no_telp"];
    $password = $post["password"];
    $konfirmasi = $post["konfirmasi"];
    $no_rekening = $post["no_rekening"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $nik = $post["nik"];
    $ttl = $post["ttl"];

    if ($password != $konfirmasi) {
        echo "
            <script>
                alert('kata sandi dengan konfirmasi tidak sesuai!');
                document.location.href = 'register.php';
            </script>
        ";
        return false;
    } else {
        $encrypt = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO anggota VALUES('','$nama_lengkap','$alamat','$ttl','$encrypt','$jenis_kelamin','$status_jabatan','$no_telp','$no_rekening','$nik')");
        echo "
            <script>
                alert('Registrasi Berhasil');
                document.location.href = 'login.php';
            </script>
        ";
    }
}

function login($ussername, $password)
{
    global $koneksi;

    // cek ussername 
    $check_username1 = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$ussername'");
    $check_username2 = mysqli_query($koneksi, "SELECT * FROM adminn WHERE user_id='$ussername'");

    if (mysqli_num_rows($check_username1) == 1) {
        $row = mysqli_fetch_assoc($check_username1);
        $pw = $row["password"];
        if (password_verify($password, $pw)) {
            echo "
                <script>
                    alert('Berhasil Login');
                    document.location.href = 'index.php';
                </script>
            ";
            $_SESSION["anggota"] = $row["id_anggota"];
        } else {
            echo "
                <script>
                    alert('ussername atau sandi anda salah!');
                    document.location.href = 'login.php';
                </script>
            ";
        }
    }elseif (mysqli_num_rows($check_username2) == 1) {
        $row = mysqli_fetch_assoc($check_username2);
        $pw = $row["password"];
        if ($password === $pw) {
            echo "
                <script>
                    alert('Berhasil Login');
                    document.location.href = 'index.php';
                </script>
            ";
            $_SESSION["admin"] = $row["id"];
        } else {
            echo "
                <script>
                    alert('ussername atau sandi anda salah!');
                    document.location.href = 'login.php';
                </script>
            ";
        }
    }else{
        echo "
                <script>
                    alert('ussername dan password tidak terdaftar dimanapun!');
                    document.location.href = 'login.php';
                </script>
            ";
    }
}

function Pengajuan($post,$id_anggota) {
    global $koneksi;
    $nama_lengkap = $post["namaLengkap"];
    $lama_angsuran = $post["lama-angsuran"];
    $tanggal = $post["tanggal"];
    $nominal = $post["nominal"];
    $keterangan = $post["keterangan"];

    $result = mysqli_query($koneksi,"SELECT * FROM ajukan_pinjaman WHERE id_anggota='$id_anggota'");
    if (mysqli_num_rows($result) == 1) {
        echo "
                <script>
                    alert('Anda sudah melakukan peminjaman!');
                </script>
            ";
    }else {
        mysqli_query($koneksi,"INSERT INTO ajukan_pinjaman VALUES('','$id_anggota','$nama_lengkap','$tanggal','$nominal','$lama_angsuran','$keterangan','menunggu konfirmasi')");
        if (mysqli_affected_rows($koneksi) == 1) {
            echo "
                    <script>
                        alert('Pengajuan Berhasil!');
                    </script>
                ";
        }else {
            echo "
                    <script>
                        alert('Pengajuan Gagal!');
                    </script>
                ";
        }
    }
    
}
 
?>