<?php

include 'connection.php';

$company = $_GET['companyid'];
$user = $_GET['userid'];


$upd = "UPDATE users SET `company` = '$company' WHERE id = $user";
mysqli_query($conn, $upd);
header('Location: app/');
?>