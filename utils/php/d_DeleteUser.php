 <?php
 session_start();
 include "connection.php";
 global $server;

 var_dump($_GET['username']);
 if (isset($_GET['username'])) {
  $id = $_GET['username'];
  $query = "DELETE FROM `users` WHERE username = '$id'";
  $run = mysqli_query($server,$query);
  header('Location: ../../app/');
 }