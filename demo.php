<?php
    session_start();
    include "connection.php";

    $demo = $_SESSION['demo'];
    $id = $_SESSION['id'];

    $update = "UPDATE `users` SET `demo` = '2' WHERE `users`.`id` = $id";
    mysqli_query($conn, $update);
    $_SESSION['demo'] = '2';
    header("Location:app/");




?>