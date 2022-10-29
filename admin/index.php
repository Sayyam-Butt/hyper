<?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        header("Location:dashboard.php");
    }
     if(isset($_POST['login'])){
         include("include/connection.php");
         $admin_email = $_POST['email'];
         $admin_password = $_POST['password'];  
         $sql =  "SELECT * FROM `users` WHERE `email`='$admin_email' AND `password`='$admin_password' ";  
         $result = mysqli_query($conn , $sql);
         if(mysqli_num_rows($result) > 0){
                while ( $row =  mysqli_fetch_assoc($result)) {
                    $_SESSION["id"] =  $row['id'];
                   
                    header("Location:dashboard.php");
                }
            }
            else {
                $alerterror =  '<div class = "alert alert-danger"> Username and Password is incorrect</div>';	
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    </head>
    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.php">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>
                            <div class="card-body p-4">
                                <?php 
                                    if(isset($alerterror))
                                    {
                                        echo $alerterror;
                                    }
                                    ?>
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <input type="submit" href="" class="btn btn-primary"  name="login" Value="Login"> 
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>