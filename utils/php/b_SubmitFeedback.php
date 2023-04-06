<?php
    session_start();
    include 'connection.php';
    $feedback = $_POST['feedback'];
    $Student = $_SESSION['appB2user'];
    global $server;
    mysqli_query($server, "UPDATE `leerdoel` SET `feedback`='$feedback' WHERE student = '$Student';");

    unset($_SESSION['appB2user']);
    header('Location: ../../app/');

