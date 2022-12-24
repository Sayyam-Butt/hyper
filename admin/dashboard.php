<?php include('cofig.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

   <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
   <?php include("include/head.php") ?>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
   <?php include('include/navbar.php'); ?>
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
                        <h4 class="page-title">Dashboard</h4>
                     </div>
                  </div>
               </div>

               <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  Saad has send you a message.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>

               <!-- end page title -->
            </div>
            <!-- End Content -->

         </div>
         <!-- content-page -->
      </div>
      <!-- end wrapper-->
   </div>
   <!-- END Container -->
   <?php include("include/script.php") ?>

</body>

</html>