<?php
include('cofig.php');
include("include/connection.php");
$id=$_GET['id'];
$query="DELETE FROM `blogs` WHERE id=$id";
mysqli_query($conn,$query);
header("location:all-blogs.php");
?>