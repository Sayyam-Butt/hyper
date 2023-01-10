<?php include('cofig.php'); 
      include("include/connection.php");
      $id = $_GET['id'];
      $cat_id=$_GET['cat_id'];
      $sql1 = "DELETE FROM `subcategories` WHERE id = $id;"; 
      $sql1.="DELETE FROM `blogs` WHERE subcategory=$id;";
      $sql1 .="UPDATE blogcategories SET post=post-1 WHERE blogs_id=$cat_id";
      $result = mysqli_multi_query($conn , $sql1);
      if ($result) {
		$_SESSION['status'] = "Subcategory Deleted Successfully";
      header("location:Sub-category.php");
	}
      
?>