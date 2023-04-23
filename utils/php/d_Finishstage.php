<?php
    session_start();
    include "connection.php";
    global $server;

    if($_GET['userid']) {
        $user = $_GET['userid'];
        $query = mysqli_query($server, "UPDATE `users` SET `done` = '2' WHERE `users`.`id` = $user");
        header('Location: ../../app/');
    }