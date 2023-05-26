<?php
    session_start();
    include 'connection.php';
    global $server;
    $student = $_SESSION['B3SelUser'];
    $begeleider = $_SESSION['username'];
    $b1 = $_POST['aanwezigheid'];
    $b2 = $_POST['luister'];
    $b3 = $_POST['hulpraad'];
    $b4 = $_POST['verantwoordelijk'];
    $b5 = $_POST['plezier'];
    $b6 = $_POST['klantgericht'];
    $b7 = $_POST['werktempo'];
    $b8 = $_POST['uitvoer'];
    $b9 = $_POST['vaardigheid'];
    $b10 = $_POST['initatief'];

   mysqli_query($server, "INSERT INTO beoordeling (student, begeleider, aanwezigheid, luister, hulpraad, verantwoordelijk, plezier, klantgericht, werktempo, uitvoer, vaardigheid, initatief) VALUES ('$student', '$begeleider', '$b1', '$b2', '$b3', '$b4', '$b5', '$b6', '$b7', '$b8', '$b9', '$b10')");
   unset($_SESSION['B3SelUser']);
   header('Location:../../app/');