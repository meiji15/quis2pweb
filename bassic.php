<?php
$db = mysqli_connect("localhost", "root", "", "uname");

function query($sql){
  global $db;
  $quit = mysqli_query($db, $sql);

  if (!$quit){
    echo mysqli_error ($db);
  }
  $barisan = [];
  while ($baris = mysqli_fetch_assoc($quit)) {
    $barisan[] = $baris;
  }
  return $barisan;
}

function register($database) {
    global $db;
    
    $username = strtolower(stripslashes($database["username"]));
    $pass = mysqli_real_escape_string($db, $database["password"]);
    $pass2 = mysqli_real_escape_string($db, $database["passwordnya"]);

    $cek = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($cek) ) {
        echo "<script>
                alert('username telah terdaftar, silahkan gunakan username lain');
              </script>";
        return false;
        
    }

    if( $pass !== $pass2 ) {
        echo "<script>
                alert('konfirmasi password tidak sama!');
              </script>";
        return false;
    }
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO user (username, password)
                    VALUES
                ('$username', '$pass')");
    
    return mysqli_affected_rows($db);
}