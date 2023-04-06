<?php
    session_start();
    include "connection.php";
    global $server;
    $doel = $_POST['leerdoel'];
    $Username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $cmd = "SELECT `company` FROM `users` WHERE id = '$id'";
    $query = mysqli_query($server, $cmd);
    $row = mysqli_fetch_array($query);
    $company = $row['company'];





    $insert  = "INSERT into leerdoel (student, leerdoel, company) VALUE ('$Username','$doel', '$company')";
    mysqli_query($server, $insert);
    header('Location: ../../app/');