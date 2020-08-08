<?php 
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['nama']);
unset($_SESSION['level']);
unset($_SESSION['saldo']);
unset($_SESSION['email']);
header("location: index.php");
?>