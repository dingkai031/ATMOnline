<?php 
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['nama']);
unset($_SESSION['saldo']);
unset($_SESSION['email']);
unset($_SESSION['rek']);
unset($_SESSION['bankcode']);
unset($_SESSION['link']);
header("location: index.php");
?>