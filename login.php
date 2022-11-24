<?php
 
include("konfig.php");

if (isset($_POST["submit"])) {
    if (isset($_POST["username"])) {
        $inputUser = $_POST["username"];
    }else {
        $inputUser = $_POST["userid"];
    }
    $password = $_POST["password"];
    // var_dump($inputUser);
    login($inputUser,$password);
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
                <div class="input-login">
                    <label for="login-as">Login sebagai</label>
                    <select name="login-as" id="login-as">
                        <option value="Admin">Admin</option>
                        <option value="Karyawan" selected>Karyawan</option>
                    </select>
                </div>
                <div class="inputbox">
                    <label for="input-user" id="label-inputUser">Username</label>
                    <input type="text" placeholder="masukan username" required name="username" id="input-user">
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
    <script src="JS/login.js"></script>
</body>

</html>