 <?php
 include "connection.php";
 if (isset($_GET['id'])) {
      $id = $_GET['id'];  
      $query = "DELETE FROM `users` WHERE id = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:app/index.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>  