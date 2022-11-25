<?php include('cofig.php');  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Profile | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
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
      <?php include("include/navbar.php") ?>
      <!-- Start Content-->
      <div class="container-fluid">
      <!-- Begin page -->
      <div class="wrapper">
         <?php include("include/sidebar.php") ?>
         <div class="content-page">
            <div class="content">
               <!-- start page title -->
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box">
                        <div class="page-title-right">
                           <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="dashboard.php">Hyper</a></li>
                              <li class="breadcrumb-item active">Profile</li>
                           </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                     </div>
                  </div>
               </div>
               <!-- end page title --> 
               <div class="row">
                  <div class="col-sm-12">
                     <!-- Profile -->
                     <div class="card bg-primary">
                        <div class="card-body profile-user-box">
                           <div class="row">
                              <div class="col-sm-8">
                                 <?php
                                    $id =$_SESSION["id"]; 
                                    $sql =  "SELECT * FROM `users` WHERE id = $id ";
                                    $result = mysqli_query($conn , $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while ( $row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                 <div class="media align-items-center">
                                    <span class="float-left m-2 mr-4">
                                    <?php if (!empty($row['profile'])) {  ?>
                                      <img src="<?php echo $row['profile']; ?>" alt="user-image" height="42" style="height: 100px;"  class="rounded-circle img-thumbnail shadow-sm">
                                    <?php  } else {   ?>
                                      <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" style="height: 100px;"  class="rounded-circle shadow-sm img-thumbnail ">
                                    <?php } ?>
                                    </span>
                                    <div class="media-body">
                                       <h4 class="mt-1 mb-1 text-white"><?php echo $row["name"]; ?></h4>
                                       <p class="font-13 text-white-50">Admin</p>
                                    </div>
                                    <!-- end media-body-->
                                 </div>
                              </div>
                              <!-- end col-->
                              <div class="col-sm-4">
                                 <div class="text-center mt-3 text-sm-right">
                                    <a type="button" href="setting.php" class="btn btn-light">
                                    <i class="mdi mdi-account-edit mr-1"></i> Edit Profile
                                    </a>
                                 </div>
                              </div>
                              <!-- end col-->
                           </div>
                           <!-- end row -->
                        </div>
                        <!-- end card-body/ profile-user-box-->
                     </div>
                     <!--end profile/ card -->
                  </div>
                  <!-- end col-->
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-lg-12">
                     <!-- Personal-Information -->
                     <div class="card">
                        <div class="card-body">
                           <h4 class="header-title mt-0 mb-3">Admin Information</h4>
                           <p class="text-muted font-13">
                              <?php echo $row["aboutme"]; ?>
                           </p>
                           <hr/>
                           <div class="text-left">
                              <p class="text-muted"><strong>Full Name :</strong> <span class="ml-2"><?php echo $row["name"]; ?></span></p>
                              <p class="text-muted"><strong>Mobile :</strong><span class="ml-2"><?php echo $row["number"]?></span></p>
                              <p class="text-muted"><strong>Email :</strong> <span class="ml-2"><?php echo $row["email"]; ?></span></p>
                           </div>
                        </div>
                     </div>
                     <?php
                         }
                        }
                      ?>
                  </div>
                  <!-- end col-->
                  <!-- end row -->
               </div>
               <!-- End Content -->
            </div>
            <!-- content-page -->
         </div>
         <!-- end wrapper-->
      </div>
      <!-- END Container -->
      <?php include("include/script.php")?>
     
   </body>
</html>