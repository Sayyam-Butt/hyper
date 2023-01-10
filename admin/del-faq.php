<?php
include('cofig.php');
include("include/connection.php");
$faq_id = $_GET['id'];
$query = "DELETE FROM `faq` WHERE id = $faq_id";
$query_run=mysqli_query($conn,$query);
if ($query_run) {
    $_SESSION['status'] = "Faq Deleted Successfully";
    header("location:allFaq.php");  
  }

?>