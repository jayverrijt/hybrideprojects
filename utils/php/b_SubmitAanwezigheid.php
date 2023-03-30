<?php
 session_start();
 include 'connection.php';
 global $server;
 // Time date
$VALMON = $_POST['bmonday'];
$VALTHU = $_POST['bthuesday'];
$VALWED = $_POST['bwednesday'];
$VALTHR = $_POST['bdonday'];
$VALFRI = $_POST['bfriday'];
$WEEK = date('W');
$YEAR = date('Y');
$DATEMA = date("d-m", strtotime("-4 day"));
$DATEDI = date("d-m", strtotime("-3 day"));
$DATEWO = date("d-m", strtotime("-2 day"));
$DATEDO = date("d-m", strtotime("-1 day"));
$DATEVR = date("d-m", strtotime("today"));
$begeleider = $_SESSION['username'];
$student = $_POST['bselectedstudent'];
$selcompany = mysqli_query($server, "SELECT `company` FROM `users` WHERE username = '$student'");
global $company;

$eid = mysqli_num_rows($selcompany);
if($eid>0) {
    while($result = mysqli_fetch_assoc($selcompany)) {
        $company = $result['company'];
    }
}

$insert = "INSERT INTO aanwezigheid (datema, datedi, datewo, datedo, datevr, gradema, gradedi, gradewo, gradedo, gradevr, week, user, company, begeleider, jaar) VALUES ('$DATEMA', '$DATEDI', '$DATEWO', '$DATEDO', '$DATEVR', '$VALMON', '$VALTHU', '$VALWED', '$VALTHR', '$VALFRI', '$WEEK', '$student', '$company', '$begeleider', '$YEAR');";
mysqli_query($server, $insert);
header('Location: ../../app/');