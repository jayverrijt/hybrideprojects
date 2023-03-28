<?php

include 'connection.php';
global $server;

$company = $_GET['companyid'];
$user = $_GET['userid'];


$upd = "UPDATE users SET `company` = '$company' WHERE id = $user";
mysqli_query($server, $upd);
header('Location: ../../app/');