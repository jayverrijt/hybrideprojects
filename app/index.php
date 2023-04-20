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
$sel = mysqli_query($server, " SELECT * FROM `users`");
$sela = mysqli_query($server, " SELECT * FROM `users`");
$selb = mysqli_query($server, " SELECT * FROM `users`");
$seld = mysqli_query($server, " SELECT * FROM `users`");
$sele = mysqli_query($server, " SELECT * FROM `users`");
$selt = mysqli_query($server, " SELECT * FROM `users`");
$selo = mysqli_query($server, " SELECT * FROM `users`");
$selp = mysqli_query($server, " SELECT * FROM `leerdoel`");
$selx = mysqli_query($server, " SELECT * FROM `users`");
$selx = mysqli_query($server, " SELECT * FROM `users`");
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
<body>
    <div id="appUIbody" class="appUIBody div_Show blur_Off">
        <div id="appUIuser" class="appUIUser">
            <div class="btnHolderAccount">
                <button class="appUIBtnStyle"
                    onclick="window.location.href='../utils/php/logout.php'">Uitloggen</button>
            </div>
            <div class="btnHolderSettings">
                <button class="appUIBtnStyle" onclick="alert('Nein')">Color</button>
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
                            <a id='appLS0' class='active'>In/Uit Klokken</a>
                            <a id='appLS1'>Leerdoel</a>
                            <a id='appLS2'>Uren</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div class='appS0 div_Show'>
                            <div class='ioClockFrame'>
                                <form method='post' action='post/'>
                                    <input type='submit' value='Inklokken'> 
                                </form>
                            </div> 
                        </div>
                        <div class='appS1 div_Away'>
                            <form>
                                <label for='leerdoel'>Leerdoel</label>
                                <textarea id='leerdoel' name='leerdoel'></textarea>
                                <input type='submit' value='Submit' name='doelsubmit'>
                            </form> 
                        </div>
                        <div class='appS2 div_Away'>";
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
                            <a id='appLB0' class='active'>Werktijden</a>
                            <a id='appLB1'>Aanwezigheid</a>
                            <a id='appLB2'>Feedback op Student</a>
                            <a id='appLB3'>Eind Beoordelingen</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div class='appB0 div_Show'>
                            <div class='div_Show' id='appD0studentsel'>
                                <form method='post' action='./'>
                                ";
                                    $sely = mysqli_query($server, " SELECT * FROM `werktijden`");
                                    $tid = mysqli_num_rows($sely);
                                    if($tid>0) {
                                        while($result=mysqli_fetch_assoc($sely)) {
                                            echo "<input name='bselapp0' type='submit' value='".$result['student']."'>";
                                        }
                                    }
                        echo "
                                </form> 
                            </div>
                            <div class='div_Away' id='appD0werktijd'>
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
                                    var one = document.getElementById('appD0studentsel'); 
                                    var two = document.getElementById('appD0werktijd'); 
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
                        <div class='appB1 div_Away'>
                            <form action='../utils/php/b_SubmitAanwezigheid.php' method='post'>
                                <label for='bAA-MA-A'>Maandag</label>
                                <input type='radio' name='bmonday' value='Aanwezig' id='bAA-MA-A' required>
                                <input type='radio' name='bmonday' value='Afwezig' id='bAA-MA-B' required><br>
                                <label for='bAA-DI-A'>Dinsdag</label>
                                <input type='radio' name='bthuesday' value='Aanwezig' id='bAA-DI-A' required>
                                <input type='radio' name='bthuesday' value='Afwezig' id='bAA-DI-B' required><br>
                                <label for='bAA-WO-A'>Woensdag</label>
                                <input type='radio' name='bwednesday' value='Aanwezig' id='bAA-WO-A' required>
                                <input type='radio' name='bwednesday' value='Afwezig' id='bAA-WO-B' required><br>
                                <label for='bAA-DO-A'>Donderdag</label>
                                <input type='radio' name='bdonday' value='Aanwezig' id='bAA-DO-A' required>
                                <input type='radio' name='bdonday' value='Afwezig' id='bAA-DO-B' required><br>
                                <label for='bAA-VR-A'>Vrijdag</label>
                                <input type='radio' name='bfriday' value='Aanwezig' id='bAA-VR-A' required>
                                <input type='radio' name='bfriday' value='Afwezig' id='bAA-VR-B' required><br>
                                ";
                                $eid = mysqli_num_rows($selt);
                                $counter = 0;
                                if ($eid > 0) {
                                    while ($result = mysqli_fetch_assoc($sele)) {
                                        echo "
                                               <label for='bselectedstudent'>".$result['username']."</label>
                                               <input type='radio' value='".$result['username']."' name='bselectedstudent' required><br>
                                               ";
                                    }
                                }
                            echo "
                                <input type='submit' value='Submit' name='baanwezigheidsubmit'>
                            </form>
                        </div>
                        <div class='appB2 div_Away'>
                          <div class='div_Show' id='appB2UserSel'>
                            <form method='post'>
                            ";
                                $tid = mysqli_num_rows($selx);
                                if($tid>0) {
                                    while($result=mysqli_fetch_assoc($selx)) {
                                        echo "
                                              <input name='beditsel' type='submit' value='".$result['username']."'>
                                          ";
                                    }
                                }
                                echo "
                            </form>
                          </div>
                          <div class='div_Away' id='appB2Feedback'>
                            <form method='post' action='../utils/php/b_SubmitFeedback.php'>
                                <textarea name='feedback'></textarea>
                                <input type='submit' value='Submit'>
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
                        </div>
                        <div class='appB3 div_Away'>
                        </div>
                    </div>
                    ";
                    break;
                case 3:
                    echo "
                    <div id='appUIMenu'>
                        <div id='aUIm3' class='aUIm'>
                            <a id='appLD0' class='active'>Werktijden</a>
                            <a id='appLD1'>Ontvangen Feedbacks</a>
                            <a id='appLD2'>Gebruikers</a>
                        </div>
                    </div>
                    <div id='appUIContent'>
                        <div class='appD0 div_Away'>
                            <div class='div_Show' id='dwerktijdsel'>
                                <form method='post' action='./index.php'>
                                ";
                                    $tid = mysqli_num_rows($selt);
                                    if($tid>0) {
                                        while($result=mysqli_fetch_assoc($selt)) {
                                            echo "
                                                  <input name='dstudent' type='submit' value='".$result['username']."'>
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
                    <div class='appD1 div_Show'>
                        <div id='dFeedbackuser' class='div_Show'>
                            <form method='post' action='./index.php'>
                            ";
                                $tid = mysqli_num_rows($selp);
                                if($tid>0) {
                                    while($result=mysqli_fetch_assoc($selp)) {
                                        echo "
                                              <input name='dfeedback' type='submit' value='".$result['student']."'>
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
                                    echo "<p>$leerdoel</p>";
                                    echo "
                                </form>
                            </div>
                            <div class='div_Show' id='dFeedbackSelected'>
                                <form method='post' action='./index.php'>
                                    ";
                                    $feedback = $_SESSION['d1refeedback'];
                                    echo "<p>$feedback</p>";
                                    echo " 
                                </form>
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
                       <div class='appD2 div_Away' id='appD2'>
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
                                <div class='centerTag'><p style='color: var(--fg)'>Verander een Gebruiker</p></div>
                            <div id='editUserSel' class='d2EditSelUser div_Show'>
                                ";
                                $eid=mysqli_num_rows($selo);
                                if($eid>0) {
                                    while ($result=mysqli_fetch_assoc($selo)) {
                                        echo "
                                      <a href='../utils/php/d_EditUser.php?id=".$result['id'].">".$result['username']."</a>
                                      "; $_SESSION['editSelID'] = $result['id'];
                                   }}
                                echo "
                            </div>
                        </div>
                        <div id='d2DeleteUsers' class='d2DeleteUsers div_Away'>
                            <div class='centerTag'><h1 style='color: var(--fg)'>Verwijder een Gebruiker</h1></div>
                            <div class='d2EditSelUser'>
                                <form method='post'>
                                   ";
                                $did=mysqli_num_rows($seld);
                                if($did>0) {
                                    while ($result=mysqli_fetch_assoc($seld)) {
                                        echo "
                                            <div class='centerTag'><a href='../utils/php/d_DeleteUser.php?username=".$result['username']." class=d2EditSelArray'>".$result['username']."</a></div>
                                        ";
                                    }
                                }
                                echo "
                                </form>
                           </div>
                        </div>
                        <div id='companyAdd' class='d2DeleteUsers div_Away'>
                            <form method='post' action='../utils/php/d_AddCompany.php'>
                                <input type='text' name='company'>
                                <input type='submit' value='Submit' name='companysubmit'>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
                    ";
                    break;
                default:
                    echo "Login Failed geen rol type bij dit account";
            }
        ?>
   </div>
</body>
</html>