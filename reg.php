<?php
    include "connection.php";

    $Username = $_POST['Username'];
    $Pass = $_POST['Pass'];
    $Role = $_POST['role'];
    
    $reg = "INSERT INTO users (username, password, perm, demo) VALUES ('$Username', '$Pass', '$Role', '1');";
    mysqli_query($conn, $reg);
    header('Location: app/');
?>