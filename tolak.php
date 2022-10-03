<?php
 
require 'konfig.php';

global $koneksi;

$id = $_GET["id"];

mysqli_query($koneksi,"UPDATE ajukan_pinjaman SET status='Ditolak' WHERE id_anggota='$id'");
echo "
        <script>
            alert('status telah diupdate');
            document.location.href = 'peminjaman.php?data=tolak';
        </script>
    ";

?>