<?php
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
    $mail->Password = 'omnigbetnxgyoqnr';                          // SMTP password
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
    $mail->send();


    header("location:contact-us.php");
}

?>

<html lang="en">

<head>
    <?php include("include/head.php") ?>
    <title>Contact us</title>

</head>

<body>

    <!-- ######## top-bar ######### -->
    <?php include("include/topbar.php") ?>
    <!-- ########### navbar ############### -->
    <?php include("include/navbar.php") ?>

    <div class="container">
        <div class="row py-4">
            <div class="col-md-6">
                <div class="pic">
                    <div class="pic-content  text-start align-middle">
                        <div class="text">
                            <?php
                            include("include/connection.php");
                            $query = "SELECT * FROM site_setting";
                            $run = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($run)) {
                            ?>
                                <i class="d-inline-block fa-solid fa-location-dot fa-2x me-2" style="color:#da5b37;"></i>
                                <h2 class="d-inline-block">Address</h2>
                                <p class="mb-1"><?php echo $row['address'] ?></p>
                                <i class="d-inline-block fa-solid fa-square-phone fa-2x me-2" style="color:#da5b37;"></i>
                                <h2 class="d-inline-block">Lets Talk</h2>
                                <p><?php echo $row['contactnum'] ?></p>

                                <i class="d-inline-block  fa-solid fa-envelope fa-2x me-2" style="color:#da5b37;"></i>
                                <h2 class="d-inline-block">General Support</h2>
                                <p><?php echo $row['email'] ?></p>
                        </div>
                    <?php
                            }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-2">
                    <form method="post">
                        <h1 class="" style="color:#da5b37;">Contact Us</h1>
                        <label class="form-label pt-1 " for="">Username:</label>
                        <input class="form-control " required type="text" name="username" id="" placeholder="Jhon">
                        <label class="form-label pt-1 " for="">Email:</label>
                        <input class="form-control " required type="text" name="email" id="" placeholder="abc@gmail.com">
                        <label class="form-label pt-1 " for="">Massage:</label>
                        <textarea name="message" id="" cols="30" class="form-control " required rows="8" placeholder="Type here..."></textarea>
                        <button class="btn btn mt-4" name="submit" style="background-color:#da5b37; color:white;">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>