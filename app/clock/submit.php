<?php
    session_start();
    include "../../connection.php";

    $intime = $_SESSION['intime'];
    $indate = $_SESSION['indate'];
    $outtime = date('H:i');
    $id = $_SESSION['id'];

    $insert = "INSERT INTO time (id, date, start, end) VALUES ('$id', '$indate', '$intime', '$outtime')";
    mysqli_query($conn, $insert);
    header('Location: ../');
?>