<?php 

session_start();
$_SESSION['id']=""; 
$_SESSION['name']=""; 
session_destroy();
header('Location: index.php');
?>