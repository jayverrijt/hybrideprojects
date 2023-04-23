<?php
    session_start();
    include "connection.php";
    global $server;
    global $user;
    $sel = mysqli_query($server, "SELECT * FROM company");

    if(isset($_GET['id'])){
       $user = $_GET['id'];
       $selb = mysqli_query($server, "SELECT * FROM users WHERE id = $user;");
    }
    $selb = mysqli_query($server, "SELECT * FROM users WHERE id = $user;");
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="shortcut icon" href="../favicon.png">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../jsapp/_jsapp_styles/editUser.css">
    <title>Edit Account <?=$user?> · Hybride Projects</title>
</head>
<body>
    <div class="container">
        <div>
            <form method="post" action="d_ChangeUserDetail.php?id=<?=$user?>">
                <input name="nusername" type="text" placeholder="Nieuwe Gebruikersnaam">
                <input name="nww" type="password" placeholder="Nieuw Wachtwoord">
                <input name="submit" type="submit" value="Submit">
            </form>
        </div>
        <div>
            <form>
                <input name="dr" type="button" value="Data verwijderen">
            </form>
        </div>
        <div>
            <form method="post">
                <?php
                $fetch =mysqli_num_rows(($sel));
                if($fetch>0) {
                    while ($result=mysqli_fetch_assoc($sel)) {
                        echo "
                            <button><a href='d_ChangeCompany.php?userid=".$user."&companyid=".$result['id']."'>".$result['company']."</a></button>
                        ";
                    }
                }
                ?>
            </form>
        </div>
        <div>
            <form method="get" action="d_Finishstage.php">
                <?php
                    $fetch = mysqli_num_rows(($selb));
                    if($fetch>0) {
                        while($result=mysqli_fetch_assoc($selb)) {
                            echo "
                                <button><a href='d_Finishstage.php?userid=".$result['id']."'>Klaar met stage</a</button>
                            ";
                        }
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>