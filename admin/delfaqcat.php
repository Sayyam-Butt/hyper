<?php
include('cofig.php');
include("include/connection.php");
$faqcat_id = $_GET['id'];
$query = "DELETE FROM `faqcategory` WHERE id = $faqcat_id";
$query_run=mysqli_query($conn,$query);
if ($query_run) {
    $_SESSION['status'] = "Faq Category Deleted Successfully";
    header("location:faqCategory.php");  
  }

?>