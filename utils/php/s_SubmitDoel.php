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
    $update = "UPDATE leerdoel SET leerdoel='$doel' WHERE student = $Username";
    $fetch = mysqli_query($server, "SELECT leerdoel FROM leerdoel WHERE student = $Username");
    $id = mysqli_num_rows($fetch);
    if($id>0) {
      mysqli_query($server, $update);
    } else {
      mysqli_query($server, $insert);
    }
    header('Location: ../../app/');
