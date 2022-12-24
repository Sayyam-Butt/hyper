<?php
include("include/connection.php");
$messageid = $_POST["id"];
$queryformessage = "SELECT * FROM `contactmessage` WHERE id = $messageid";
$result =  mysqli_query($conn, $queryformessage);
$rowformessage = mysqli_fetch_assoc($result);
$output="";
$output='
        <h5>Message</h5>
        <hr>
        <h5>'.$rowformessage["name"].'</h5>
        <h6> '.$rowformessage["email"]. '</h6>
        <small> '.$rowformessage["time"].'</small>
        <h3 class="py-3">'.$rowformessage["message"].'</h3>
';
echo $output;
?>
