<?php
session_start();
$perm = $_SESSION["perm"];
$demo = $_SESSION["demo"];
$user = $_SESSION["username"];
$id = $_SESSION["id"];
if (empty($_SESSION['username'])) {
    header('Location:../');
}
include "../utils/php/connection.php";
global $server;

if($perm != 2) {
    $company = "Nvt";
} else {
    $getComp = mysqli_query($server, "SELECT * FROM `users` WHERE username = $user");
    $comp = mysqli_num_rows($getComp);
    if($comp>0) {
        while($result=mysqli_fetch_assoc($getComp)) {
            $company = $result['company'];
            $_SESSION['company'] = $company;
        }
    }
}


$sel = mysqli_query($server, " SELECT * FROM `users`");
$sela = mysqli_query($server, " SELECT * FROM `users`");
$selb = mysqli_query($server, " SELECT * FROM `users`");
$seld = mysqli_query($server, " SELECT * FROM `users`");
$sele = mysqli_query($server, " SELECT * FROM `users` WHERE company = '$company' AND perm = '1'");
$selt = mysqli_query($server, " SELECT * FROM `users`");
$selo = mysqli_query($server, " SELECT * FROM `users`");
$selp = mysqli_query($server, " SELECT * FROM `leerdoel`");
$selx = mysqli_query($server, " SELECT * FROM `users` WHERE company = '$company' AND perm = '1' ");
$selxx = mysqli_query($server, "SELECT * FROM users WHERE done = '2'");
$selxxx = mysqli_query($server, "SELECT * FROM users WHERE done = '2'");
$selz = mysqli_query($server, " SELECT * FROM `users`");
$selcompany = mysqli_query($server, " SELECT * FROM `company`");
$selt = mysqli_query($server, " SELECT * FROM `users`");
$row = mysqli_fetch_array($sel);
$WerktijdWeek = date('W');
global $WerktijdWeek;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $_SESSION['username'] ?> · Hybride Projects</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../global.css">
    <link rel="shortcut icon" href="../utils/favicon.png">
