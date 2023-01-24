<?php
session_start();
include("include/connection.php");
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
    <div class="div sticky-top bg-white">
        <!-- ########### navbar ############### -->
        <?php include("include/navbar.php") ?>
    </div>

    <div class="container">
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php

            unset($_SESSION['status']);
        }
        ?>
        <div class="row py-4">
            <div class="col-md-6">
                <div class="pic">
                    <div class="pic-content  text-start align-middle">
                        <div class="text">
                            <?php
                            
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
                    <form action="mailer.php" method="post">
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

    <!-- ############# product section ########### -->
    <?php include("include/productsection.php") ?>
    <!-- ############# footer ########### -->
    <?php include("include/footer.php") ?>

</body>

</html>