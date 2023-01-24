<?php
include('cofig.php');
include("include/connection.php");
$id=$_GET['id'];
$cat_id =$_GET['cat_id'];

$querytocheck = "SELECT * FROM `blogs` WHERE `section` != 0 ";
$query_res = mysqli_query($conn , $querytocheck);
if(mysqli_num_rows($query_res)>0){
  $_SESSION['section'] = "You cannot delete this blog because it appears on section!!";
  header("location:all-blogs.php");	
}else{
  $query="DELETE FROM `blogs` WHERE id=$id;";
  $query .="UPDATE blogcategories SET post=post-1 WHERE blogs_id=$cat_id ";
  $result=mysqli_multi_query($conn , $query);
  if ($result) {
      $_SESSION['status'] = "Blog Deleted Successfully";
    header("location:all-blogs.php");	
  }
  
}
