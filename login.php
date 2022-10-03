<?php
 
include("konfig.php");

if (isset($_POST["submit"])) {
    $ussername = $_POST["username"];
    $password = $_POST["password"];
    login($ussername,$password);
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="title">
                <div class="logo">

                </div>
                <h4>PT. SEJAHTERA JAYA</h4>
            </div>
            <div class="wrapper">
                <div class="inputbox">
                    <label for="">Username</label>
                    <input type="text" placeholder="masukan username" required maxlength='32' name="username">
                </div>
                <div class="inputbox">
                    <label for="">Password</label>
                    <input type="password" placeholder="masukan password" required maxlength='16' name="password">
                </div>
                <div class="inputbox">
                    <button type="sudmit" name="submit">MASUK</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>