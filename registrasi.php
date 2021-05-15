<?php

session_start();

if( isset($_SESSION["loginpage"]) ) {
    header("Location: index.php");
    exit;
}
require 'bassic.php';

if( isset($_POST["register"]) ) {

    if( register($_POST) > 0 ) {
        echo "<script>
                alert('Username baru berhasil ditambahkan');
              </script>";
    } else {
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi</h1>
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
                <label for="passwordnya">konfirmasi password: </label>
                <input type="password" name="passwordnya" id="passwordnya">
            </li>
            <li>
            <button type="submit" name="register">Registrasi</button>
            </li>
        </ul>
    </form>

    <h3>Sudah Memiliki Akun? Klik link berikut <a href="loginpage.php">Login</a></h3>
</body>
</html>