<?php

session_start();
require 'bassic.php';

if( isset($_COOKIE["ya"]) && isset($_COOKIE["yaya"]) ) {
    $ya = $_COOKIE["ya"];
    $yaya = $_COOKIE["yaya"];

    $quit = mysqli_query($db, "SELECT username FROM user WHERE id = $ya");
    $akun = mysqli_fetch_assoc($quit);

    if( $yaya === hash("ana111", $akun["username"]) ) {
        $_SESSION["loginpage"] = true;
    }
}

if (isset($_SESSION["loginpage"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["loginpage"])) {

    $username = $_POST["username"];
    $pass = $_POST["password"];

    $cek = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($cek) === 1) {

        $akun = mysqli_fetch_assoc($cek);

        if (password_verify($pass, $akun["password"])) {

            $_SESSION["login"] = true;

            if( isset($_POST["remember"]) ) {
                setcookie("ya", $akun["id"], time() + 65);
                setcookie("yaya", hash("ana111", $akun["username"]), time() + 65);
            }

            header("Location: index.php");
            exit;
        }
    }
    $prob = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginpage</title>
</head>
<body>
    <h1>Loginpage</h1>

    <?php if (isset($prob)) : ?>
        <p style="color:black; font-style:bold;">username/password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username: </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password: </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

    <br><br>
    <h3>Belum Memiliki Akun? Klik link berikut <a href="registrasi.php">Registrasi</a></h3>
</body>

</html>