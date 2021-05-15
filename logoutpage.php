<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie("ya", "", time() - 3600);
setcookie("yaya", "", time() - 3600);

header("Location: loginpage.php");
exit;

?>