<?php
session_start();
include 'connection.php';

$username = $_POST['nusername'];
$password = $_POST['nww'];
$user =  $_GET['id'];


$upd = "UPDATE users SET `username` = '$username', `password` = '$password' WHERE id = $user";
mysqli_query($conn, $upd);
header('Location: app/');
?>