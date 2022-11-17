<?php include('cofig.php'); 
      include("include/connection.php");
      $id = $_GET['id'];
      $sql1 = " DELETE FROM `subcategories` WHERE id = $id"; 
      $result = mysqli_query($conn , $sql1);
      header("location:Sub-category.php");
?>