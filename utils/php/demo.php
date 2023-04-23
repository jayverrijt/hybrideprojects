<?php
    session_start();
    include "connection.php";
    global $server;

    $demo = $_SESSION['demo'];
    $id = $_SESSION['id'];

    $update = "UPDATE `users` SET `demo` = '2' WHERE id = $id";
    var_dump(mysqli_query($server, $update));
    $_SESSION['demo'] = '2';
    header('Location:../../app/');




?>