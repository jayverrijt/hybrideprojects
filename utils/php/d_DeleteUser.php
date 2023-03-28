 <?php
 session_start();
 include "connection.php";
 global $server;

 if (isset($_GET['username'])) {
  $id = $_GET['username'];
  $query = "DELETE FROM `users` WHERE username = '$id'";
  $querys = "DELETE FROM `leerdoel` WHERE username = '$id'";
  $run = mysqli_query($server,$query);
  $runs = mysqli_query($server,$querys);
  if ($run) {
   if($runs) {
   } else {}
   header('Location: ../../app/');
  }else{
   echo "Error: ".mysqli_error($server);
  }
 }