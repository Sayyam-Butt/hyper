<?php
include("include/connection.php");
$faq_id = $_GET['id'];
$query = "DELETE FROM `faq` WHERE id = $faq_id";
$query_run=mysqli_query($conn,$query);
header("location:allfaq.php");
?>