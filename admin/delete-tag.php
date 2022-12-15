<?php include('cofig.php'); 
      include("include/connection.php");
      $id = $_GET['id'];
      $sql1 = " DELETE FROM `tags` WHERE id = $id"; 
      $result = mysqli_query($conn , $sql1);
      header("location:blogs-tags.php?del=$result");
?>