</head>
<body onload="ioDemoInit(); toggleUserAdd(); toggleCompanyAdd(); toggleUserDel(); toggleUserEdit(); B3StudSel();">
    <div id="appUIbody" class="appUIBody div_Away blur_Off">
        <div id="appUIuser" class="appUIUser">
            <div class="btnHolderAccount">
                <button class="appUIBtnStyle"
                    onclick="window.location.href='../utils/php/logout.php'">Uitloggen</button>
            </div>
        </div>
        <div id="appLogoBranding">
            <div class="centerTag"><h1 class="mainHeader">Hybride Projects</h1></div>
        </div>
        <?php
            switch($perm) {
                case 1:
                    echo "
                    <div id='appUIMenu'>
                        <div id='aUIm1' class='aUIm'>
                            <a onclick='toAppS0()' id='appLS0' class='active'>In/Uit Klokken</a>
                            <a onclick='toAppS1()' id='appLS1'>Leerdoel</a>
                            <a onclick='toAppS2()' id='appLS2'>Uren</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div id='appS0' class='appS0 div_Show'>
                            <div class='ioClockFrame centerClock'>
                                <form method='post' action='clock/'>
                                    <input type='submit' value='Inklokken' class='inKlokbuttn'> 
                                </form>
                            </div> 
                        </div>
                        <div id='appS1' class='appS1 div_Away'>
                            <form method='post' action='../utils/php/s_SubmitDoel.php'>
                                <label for='leerdoel' class='studFont'>Leerdoel</label><br>";
                                  $s1Fetch = mysqli_query($server, "SELECT leerdoel FROM leerdoel WHERE student = $user");
                                  $wid = mysqli_num_rows($s1Fetch);
                                  if($wid>0) {
                                    while($result=mysqli_fetch_assoc($s1Fetch)) {
                                   echo "<textarea id='leerdoel' name='leerdoel' class='studLeerdoel' placeholder='".$result['leerdoel']."'></textarea>";
                                    }
                                  } else {
                                   echo "<textarea id='leerdoel' name='leerdoel' class='studLeerdoel' placeholder='Voer hier je leerdoel in' ></textarea>";
                                  }
                                echo "<input type='submit' value='Submit' class='newBtnStyle5'name='doelsubmit'>
                            </form> 
                               <div class='DelLeerdoelBtn' name='test'>
                                  <form method='post' action='../utils/php/s_DeleteDoel.php'>
                                    <input type='image' src='icons/deleteUser.png' alt='Delete Leerdoel' class='DelLeerdoelStyleBtn'>
                                  </form>
                               </div>
                        </div>
                        <div id='appS2' class='appS2 div_Away'>
                          <h1 class=studFont>Gewerkte Uren</h1>";
                            $seltest = mysqli_query($server, "SELECT `date`, `start`, `end` FROM `time` WHERE id = '$id'");
                            $tid = mysqli_num_rows($seltest);
                            if($tid>0) {
                                while($result=mysqli_fetch_assoc($seltest)) {
                                    echo "<p style='color: var(--fg)'>
                                                ".$result['date']."
                                                -
                                                ".$result['start']."
                                                - 
                                                ".$result['end']."
                                                <br>
                                            </p>
                                        ";
                                }
                            }
                    echo "
                        </div>
                    </div>
                    ";
                    break;
                case 2:
                    echo "
                    <div id='appUIMenu'>
                        <div id='aUIm2' class='aUIm'>
                            <a onclick='toAppB0()' id='appLB0' class='active'>Werktijden</a>
                            <a onclick='toAppB1()' id='appLB1'>Aanwezigheid</a>
                            <a onclick='toAppB2()' id='appLB2'>Feedback op Student</a>
                            <a onclick='toAppB3()' id='appLB3'>Eind Beoordelingen</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div id='appB0' class='appB0 div_Show'>
                            <div class='div_Show' id='appB0studentsel'>
                                <form method='post' action='./' class='appFormFix'>
                                ";
                                    $sely = mysqli_query($server, " SELECT * FROM `werktijden` WHERE company = $company");
                                    $tid = mysqli_num_rows($sely);
                                    if($tid>0) {
                                        while($result=mysqli_fetch_assoc($sely)) {
                                            echo "<p class='b0Font'>Week ".$result['week']."</p>
                                            <input name='bselapp0' type='submit' class='newBtnStyle' value='".$result['student']."'><br>";
                                        }
                                    }
                        echo "
                                </form> 
                            </div>
                            <div class='div_Away' id='app0werktijd'>
                                <div class='ioD0Workhours'>
                                     <div class='ioWeekControl'>
                                        <p class='ioWeekNumber centerTag'>"; echo "Week ".$WerktijdWeek."</p>
                                     </div>
                                     <div class='ioWorkHours'>
                                        <div class='ioWorkHours-Days'>
                                            <div id='ioWorkDayMon'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Maandag</p>
                                            </div>
                                             <div id='ioWorkDayThu'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Dinsdag</p>
                                            </div>
                                             <div id='ioWorkDayWed'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Woensdag</p>
                                            </div>
                                             <div id='ioWorkDayThr'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Donderdag</p>
                                            </div>
                                             <div id='ioWorkDayFri'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Vrijdag</p>
                                            </div>
                                        </div>
                                        <div class='ioWorkHours-Input'>
                                            ";
                                              if(isset($_POST['bselapp0'])) {
                                                 $_SESSION['bselapp0'] = $_POST['bselapp0'];
                                             }

                                            $BnulStudent = $_SESSION['bselapp0'];
                                            $selyy = mysqli_query($server, " SELECT * FROM `werktijden` WHERE student = '$BnulStudent'");
                                            $tid = mysqli_num_rows($selyy);
                                            if($tid>0) {
                                                while($result=mysqli_fetch_assoc($selyy)) {
                                                    echo "
                                                           <div id='ioWorkDayMonInput'>
                                                               <p class='centerTag appB0Fix'>".$result['valMonStart']."</p>
                                                               <p class='centerTag appB0Fix'>".$result['valMonEnd']."</p>
                                                           </div>
                                                           <div id=ioWorkDayThuInput>
                                                               <p class='centerTag appB0Fix'>".$result['valThuStart']."</p>
                                                               <p class='centerTag appB0Fix'>".$result['valThuEnd']."</p>
                                                           </div>
                                                           <div id=ioWorkDayWedInput>
                                                               <p class='centerTag appB0Fix'>".$result['valWedStart']."</p>
                                                               <p class='centerTag appB0Fix'>".$result['valWedEnd']."</p>
                                                           </div>
                                                           <div id=ioWorkDayThrInput>
                                                               <p class='centerTag appB0Fix'>".$result['valThrStart']."</p>
                                                               <p class='centerTag appB0Fix'>".$result['valThrEnd']."</p>
                                                           </div>
                                                           <div id=ioWorkDayFriInput>
                                                               <p class='centerTag appB0Fix'>".$result['valFriStart']."</p>
                                                               <p class='centerTag appB0Fix'>".$result['valFriEnd']."</p>
                                                           </div>
                                                        ";
                                                }
                                            }
                                        echo "
                                        </div>
                                    </div>
                                </div>
 
                            ";
                            if(isset($_SESSION['bselapp0'])) {
                                echo "
                                <script>
                                    var one = document.getElementById('appB0studentsel'); 
                                    var two = document.getElementById('appB0werktijd'); 
                                    one.classList.remove('div_Show');
                                    one.classList.add('div_Away');
                                    two.classList.remove('div_Away');
                                    two.classList.add('div_Show');
                                </script>
                            ";
                            }
                            echo "    
                                <form method='post' class='B0BackBtn'>
                                    <input type='submit' name='B0BackBtn' class='B0BackBtnStyle' value='Terug'>
                                </form>
                                ";
                                if (isset($_POST['B0BackBtn'])) {
                                    unset($_SESSION['bselapp0']);
                                }
                                 echo "
                        </div>
                        </div>
                        <div id='appB1' class='appB1 div_Away'>
                            <form action='../utils/php/b_SubmitAanwezigheid.php' method='post'>
                                <p class='studFont'>Aanwezigheid:</p>
                                <div style='display: block; text-align: right; left:1%; position: absolute;'>
                                <label style='color: var(--fg)' for='bAA-MA-A'>Maandag</label>
                                <input type='radio' name='bmonday' value='Aanwezig' id='bAA-MA-A' required>
                                <input type='radio' name='bmonday' value='Afwezig' id='bAA-MA-B' required><br>
                                <label style='color: var(--fg)' for='bAA-DI-A'>Dinsdag</label>
                                <input type='radio' name='bthuesday' value='Aanwezig' id='bAA-DI-A' required>
                                <input type='radio' name='bthuesday' value='Afwezig' id='bAA-DI-B' required><br>
                                <label style='color: var(--fg)' for='bAA-WO-A'>Woensdag</label>
                                <input type='radio' name='bwednesday' value='Aanwezig' id='bAA-WO-A' required>
                                <input type='radio' name='bwednesday' value='Afwezig' id='bAA-WO-B' required><br>
                                <label style='color: var(--fg)' for='bAA-DO-A'>Donderdag</label>
                                <input type='radio' name='bdonday' value='Aanwezig' id='bAA-DO-A' required>
                                <input type='radio' name='bdonday' value='Afwezig' id='bAA-DO-B' required><br>
                                <label style='color: var(--fg)' for='bAA-VR-A'>Vrijdag</label>
                                <input type='radio' name='bfriday' value='Aanwezig' id='bAA-VR-A' required>
                                <input type='radio' name='bfriday' value='Afwezig' id='bAA-VR-B' required><br>
                                </div>
                                <br>
                                <div style='display:block; position: absolute; top: 25%'>
                                <p class='studFont'>Student:</p>
                                ";
                                $eid = mysqli_num_rows($selt);
                                $counter = 0;
                                if ($eid > 0) {
                                    while ($result = mysqli_fetch_assoc($sele)) {
                                        echo "
                                               <label for='bselectedstudent' style='color: var(--fg)'>".$result['username']."</label>
                                               <input type='radio' value='".$result['username']."' name='bselectedstudent' required><br>
                                               ";
                                    }
                                }
                            echo "
                                <br>
                                </div>
                                <input id='B1Submitbtn' type='submit' value='Submit' class='newBtnStyle B1Submitbtn' name='baanwezigheidsubmit'>
                            </form>
                        </div>
                        <div id='appB2' class='appB2 div_Away'>
                          <div class='div_Show' id='appB2UserSel'>
                            <form method='post' class='appFormFix'>
                            ";
                                $tid = mysqli_num_rows($selx);
                                if($tid>0) {
                                    while($result=mysqli_fetch_assoc($selx)) {
                                        echo "
                                              <input name='beditsel' class='newBtnStyle' type='submit' value='".$result['username']."'>
                                          ";
                                    }
                                }
                                echo "
                            </form>
                          </div>
                          <div class='div_Away' id='appB2Feedback'>
                            <form method='post' action='../utils/php/b_SubmitFeedback.php'>
                                <label for='feedback' class='studFont'>Feedback op Student</label><br>";
                                  $s1Fetch = mysqli_query($server, "SELECT feedback FROM leerdoel WHERE student = $user");
                                  $wid = mysqli_num_rows($s1Fetch);
                                  if($wid>0) {
                                    while($result=mysqli_fetch_assoc($s1Fetch)) {
                                   echo "<textarea id='feedback' name='feedback' class='studLeerdoel' placeholder='".$result['feedback']."'></textarea>";
                                    }
                                  } else {
                                   echo "<textarea id='feedback' name='feedback' class='studLeerdoel' placeholder='Voer hier je feedback in' ></textarea>";
                                  }
                                echo "<input type='submit' value='Submit' class='newBtnStyle5'name='doelsubmit'>
                            </form> 
                        </div>
                          ";
                            if(isset($_POST['beditsel'])) {
                                $_SESSION['appB2user'] = $_POST['beditsel'];
                            }

                            if(isset($_SESSION['appB2user'])) {
                                echo "
                                    <script>
                                        var one = document.getElementById('appB2UserSel');
                                        var two = document.getElementById('appB2Feedback');
                                        
                                        one.classList.remove('div_Show');
                                        one.classList.add('div_Away');
                                        two.classList.remove('div_Away');
                                        two.classList.add('div_Show');
                                    </script>
                                ";
                            }
                                echo "
                                <form method='post' class='B0BackBtn'>
                                    <input type='submit' name='B2BackBtn' class='B0BackBtnStyle' value='Terug'>
                                </form>
                                ";
                                if (isset($_POST['B2BackBtn'])) {
                                    unset($_SESSION['appB2user']);
                                }
                                 echo "
 
                        </div>
                        <div id='appB3' class='appB3 div_Away'>
                            <div id='B3SelScreen' class='div_Show'>
                                <div class='B3ReviewStudentBtn' onclick='B3StudSel()'>
                                  <img src='icons/profile.png' class='btnEndJudge'>
                                </div>
                                <div id='B3StudSel' class='B3ReviewStudSel div_Away'>
                                    <form method='post' class='appFormFix'>
                                         ";
                                         $result = mysqli_num_rows($selxx);
                                         if($result>0) {
                                             while($result=mysqli_fetch_assoc($selxx)) {
                                                 echo "
                                                     <div class='centerTag'><input type='submit' name='B3SelectedUser' class='newBtnStyle3' value=".$result['username']."></input></div>
                                                 ";
                                             }
                                         }
                                echo "
                                    </form>
                                </div>
                            </div>
                            ";
                                 if(isset($_POST['B3SelectedUser'])) {
                                     $_SESSION['B3SelUser'] = $_POST['B3SelectedUser'];
                                 }
                    echo "
                            <div id='B3ReviewField' class='B3ReviewField div_Away'>
                            "; echo "
                                            <div class='B3ReviewForm'>
                                                <form method='post' action='../utils/php/b_SubmitBeoordeling.php'>
                                                    <label style='color: var(--fg)' for='aanwezigheid'>Aanwezigheid</label>
                                                    <input id='B3-1-O' type='radio' name='aanwezigheid' value='O' required>
                                                    <input id='B3-1-V' type='radio' name='aanwezigheid' value='V' required>
                                                    <input id='B3-1-G' type='radio' name='aanwezigheid' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='luister'>Luisterd goed / Volgt aanwijzigen</label>
                                                    <input id='B3-2-O' type='radio' name='luister' value='O' required>
                                                    <input id='B3-2-V' type='radio' name='luister' value='V' required>
                                                    <input id='B3-2-G' type='radio' name='luister' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='hulpraad'>Vraagt tijdig om hulp/raad</label>
                                                    <input id='B3-3-O' type='radio' name='hulpraad' value='O' required>
                                                    <input id='B3-3-V' type='radio' name='hulpraad' value='V' required>
                                                    <input id='B3-3-G' type='radio' name='hulpraad' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='verantwoordelijk'>Verantwoordelijkheidsgevoel</label>
                                                    <input id='B3-4-O' type='radio' name='verantwoordelijk' value='O' required>
                                                    <input id='B3-4-V' type='radio' name='verantwoordelijk' value='V' required>
                                                    <input id='B3-4-G' type='radio' name='verantwoordelijk' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='plezier'>Werkt met plezier</label>
                                                    <input id='B3-5-O'  type='radio' name='plezier' value='O' required>
                                                    <input id='B3-5-V'  type='radio' name='plezier' value='V' required>
                                                    <input id='B3-5-G'  type='radio' name='plezier' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='klantgericht'>Klantgericht en vriendelijk</label>
                                                    <input id='B3-6-O'  type='radio' name='klantgericht' value='O' required>
                                                    <input id='B3-6-V'  type='radio' name='klantgericht' value='V' required>
                                                    <input id='B3-6-G'  type='radio' name='klantgericht' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='werktempo'>Werktempo</label>
                                                    <input id='B3-7-O'  type='radio' name='werktempo' value='O' required>
                                                    <input id='B3-7-V'  type='radio' name='werktempo' value='V' required>
                                                    <input id='B3-7-G'  type='radio' name='werktempo' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='uitvoer'>Voert opgedragen werk uit</label>
                                                    <input id='B3-8-O'  type='radio' name='uitvoer' value='O' required>
                                                    <input id='B3-8-V'  type='radio' name='uitvoer' value='V' required>
                                                    <input id='B3-8-G'  type='radio' name='uitvoer' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='vaardigheid'>Vaardigheid met IT Software / tools</label>
                                                    <input id='B3-9-O'  type='radio' name='vaardigheid' value='O' required>
                                                    <input id='B3-9-V'  type='radio' name='vaardigheid' value='V' required>
                                                    <input id='B3-9-G'  type='radio' name='vaardigheid' value='G' required>
                                                    <br>
                                                    <label style='color: var(--fg)' for='initatief'>Toont initatief</label>
                                                    <input id='B3-0-O'  type='radio' name='initatief' value='O' required>
                                                    <input id='B3-0-V'  type='radio' name='initatief' value='V' required>
                                                    <input id='B3-0-G'  type='radio' name='initatief' value='G' required>
                                                    <br>
                                                    <input type='submit' class='newBtnStyle5' value='Submit'>
                                                </form>
                                            </div>
                                         ";
                            echo "
                            </div>
                            ";
                                if(isset($_SESSION['B3SelUser'])) {
                                    echo "
                                    <script>
                                        var one = document.getElementById('B3SelScreen');
                                        var two = document.getElementById('B3ReviewField');
                                        
                                        one.classList.remove('div_Show');
                                        one.classList.add('div_Away');
                                        two.classList.remove('div_Away');
                                        two.classList.add('div_Show');
                                    </script>
                                    ";
                                }
                            echo "
                        </div>
                    </div>
                    ";
                    break;
                case 3:
                    echo "
                    <div id='appUIMenu'>
                        <div id='aUIm3' class='aUIm'>
                            <a onclick='toAppD0()' id='appLD0' class='active'>Werktijden</a>
                            <a onclick='toAppD1()' id='appLD1'>Ontvangen Feedbacks</a>
                            <a onclick='toAppD2()' id='appLD2'>Gebruikers</a>
                            <a onclick='toAppD3()' id='appLD3'>Algemene Beoordelingen</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div id='appD0' class='appD0 div_Show'>
                            <div class='div_Show' id='dwerktijdsel'>
                                <form method='post' style='height: 100%; width: 100%; position: absolute' action='./index.php'>
                                ";
                                    $tid = mysqli_num_rows($selt);
                                    if($tid>0) {
                                        while($result=mysqli_fetch_assoc($selt)) {
                                            echo "
                                                  <input class='newBtnStyle' name='dstudent' type='submit' value='".$result['username']."'>
                                              ";
                                        }
                                    }
                    echo "
                                </form>
                            </div>
                            <div class='div_Away' id='dwerktijduser'>
                                <div class='ioD0Workhours'>
                                     <div class='ioWeekControl'>
                                        <p class='ioWeekNumber centerTag'>"; echo "Week ".$WerktijdWeek."</p>
                                     </div>
                                    <form method='post' action='../utils/php/d_SubmitWorkhrs.php'>
                                     <div class='ioWorkHours'>
                                        <div class='ioWorkHours-Days'>
                                            <div id='ioWorkDayMon'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Maandag</p>
                                            </div>
                                             <div id='ioWorkDayThu'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Dinsdag</p>
                                            </div>
                                             <div id='ioWorkDayWed'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Woensdag</p>
                                            </div>
                                             <div id='ioWorkDayThr'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Donderdag</p>
                                            </div>
                                             <div id='ioWorkDayFri'>
                                                <p class='centerTag' style='transform: translateY(50%); color: var(--fg)'>Vrijdag</p>
                                            </div>
                                        </div>
                                        <div class='ioWorkHours-Input'>
                                            <div id='ioWorkDayMonInput'>
                                                <input name='valMonStart' type='time' class='centerTag' required>
                                                <input name='valMonEnd' type='time' class='centerTag' required>
                                            </div>
                                             <div id='ioWorkDayThuInput'>
                                                <input name='valThuStart' type='time' class='centerTag' required>
                                                <input name='valThuEnd' type='time' class='centerTag' required>
                                            </div>
                                            <div id='ioWorkDayWedInput'>
                                                <input name='valWedStart' type='time' class='centerTag' required>
                                                <input name='valWedEnd' type='time' class='centerTag' required>
                                            </div>
                                            <div id='ioWorkDayThrInput'>
                                                <input name='valThrStart' type='time' class='centerTag' required>
                                                <input name='valThrEnd' type='time' class='centerTag' required>
                                            </div>
                                            <div id='ioWorkDayFriInput'>
                                                <input name='valFriStart' type='time' class='centerTag' required>
                                                <input name='valFriEnd' type='time' class='centerTag' required>
                                            </div>
                                        </div>
                                        <div class='ioWorkhrsSubmit'>
                                            <input name='Workhrs' type='submit' value='Bevestigen' class='ioWorkhrsSubmitBtn centerTag'>
                                     </div>
                                    </form>
                                </div>
                             </div>
                            </div>
                            ";
                                if(isset($_POST['dstudent'])) {
                                    $_SESSION['dapp0student'] = $_POST['dstudent'];
                                }

                                if(isset($_SESSION['dapp0student'])) {
                                    echo "<script>
                                            var sel = document.getElementById('dwerktijdsel');
                                            var use = document.getElementById('dwerktijduser');
                                            
                                                sel.classList.remove('div_Show');
                                                sel.classList.add('div_Away');
                                                use.classList.remove('div_Away');
                                                use.classList.add('div_Show');
                                        </script>";
                                }
                                        echo "
                    </div>
                    <div id='appD1' class='appD1 div_Away'>
                        <div id='dFeedbackuser' class='div_Show'>
                            <form method='post' action='./index.php'>
                            ";
                                $tid = mysqli_num_rows($selp);
                                if($tid>0) {
                                    while($result=mysqli_fetch_assoc($selp)) {
                                        echo "
                                              <input class='newBtnStyle' name='dfeedback' type='submit' value='".$result['student']."'>
                                              <br>
                                          ";
                                    }
                                }
                                echo "
                            </form>
                        </div>
                        ";
                        if(isset($_POST['dfeedback'])) {
                        $_SESSION['dapp1feedback'] = $_POST['dfeedback'];
                        $D1Student = $_SESSION['dapp1feedback'];

                        // Retrieving for Dfeedback
                        $cmd = "SELECT * FROM `leerdoel` WHERE `student` = '$D1Student'";
                        $selpp = mysqli_query($server, $cmd);
                        $row = mysqli_fetch_array($selpp);
                        $_SESSION['d1releerdoel'] = $row['leerdoel'];
                        $_SESSION['d1refeedback'] = $row['feedback'];
                        }
                                echo "
                        <div id='dFeedback' class='div_Away'>
                            <div class='div_Show' id='dLeerdoelSelected'>
                                <form method='post' action='./index.php'>
                                    ";
                                    $leerdoel = $_SESSION['d1releerdoel'];
                                    echo "<h2 style='color: var(--fg)'>Leerdoel van Student</h2>";
                                    echo "<p style='color: var(--nord10)'>$leerdoel</p>";
                                    echo "
                                </form>
                            </div>
                            <div class='div_Show' id='dFeedbackSelected'>
                                <form method='post' action='./index.php'>
                                    ";
                                    $feedback = $_SESSION['d1refeedback'];
                                    echo "<h2 style='color: var(--fg)'>Feedback van Begeleider</h2>";
                                    echo "<p style='color: var(--nord10)'>$feedback</p>";
                                    echo " 
                                </form>
                            </div>
                            <div class='d1Back div_Show'>
                            <form method='post' style='height: 100%'>
                              <input type='submit' value='Terug' class='newBtnStyle' style='height:100%' name='dbackbtn'>
                            </form>";
                                if (isset($_POST['dbackbtn'])) {
                                  unset($_SESSION['dapp1feedback']);
                                }
                               echo " 
                            </div>
                    </div>
                    ";
                    if (isset($_SESSION['dapp1feedback'])) {
                        echo "<script>
                                var sel = document.getElementById('dFeedbackuser');
                                var use = document.getElementById('dFeedback');
                                
                                    sel.classList.remove('div_Show');
                                    sel.classList.add('div_Away');
                                    use.classList.remove('div_Away');
                                    use.classList.add('div_Show');
                            </script>";
                    }
                    echo "
                    </div>
                       <div id='appD2' class='appD2 div_Away'>
                            <div class='addUserBtn' onclick='toggleUserAdd()'>
                                <img id='d2UserIMG' class='addUserBtnStyle' src='icons/addUser.png' alt='addUser'>
                            </div>
                            <div class='changeUserBtn' onclick='toggleUserEdit()'>
                                <img id='d2EditIMG' class='addUserBtnStyle' src='icons/editUser.png' alt='editUser'>
                            </div>
                            <div class='DeleteUserBtn' onclick='toggleUserDel()'>
                                <img id='d2DeleteIMG' class='addUserBtnStyle' src='icons/deleteUser.png' alt='deleteUser'>
                            </div>
                            <div class='AddCompanyBtn' onclick='toggleCompanyAdd()'>
                                <img id='d2CompanyIMG' class='addCompanyBtnStyle' src='icons/addCompany.png' alt='addComp'>
                            </div>
                            <div id='d2AddUser' class='d2AddUser div_Away'>
                                <div class='d2AddUserHeader'>
                                    <div class='centerTag'><h3 style='color: var(--fg)'>Nieuw Account</h3></div>
                                </div>
                                <div class='d2AddUserForm'>
                                    <form method='post' action='../utils/php/d_AddUser.php'>
                                        <input class='d2AddUserFormBtnStyle' type='text' name='Username' placeholder='Gebruikersnaam' required>
                                        <input class='d2AddUserFormBtnStyle' type='password' name='Pass' style='margin-top:10px;' placeholder='Wachtwoord' required>
                                        <div class='centerTag'><label class='d2RadioLabel' for='d2Radio1'>Student</label>
                                            <input id='d2Radio1' value='1' name='role' type='radio' required></div>
                                        <div class='centerTag'><label  class='d2RadioLabel' for='d2Radio2'>Begeleider</label>
                                            <input id='d2Radio2' value='2' name='role' type='radio' required></div>
                                        <div class='centerTag'><label class='d2RadioLabel' for='d2Radio3'>Docent</label>
                                            <input id='d2Radio3' value='3' name='role' type='radio' required></div>
                                        <br>
                                        <div class='centerTag'><input class='d2AddUserFormRegBtn' type='submit' value='Registreren' name='login'></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id='d2EditUsers' class='d2EditUsers div_Away'>
                                <div class='centerTag'><p style='color: var(--fg); font-size: 24px'>Verander een Gebruiker</p></div>
                            <div id='editUserSel' class='d2EditSelUser div_Show'>
                                ";
                                $eid=mysqli_num_rows($selo);
                                if($eid>0) {
                                    while ($result=mysqli_fetch_assoc($selo)) {
                                        echo "
                                        <div class='centerTag'><button class='newBtnStyle3'><a href='../utils/php/d_EditUser.php?id=".$result['id']."' class='d2EditSelArrayD'>".$result['username']."</a></button></div>";
                                        $_SESSION['editSelID'] = $result['id'];
                                   }}
                                echo "
                            </div>
                        </div>
                        <div id='d2DeleteUsers' class='d2DeleteUsers div_Away'>
                            <div class='centerTag'><p style='color: var(--fg); font-size: 24px'>Verwijder een Gebruiker</p></div>
                            <div class='d2EditSelUser' style='margin-top: 5%'>
                                <form method='post'>
                                   ";
                                $did=mysqli_num_rows($seld);
                                if($did>0) {
                                    while ($result=mysqli_fetch_assoc($seld)) {
                                        echo "
                                            <div class='centerTag'><button class='newBtnStyle2'><a href='../utils/php/d_DeleteUser.php?username=".$result['username']."' class='d2EditSelArrayD'>".$result['username']."</a></button></div>
                                        ";
                                    }
                                }
                                echo "
                                </form>
                           </div>
                        </div>
                        <div id='companyAdd' class='d2addCompany div_Away'>
                            <div class='centerTag'><p style='color: var(--fg); font-size: 24px'>Voeg een bedrijf toe</p></div>
                            <form method='post' action='../utils/php/d_AddCompany.php' style='margin-top: 5%'>
                                <input type='text' name='company' class='centerTag d2AddUserFormBtnStyle'>
                                <input type='submit' value='Submit' name='companysubmit' class='centerTag newBtnStyle2' style='margin-top: 2%'>
                            </form>
                        </div>
                    <div id='appD3' class='appD3 div_Away'>
                                <div id='D3StudSel' class='D3ReviewStudSel div_Show'>
                                    <form method='post' class='appFormFix'>
                                         ";
                                         $result = mysqli_num_rows($selxxx);
                                         if($result>0) {
                                             while($result=mysqli_fetch_assoc($selxxx)) {
                                                 echo "
                                                    <div><input type='submit' name='D3SelectedUser' class='newBtnStyle8 d2EditSelArrayD' value=".$result['username']."></input></div>
                                                 ";
                                             }
                                         }
                                echo "
                                    </form>
                                </div>
                                ";
                                    if (isset($_POST['D3SelectedUser'])) {
                                        $_SESSION['D3SelectedUser'] = $_POST['D3SelectedUser'];
                                    }
                                 echo "
                                <div id='D3StudForm' class='div_Away'>
                                <div class='D3Form'>
                                    <div class='D3FormQ'>
                                        <div class='D3FormQ1'><p class='docFont'>Aanwezigheid</p></div>
                                        <div class='D3FormQ2'><p class='docFont'>Luisterd Goed / Volgt Aanwijzigen</p></div>
                                        <div class='D3FormQ3'><p class='docFont'>Vraagt tijdig om hulp / raad</p></div>
                                        <div class='D3FormQ4'><p class='docFont'>Verantwoordelijkheidsgevoel</p></div>
                                        <div class='D3FormQ5'><p class='docFont'>Werkt met plezier</p></div>
                                        <div class='D3FormQ6'><p class='docFont'>Klantgericht en Vriendelijke</p></div>
                                        <div class='D3FormQ7'><p class='docFont'>Werktempo</p></div>
                                        <div class='D3FormQ8'><p class='docFont'>Voert opgedragen werk uit</p></div>
                                        <div class='D3FormQ9'><p class='docFont'>Vaardig met IT tools/software</p></div>
                                        <div class='D3FormQ10'><p class='docFont'>Toont Initatief</p></div>
                                    </div>
                                    ";
                                    $d2User = $_SESSION['D3SelectedUser'];
                                    $dFetch = mysqli_query($server, "SELECT * FROM `beoordeling` WHERE `student` = '$d2User'");
                                    $result = mysqli_num_rows($dFetch);
                                    if($result>0) {
                                        while ($result=mysqli_fetch_assoc($dFetch)) {
                                            echo "
                                                <div class='D3FormA'>
                                                    <div class='D3FormA1'><p class='docFont2'>".$result['aanwezigheid']."</p></div>
                                                    <div class='D3FormA2'><p class='docFont2'>".$result['luister']."</p></div>
                                                    <div class='D3FormA3'><p class='docFont2'>".$result['hulpraad']."</p></div>
                                                    <div class='D3FormA4'><p class='docFont2'>".$result['verantwoordelijk']."</p></div>
                                                    <div class='D3FormA5'><p class='docFont2'>".$result['plezier']."</p></div>
                                                    <div class='D3FormA6'><p class='docFont2'>".$result['klantgericht']."</p></div>
                                                    <div class='D3FormA7'><p class='docFont2'>".$result['werktempo']."</p></div>
                                                    <div class='D3FormA8'><p class='docFont2'>".$result['uitvoer']."</p></div>
                                                    <div class='D3FormA9'><p class='docFont2'>".$result['vaardigheid']."</p></div>
                                                    <div class='D3FormA10'><p class='docFont2'>".$result['initatief']."</p></div>
                                                </div>
                                            </div>
                                            ";
                                        }
                                    }
                                   echo "
                                <form method='post' class='B0BackBtn'>
                                    <input type='submit' name='D3BackBtn' class='B0BackBtnStyle' value='Terug'>
                                </form>
                                ";
                                if (isset($_POST['D3BackBtn'])) {
                                    unset($_SESSION['D3SelectedUser']);
                                }
                                 echo "
 
                                </div>
                                ";
                                    if (isset($_SESSION['D3SelectedUser'])) {
                                        echo "
                                            <script>
                                                var one = document.getElementById('D3StudSel');
                                                var two = document.getElementById('D3StudForm');
                                                one.classList.remove('div_Show');
                                                one.classList.add('div_Away');
                                                two.classList.remove('div_Away');
                                                two.classList.add('div_Show');
                                            </script>
                                        ";
                                    }
                                echo "
                            </div>
                        </div>
                    </div>
                </div>
                    ";
                    break;
                default:
                    echo "Illigaal Patroon";
                    header('Location: ../');
            }
        ?>
    </div>
        <div id='ioDemoWall' class='ioDemoWallpaper blur_On'>
            <img id='ioDemoWallpaper' src='../utils/wallpapers/1.jpg' alt='Wallpaper'>
        </div>
        <div id='ioDemoApp' class='ioDemoForm div_Show blur_Off'>
            <div class='ioDemoFormLeft'>
                <div id='ioDemoFormLeftBtn' class='ioDemoFormLeftBtnHolder div_Away'>
                    <button class='ioDemoButtonStyle' onclick='ioDemoFormBack()'>
                        <img class='ioDemoArrowFix' src='icons/left-arrow.png' alt='arrow-left'>
                    </button>
                </div>
            </div>
            <div class='ioDemoFormCenter'>
                <div class='ioDemoFormContent'>
                    <div id='ioDemoForm0' class='ioDemoForm0 div_Show'>
                        <img alt='demoPicture' class='ioDemoIMG' src='../utils/wallpapers/demo1.jpg'>
                    </div>
                    <div id='ioDemoForm1' class='ioDemoForm1 div_Away'>
                        <img alt='demoWallpaper' class='ioDemoIMG' src='../utils/wallpapers/demo2.jpg'>
                    </div>
                </div>
            </div>
            <div class='ioDemoFormRight'>
                <div class='ioDemoFormRightBtnHolder'>
                    <div id='ioDemoFormBtnRight0' class='ioDemoFormRightBtnHolderChild0 div_Show'>
                        <button class='ioDemoButtonStyle' onclick='ioDemoFormNextChild0()'>
                            <img class='ioDemoArrowFix' src='icons/right-arrow.png' alt='arrow-right'>
                        </button>
                    </div>
                    <div id='ioDemoFormBtnRight1' class='ioDemoFormRightBtnHolderChild1 div_Away'>
                        <form method='post' action='../utils/php/demo.php'>
                            <button class='ioDemoButtonStyle' name='ioDemoFormNextChild1'>
                                <img class='ioDemoArrowFix' src='icons/right-arrow.png' alt='arrow-right'>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
        function ioDemoInit() {
            let app = document.getElementById('appUIbody');
            let demo = document.getElementById('ioDemoApp');
            let wall = document.getElementById('ioDemoWall');
            switch (<?= $demo ?>) {
                case 1:
                    if(demo.classList.contains('div_Show')) {
                    } else {
                        demo.classList.remove('div_Away');
                        demo.classList.add('div_Show');
                    }
                    break;
                case 2:
                    demo.classList.remove('div_Show'); demo.classList.add('div_Away'); wall.classList.add('div_Away');
                    app.classList.remove('div_Away');app.classList.add('div_Show')
                    break;
                default:
                    alert("Err");
                    break;
            }
        }
    </script>
    <script src="../jsapp/appTaskSwitch.js"></script>
    <script src="../jsapp/d2.js"></script>
    <script src="../jsapp/ioDemoForm.js"></script>
</body>
</html>