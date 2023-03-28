<?php
    include "connection.php";
    global $server;

    $Username = $_POST['Username'];
    $Pass = $_POST['Pass'];
    $Role = $_POST['role'];
    
    $reg = "INSERT INTO users (username, password, perm, demo) VALUES ('$Username', '$Pass', '$Role', '1');";
    mysqli_query($server, $reg);
    header('Location: ../../app/');