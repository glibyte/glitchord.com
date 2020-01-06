<?php
session_start();
//session_destroy();
unset($_SESSION['usuario']);
unset($_SESSION['email']);
header("location:../index.php");
?>