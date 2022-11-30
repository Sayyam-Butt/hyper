<?php
 include("include/connection.php");
 $pageurl = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
 $currenturl = $pageurl[2];

 $sqlforblogs = 'SELECT * FROM blogs where pageurl="'.$currenturl.'"';
 $resultforblogs=mysqli_query($conn,$sqlforblogs);
 $finalresultblogs = mysqli_num_rows($resultforblogs);


 $sqlforblogscategories = 'SELECT * FROM blogcategories where caturl="'.$currenturl.'"';
 $resultforblogscategories=mysqli_query($conn,$sqlforblogscategories);
 $finalresultcategories = mysqli_num_rows($resultforblogscategories);

 if($finalresultblogs > 0)
 {
    include 'blogdetailpage.php';
 }else if($finalresultcategories > 0)
 {
    include 'blogmaincategory.php';
 }else{
    include '404.php';
 }

?>