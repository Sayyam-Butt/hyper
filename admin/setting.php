<?php 
   include('cofig.php'); 
   include("include/connection.php");
   if (isset($_POST['info-submit'])) {
       $id =$_SESSION["id"]; 
       $name = $_POST['name'] ;
       $email =  $_POST['example-email'];
       $mobile = $_POST['example-number'] ;
       $aboutme =  $_POST['aboutme'];
       $sql= "UPDATE `users` SET `email`='$email',`name`='$name',`number`='$mobile' ,`aboutme`='$aboutme'  WHERE id = $id";
       $result = mysqli_query($conn, $sql);
       if(!empty($result)) {
        $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Information Updated Sucessfully !!!</div>";
       }
   }
   if (isset($_POST['submit-pass'])) {  
       $pass = $_POST['old-pass'];
       $newpass = $_POST['new-pass'];
       $conpass = $_POST['conf-pass'];
       $id =$_SESSION["id"]; 
       $query = "SELECT * FROM `users` WHERE id = $id ";
       $chg_pwd=mysqli_query($conn , $query);
       $chg_pwd1=mysqli_fetch_assoc($chg_pwd);
       $data_pwd=$chg_pwd1['password'];
       if($data_pwd==$pass){
           if($newpass==$conpass){
               $sql="UPDATE users SET password='$newpass' where  id=$id";
               $update_pwd= mysqli_query($conn , $sql);
               $change_pwd_error = "<div class='alert alert-success alert-dismissible p-2'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               Updated Sucessfully !!!</div>";
           }
           else{
           $change_pwd_error = "<div class='alert alert-danger alert-dismissible p-2'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
           Your new and Retype Password does not match !!!</div>";
           }
       }
       else{
           $change_pwd_error = "<div class='alert alert-danger alert-dismissible p-2'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
           Old password is incorrect !!!</div>";
       }
   } 
   if (isset($_POST['img-submit'])) {
       $files = $_FILES['profile'];
       $id =$_SESSION["id"]; 
       $filename = $files['name'];
       $fileerror = $files['error'];
       $filetmp = $files['tmp_name'];
       $fileext = explode('.',$filename);
       $filecheck = strtolower(end( $fileext ));
       $fileextstored = array('png','jpg','jpeg');
       if(in_array($filecheck,$fileextstored)){
           $destinationfile = 'upload/'.$filename; 
           move_uploaded_file($filetmp,$destinationfile);
       }
       $sql = " UPDATE `users` SET `profile`='$destinationfile' WHERE id = $id" ;
       $result = mysqli_query($conn, $sql);
       }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Settings | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
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
   <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
      <?php include("include/navbar.php")?>
      <!-- Start Content-->
      <div class="container-fluid">
         <!-- Begin page -->
         <div class="wrapper">
            <?php include('include/sidebar.php'); ?>
            <div class="content-page">
               <div class="content">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box">
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="dashboard.php">Hyper</a></li>
                                 <li class="breadcrumb-item active">Settings</li>
                              </ol>
                           </div>
                           <h4 class="page-title">Update Information</h4>
                        </div>
                     </div>
                  </div>
                  <!-- end page title --> 
                  <form action="#" method="post">
                     <div class="row">
                        <div class="col-12">
                           <?php 
                              if (isset($change_pwd_error)) {
                                 echo $change_pwd_error;
                              }
                              if (isset($info_alert)) {
                                 echo $info_alert;
                              }

                              ?>
                           <div class="card">
                              <div class="card-body">
                                 <h4 class="page-title mb-4">Personal Information</h4>
                                 <?php
                                    $id =$_SESSION["id"]; 
                                    $sql =  "SELECT * FROM `users` WHERE id = $id ";
                                    $result = mysqli_query($conn , $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while ( $row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                 <div class="form-group">
                                    <label for="simpleinput">Name</label>
                                    <input type="text" id="simpleinput" required class="form-control" 
                                       value="<?php echo $row['name'] ?>" name="name" >
                                 </div>
                                 <div class="form-group">
                                    <label for="example-email">Email</label>
                                    <input type="email" id="example-email" required name="example-email" class="form-control" value="<?php echo $row['email'] ?>" >
                                 </div>
                                 <div class="form-group">
                                    <label for="example-number">Mobile</label>
                                    <input type="tel"   id="example-number" required name="example-number" class="form-control mask-telefone"  value="<?php echo $row['number'] ?>" >
                             
                                 </div>
                                 <div class="form-group">
                                    <label for="example-textarea">About me</label>
                                    <textarea class="form-control" name="aboutme" id="example-textarea" rows="5" ><?php echo $row['aboutme'] ?></textarea>
                                 </div>
                                 <?php
                                     }
                                    }
                                    ?>
                                 <div>
                                    <input class="btn btn-primary" type="submit" name="info-submit" value="Update">
                                 </div>
                              </div>
                              <!-- end card-body -->
                           </div>
                           <!-- end card -->
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end row -->
                  </form>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="page-title mb-2">Upload Profile</h4>
                              <div class="form-group">
                                 <input  accept="image/png, image/gif, image/jpeg" type="file" id="example-fileinput" required name="profile" class="form-control">
                              </div>
                              <div>
                                 <input class="btn btn-primary" type="submit" name="img-submit" value="Update">
                              </div>
                           </div>
                           <!-- end card-body -->
                        </div>
                        <!-- end card -->
                     </div>
                     <!-- end col -->
                  </div>
                  <!-- end row -->  
               </form>  
                  <form action="" method="post">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                 <h4 class="page-title mb-4">Change Password</h4>
                                 <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <div class="input-group input-group-merge">
                                       <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="old-pass">
                                       <div class="input-group-append" data-password="false">
                                          <div class="input-group-text">
                                             <span class="password-eye"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="password">New Password</label>
                                    <div class="input-group input-group-merge">
                                       <input type="password" id="password" class="form-control" placeholder="Enter your password" required  name="new-pass">
                                       <div class="input-group-append" data-password="false">
                                          <div class="input-group-text">
                                             <span class="password-eye"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                       <input type="password" id="password" class="form-control" placeholder="Enter your password" required  name="conf-pass">
                                       <div class="input-group-append" data-password="false">
                                          <div class="input-group-text">
                                             <span class="password-eye"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <input class="btn btn-primary" type="submit" name="submit-pass" value="Update">
                              </div>
                           </div>
                           <!-- end card-body -->
                        </div>
                        <!-- end card -->
                     </div>
                     <!-- end col -->
               </div>
               <!-- end row -->
               </form>         
            </div>
            <!-- End Content -->
         </div>
         <!-- content-page -->
      </div>
      <!-- end wrapper-->
      </div>
      <!-- END Container -->
      <!-- bundle -->
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/js/app.min.js"></script>
      <script>
      $(document).ready(function () {
        $('#example-number').mask('(00)00000-0000');
    });
      </script>
   </body>
</html>