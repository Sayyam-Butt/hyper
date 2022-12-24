<?php
include("include/connection.php");
$messageid = $_POST["id"];
$queryformessage = "DELETE FROM `contactmessage` WHERE id = $messageid";
if(mysqli_query($conn, $queryformessage)){
    echo 1;
}else{
    echo 0;
}

?>