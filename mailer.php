<?php
session_start();
include("include/connection.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $queryformessage = "INSERT INTO `contactmessage`( `name`, `email`, `message`) VALUES ('$username','$email','$message')";
    $resultformessage = mysqli_query($conn, $queryformessage);





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
    $mail->setfrom('buttsayyam630@gmail.com', 'Sayyam');
    $mail->addaddress('buttsayyam630@gmail.com');     // Add a recipient
    $mail->addreplyto($email);



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact us';

    $mailContent = '<h4 style="display:inline-block;">Name : </h4>   ' . $username . '   <br> 
       <h4 style="display:inline-block;">Email : </h4>   ' . $email . '   <br> 
       <h4 style="display:inline-block;">Message : </h4>   ' . $message . ' <br>  
  
  ';

    $mail->Body   = $mailContent;


    if ($mail->send()) {
        $_SESSION['status'] = "Your message has been sent";
        header("location:contact-us.php");
    } else {
        $_SESSION['status'] = "Something went wrong!";
        header("location:contact-us.php");
    }
}

?>