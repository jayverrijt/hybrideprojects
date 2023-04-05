<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Studentenstage</title>
  <link rel="shortcut icon" href="utils/favicon.png">
  <link rel="stylesheet" href="jsapp/_jsapp_styles/ioSummonLogin.css">
  <link rel="stylesheet" href="global.css">
  <script src="jsapp/ioSummonLogin.js"></script>
</head>

<body>
  <div class="summonLoginBox">
    <div class="loginWallpaper blur_On">
      <img id="ioSummonLoginBoxWallpaper" src="utils/wallpapers/1.jpg" alt="background">
    </div>
    <div id="ioLoginApp" class="ioLoginApp div_Show blur_Off">
      <div class="centerTag"><h1 class="ioLoginHeader">
        Studenten Stage
          </h1></div>
      <div class="ioLoginStyleCenter">
        <form class="ioLoginFormStyle" method="post">
          <input id="loginContent1" class="ioLoginAppBtn" type="text" name="Username" placeholder="Gebruikersnaam"
            required=""><br>
          <input id="loginContent2" class="ioLoginAppBtn" type="password" name="Pass" placeholder="Wachtwoord"
            required=""><br>
          <input id="loginContent3" class="ioLoginAppBtn" type="submit" name="login" value="Inloggen">
        </form>
      </div>
    </div>
  </div>
</body>

</html>


<?php
session_start();
include "utils/php/connection.php";
global $server;
if (isset($_SESSION['username'])) {
  session_destroy();
  header("Refresh:0");
  session_start();
}
?>

<?php
if (isset($_POST['login'])) {
  $Username = $_POST['Username'];
  $Pass = $_POST['Pass'];

  $sel = mysqli_query($server, " SELECT * FROM `users` WHERE username = '$Username' AND password = '$Pass'");
  $row = mysqli_fetch_array($sel);

  if (is_array($row)) {
    $_SESSION["username"] = $row['username'];
    $_SESSION["perm"] = $row['perm'];
    $_SESSION["demo"] = $row['demo'];
    $_SESSION["id"] = $row['id'];
  }
}

// RW
if (isset($_SESSION["username"])) {
  if (isset($_SESSION["username"])) {
    switch ($row['perm']) {
      case '1':
        header('Location:app/');
        break;
      case '2':
        header('Location:app/');
        break;
      case '3':
        header('Location:app/');
        break;
      default:
        echo "Unknown Error";
    }
  }
}
?>