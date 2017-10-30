<?php
session_start();
session_destroy();
setcookie("idUser", "", time() - 1);
header("location:index.php");exit;
?>
