

<?php
include("include/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$email = $_POST['email'];

$query = "SELECT * FROM subscribers WHERE email = '$email'";
    $query_res = mysqli_query($conn, $query);


    $mail = new PHPMailer;                              // Passing `true` enables exceptions


    //Server settings

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->Username = 'buttsayyam630@gmail.com';
    $mail->Password = 'ifkttdncnkzqfrul';                          // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setfrom('buttsayyam630@gmail.com', 'Sayyam');     // Your Email
    $mail->addaddress($email);     // Add a recipient
    $mail->addreplyto('buttsayyam630@gmail.com');



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subscription';

    $mailContent = '<h4 style="display:inline-block;">You have Successfully Subscribed the Newsletter from The canvas Time. </h4>    
       
  
  ';

    $mail->Body   = $mailContent;
    $mail->send();



    if ($Numofrow = mysqli_num_rows($query_res) > 0) {
        echo 0;
    } else {
        $querytoInsert = "INSERT INTO `subscribers`(`email`) VALUES ('$email')";
        $querytoInsert_res = mysqli_query($conn, $querytoInsert);
        echo 1;
    }




?>