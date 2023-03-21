 <?php
 session_start();
 include "connection.php";

 if (isset($_GET['username'])) {
  $id = $_GET['username'];
  $query = "DELETE FROM `users` WHERE username = '$id'";
  $querys = "DELETE FROM `leerdoel` WHERE username = '$id'";
  $run = mysqli_query($conn,$query);
  $runs = mysqli_query($conn,$querys);
  if ($run) {
   if($runs) {
   } else {}
   header('Location: app/');
  }else{
   echo "Error: ".mysqli_error($conn);
  }
 }

 ?>  