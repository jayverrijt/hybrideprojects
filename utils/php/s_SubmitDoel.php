<?php
    session_start();
    include "connection.php";
    global $server;

    $doel = $_POST['leerdoel'];
    $Username = $_SESSION['username'];
    $id = $_SESSION['id'];

    $insert  = "INSERT into leerdoel (username, doel) VALUE ('$Username','$doel')";
    mysqli_query($server, $insert);
    header('Location: ../../app/');
?>