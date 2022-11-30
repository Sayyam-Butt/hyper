<?php

class admin_class {
  public function savesiteurl($url , $pagename)
  {
    include 'connection.php';
    $sql1=" INSERT INTO `siteurl`( `url`,`pagename`) VALUES ('$url','$pagename')"; 
    $result = mysqli_query($conn , $sql1);
  }
}
?>