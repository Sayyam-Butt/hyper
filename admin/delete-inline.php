<?php include('cofig.php'); 
      include("include/connection.php");
      $cat_id = $_GET['blogs_id'];
      $sql1 = "DELETE FROM `blogcategories` WHERE blogs_id = $cat_id;"; 
      $sql1.="DELETE FROM `subcategories` WHERE cat_id=$cat_id;";
      $sql1.="DELETE FROM `blogs` WHERE blogcategories=$cat_id;";
      $result = mysqli_multi_query($conn , $sql1);
      header("location:blogs-categories.php?del=$result");
?>