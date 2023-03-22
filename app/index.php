<?php
session_start();
$perm = $_SESSION["perm"];
$demo = $_SESSION["demo"];
$user = $_SESSION["username"];
$id = $_SESSION["id"];
if (empty($_SESSION['username'])) {
    header('Location:../');
}
include "../connection.php";
$sel = mysqli_query($conn, " SELECT * FROM `users`");
$sela = mysqli_query($conn, " SELECT * FROM `users`");
$selb = mysqli_query($conn, " SELECT * FROM `users`");
$seld = mysqli_query($conn, " SELECT * FROM `users`");
$sele = mysqli_query($conn, " SELECT * FROM `users`");
$row = mysqli_fetch_array($sel);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $_SESSION['username'] ?> · Studentenstage</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../global.css">
    <link rel="shortcut icon" href="../utils/favicon.png">
</head>
<body onload="initIoAppBuild(); ioDemoInit(); toggleUserAdd(); toggleUserDel(); toggleUserEdit(); toggleCompanyAdd();">
    <div id="appUIbody" class="appUIBody div_Away blur_Off">
        <div id="appUIuser" class="appUIUser">
            <div class="btnHolderAccount">
                <button class="appUIBtnStyle"
                    onclick="window.location.href='../logout.php'">Uitloggen</button>
            </div>
            <div class="btnHolderSettings">
                <button class="appUIBtnStyle" onclick="alert('Nein')">Color</button>
            </div>
        </div>
        <div id="appLogoBranding">
            <center><h1 class="mainHeader">Studenten Stage</h1></center>
        </div>
        <div id="appUIMenu">
            <div id="aUIm1" class="aUIm0 div_Away">
                <a id="appLS0" onclick="toAppS0();" class="active">In/Uit Klokken</a>
                <a id="appLS1" onclick="toAppS1();">Leerdoelen</a>
            </div>
            <div id="aUIm2" class="aUIm1 div_Away">
                <a id="appLB0" onclick="toAppB0();" class="active">Werktijden</a>
                <a id="appLB1" onclick="toAppB1();">Aanwezigheid</a>
                <a id="appLB2" onclick="toAppB2();">Feedback op Student</a>
            </div>
            <div id="aUIm3" class="aUIm2 div_Away">
                <a id="appLD0" onclick="toAppD0();" class="active">Werktijden</a>
                <a id="appLD1" onclick="toAppD1();">Ontvangen Feedbacks</a>
                <a id="appLD2" onclick="toAppD2();">Gebruikers</a>
            </div>
        </div>
        <div id="appUIContent">
            <div class="appS0 div_Away" id="appS0">
                <div class="ioClockFrame">
                    <form method="post" action="clock/">
                       <input type="submit"  value="Inklokken">
                    </form>
                </div>
            </div>
            <div class="appS1 div_Away" id="appS1">
                <div>
                    <form method="post" action="../submitleerdoel.php">
                        <textarea name="leerdoel">
                        </textarea>
                        <input type="submit" value="Submit" name="doelsubmit">
                    </form>
                </div>
            </div>
            <div class="appB0 div_Away" id="appB0">appB0</div>
            <div class="appB1 div_Away" id="appB1">appB1</div>
            <div class="appB2 div_Away" id="appB2">appB2</div>
            <div class="appD0 div_Away" id="appD0">appD0</div>
            <div class="appD1 div_Away" id="appD1">appD1</div>
            <div class="appD2 div_Away" id="appD2">
                <div class="addUserBtn" onclick="toggleUserAdd()">
                    <img id="d2UserIMG" class="addUserBtnStyle" src="icons/addUser.png" alt="addUser">
                </div>
                <div class="changeUserBtn" onclick="toggleUserEdit()">
                    <img id="d2EditIMG" class="addUserBtnStyle" src="icons/editUser.png" alt="editUser">
                </div>
                <div class="DeleteUserBtn" onclick="toggleUserDel()">
                    <img id="d2DeleteIMG" class="addUserBtnStyle" src="icons/deleteUser.png" alt="deleteUser">
                </div>
                <div class="AddCompanyBtn" onclick="toggleCompanyAdd()">
                    <img id="d2CompanyIMG" class="addCompanyBtnStyle" src="icons/addCompany.png" alt="addComp">
                </div>
                <div id="d2AddUser" class="d2AddUser div_Away">
                    <div class="d2AddUserHeader">
                        <center><h3 style="color: var(--fg)">Nieuw Account</h3></center>
                    </div>
                    <div class="d2AddUserForm">
                        <form method="post" action="../reg.php">
                            <input class="d2AddUserFormBtnStyle" type="text" name="Username" placeholder="Gebruikersnaam" required>
                            <input class="d2AddUserFormBtnStyle" type="password" name="Pass" style="margin-top:10px;" placeholder="Wachtwoord" required>
                            <center><label class="d2RadioLabel" for="d2Radio1">Student</label>
                                <input id="d2Radio1" value="1" name="role" type="radio" required></center>
                            <center><label  class="d2RadioLabel" for="d2Radio2">Begeleider</label>
                                <input id="d2Radio2" value="2" name="role" type="radio" required></center>
                            <center><label class="d2RadioLabel" for="d2Radio3">Docent</label>
                                <input id="d2Radio3" value="3" name="role" type="radio" required></center>
                            <br>
                            <center><input class="d2AddUserFormRegBtn" type="submit" value="Registreren" name="login"></center>
                        </form>
                    </div>
                </div>
                <div id="d2EditUsers" class="d2EditUsers div_Away">
                        <center><p style="color: var(--fg)">Verander een Gebruiker</p></center>
                    <div id='editUserSel' class="d2EditSelUser div_Show">
                        <?php
                        $eid=mysqli_num_rows($sele);
                        if($eid>0) {
                           while ($result=mysqli_fetch_assoc($sele)) {
                              echo "
                              <a href='../editUser.php?id=".$result['id']."'>".$result['username']."</a>
                              "; $_SESSION['editSelID'] = $result['id'];
                           }}
                        ?>
                    </div>
                </div>
                <div id="d2DeleteUsers" class="d2DeleteUsers div_Away">
                    <center><h1 style="color: var(--fg)">Verwijder een Gebruiker</h1></center>
                    <div class="d2EditSelUser">
                        <form method="post">
                           <?php
                           $did=mysqli_num_rows($seld);
                           if($did>0) {
                            while ($result=mysqli_fetch_assoc($seld)) {
                                echo "
                                    <center><a href='../delete.php?username=".$result['username']."' class='d2EditSelArray'>".$result["username"]."</a></center>
                                ";
                            }
                           }
                           ?> 
                        </form>
                    </div>
                </div>
                <div id="companyAdd" class="d2DeleteUsers div_Away">
                    <form method="post" action="../addCompany.php">
                        <input type="text" name="company">
                        <input type="submit" value="Submit" name="companysubmit">
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div id="ioDemoWall" class="ioDemoWallpaper blur_On">
            <img id="ioDemoWallpaper" src="../utils/wallpapers/1.jpg">
        </div>
        <div id="ioDemoApp" class="ioDemoForm div_Show blur_Off">
            <div class="ioDemoFormLeft">
                <div id='ioDemoFormLeftBtn' class="ioDemoFormLeftBtnHolder div_Away">
                    <button class="ioDemoButtonStyle" onclick='ioDemoFormBack()'>
                        <img class="ioDemoArrowFix" src="icons/left-arrow.png" alt="arrow-left">
                    </button>
                </div>
            </div>
            <div class="ioDemoFormCenter">
                <div class="ioDemoFormContent">
                    <div id="ioDemoForm0" class="ioDemoForm0 div_Show">
                        <img class="ioDemoIMG" src="../utils/wallpapers/demo1.jpg">
                    </div>
                    <div id="ioDemoForm1" class="ioDemoForm1 div_Away">
                        <img class="ioDemoIMG" src="../utils/wallpapers/demo2.jpg">
                    </div>
                </div>
            </div>
            <div class="ioDemoFormRight">
                <div class="ioDemoFormRightBtnHolder">
                    <div id="ioDemoFormBtnRight0" class="ioDemoFormRightBtnHolderChild0 div_Show">
                        <button class="ioDemoButtonStyle" onclick="ioDemoFormNextChild0()">
                            <img class="ioDemoArrowFix" src="icons/right-arrow.png" alt="arrow-right">
                        </button>
                    </div>
                    <div id="ioDemoFormBtnRight1" class="ioDemoFormRightBtnHolderChild1 div_Away">
                        <form method="post" action="../demo.php">
                           <button class="ioDemoButtonStyle" name="ioDemoFormNextChild1">
                               <img class="ioDemoArrowFix" src="icons/right-arrow.png" alt="arrow-right">
                           </button>
                        </form>
                    </div>
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
        function initIoAppBuild() {
           let  m0 = document.getElementById('aUIm1');
           let  m1 = document.getElementById('aUIm2');
           let  m2 = document.getElementById('aUIm3');
           let  s0 = document.getElementById('appS0');
           let  b0 = document.getElementById('appB0');
           let  d0 = document.getElementById('appD0');
            switch (<?= $perm ?>) {
                case 1:
                    m0.classList.remove('div_Away'); m0.classList.add('div_Show');
                    s0.classList.add('div_Show'); s0.classList.remove('div_Away');
                    break;
                case 2:
                    m1.classList.remove('div_Away'); m1.classList.add('div_Show');
                    b0.classList.add('div_Show'); b0.classList.remove('div_Away');
                    break;
                case 3:
                    m2.classList.remove('div_Away'); m2.classList.add('div_Show');
                    d0.classList.add('div_Show'); d0.classList.remove('div_Away');
                    break;
                default:
                    alert("U heeft geen rechten tot deze software");
                    break;
            }
        };
    </script>
    <script src="../jsapp/ioSettings.js"></script>
    <script src="../jsapp/d2.js"></script>
    <script src="../jsapp/editUser.js"></script>
    <script src="../jsapp/ioSettings.js"></script>
    <script src="../jsapp/d2.js"></script>
    <script src="../jsapp/ioDemoForm.js"></script>
    <script src="../jsapp/phpDoNotReload.js"></script>
    <script src="../jsapp/appTaskSwitch.js"></script>
</body>
</html>