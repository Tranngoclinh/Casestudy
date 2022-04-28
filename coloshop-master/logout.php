<?php 
unset($_SESSION['email']);
header('location: index.php');
session_destroy();
?>