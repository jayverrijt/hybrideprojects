<?php
    session_start();
    include "connection.php";
    global $server;
    $sel = mysqli_query($server, "SELECT * FROM company");

    if(isset($_GET['id'])){
       $user = $_GET['id'];
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../favicon.png">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../jsapp/_jsapp_styles/editUser.css">
    <title>Edit Account <?=$user?> · Hybride Projects</title>
</head>
<body>
    <div class="container">
        <form method="post" action="d_ChangeUserDetail.php?id=<?=$user?>">
            <input name="nusername" type="text" placeholder="Nieuwe Gebruikersnaam">
            <input name="nww" type="password" placeholder="Nieuw Wachtwoord">
            <input name="submit" type="submit" value="Submit">
        </form>
        <form>
            <input name="dr" type="button" value="Data verwijderen">
        </form>
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

</body>


</html>