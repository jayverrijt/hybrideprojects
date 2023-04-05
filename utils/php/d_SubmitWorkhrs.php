<?php
    session_start();
    include 'connection.php';
    global $server;
    $Student = $_SESSION['dapp0student'];
    $info ="SELECT `company` FROM `users` WHERE username = '$Student'";
    $query = mysqli_query($server, $info);
    $row = mysqli_fetch_array($query);
    $Company = $row['company'];
    $Docent = $_SESSION['username'];
    $Week = date('W');
    $MonStart = $_POST['valMonStart'];
    $MonEnd = $_POST['valMonEnd'];
    $ThuStart = $_POST['valThuStart'];
    $ThuEnd = $_POST['valThuEnd'];
    $WedStart = $_POST['valWedStart'];
    $WedEnd = $_POST['valWedEnd'];
    $ThrStart = $_POST['valThrStart'];
    $ThrEnd= $_POST['valThrEnd'];
    $FriStart = $_POST['valFriStart'];
    $FriEnd = $_POST['valFriEnd'];

   // echo "Tijden ". $MonStart. " ". $MonEnd . " ". $ThuStart. " ". $ThuEnd. " ". $WedStart. " ". $WedEnd. " ". $ThrStart. " ". "$ThrEnd". " ". $FriStart. " ". $FriEnd. ":";
   // echo "Week:". $Week. " Company:". $Company. " Student: ". $Student. " Docent: ". $Docent. " ";




   $insert = "INSERT INTO werktijden (week, student, company, docent, valMonStart, valThuStart, valWedStart, valThrStart, valFriStart, valMonEnd, valThuEnd, valWedEnd, valThrEnd, valFriEnd) VALUES ('$Week', '$Student', '$Company', '$Docent', '$MonStart', '$ThuStart', '$WedStart', '$ThrStart', '$FriStart', '$MonEnd', '$ThuEnd', '$WedEnd', '$ThrEnd', '$FriEnd')";
   $run = mysqli_query($server, $insert);

   unset($_SESSION['dapp0student']);
   header('Location: ../../app/');


