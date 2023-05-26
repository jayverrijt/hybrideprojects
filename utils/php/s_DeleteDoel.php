<?php
    session_start();
    include 'connection.php';
    global $server;
    $stud = $_SESSION['username'];
    mysqli_query($server, "DELETE FROM leerdoel WHERE student = $stud");
    header('Location: ../../app/');
?>