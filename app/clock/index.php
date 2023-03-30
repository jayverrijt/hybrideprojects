<?php
    include '../../utils/php/connection.php';
    session_start();
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];


    $indate = date('j-m-o');
    $intime = date('H:i');

    $_SESSION['indate'] = $indate;
    $_SESSION['intime'] = $intime;


    if(empty($_SESSION['username'])) {
        header('Location:../../');
    }
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <link rel="stylesheet" href="../../global.css">
        <link rel="shortcut icon" href="../../utils/favicon.png">
        <link rel="stylesheet" href="clock.css">
        <title>Ingeklokt als <?=$username?></title>
    </head>
    <body>
        <div class="ioClockFrame">
            <div class="ioClockWarnMSG">
                <div class="centerTag"><h1 class="ioClockFrameTextStyle">WAARSCHUWING: SLUIT DEZE TAB NIET U BENT INGEKLOKT</h1></div>
            </div>
            <div class="ioClockApplicationFrame">
                <div class="ioClockAppTextFrame">
                    <div class="centerTag ioClockFrameTextStyle ioWarnText"><p>U staat op dit moment ingeklokt <br>Als u deze tab sluit dan wordt deze stagedag als niet geldig verklaard<br><br>
                            Om dit te voorkomen doe het volgende:
                        <br>
                        </p>
                            <li class="ioLiStyle">Hou uw computer aan de oplader</li>
                            <li class="ioLiStyle">Klok niet in op een telefoon</li>
                            <li class="ioLiStyle">Sluit de browsertab niet</li>
                        </div>
                </div>
                <div class="ioClockAppOutFrame">
                    <form method="post"  role="form" action="../../utils/php/s_SubmitTime.php">
                    <div class="ioClockOutBtn">
                        <input type="submit" name="clockout" class="ioClockFrameTextStyle ioClockBtnPe" value="Uitklokken"></input>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>