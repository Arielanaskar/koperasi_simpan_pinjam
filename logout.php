<?php
 
session_start();
session_unset();
session_destroy();
$_SESSION["anggota"] = [];
header("Location: index.php");
 
?>