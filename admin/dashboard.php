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

               <div style="margin-left:auto;" class="text-center w-50 py-3 alert alert-warning alert-dismissible fade show" role="alert">
               <?php
               include("include/connection.php");
               $query = "SELECT * FROM contactmessage WHERE status = 0";
               $query_res = mysqli_query($conn,$query);
               $num = mysqli_num_rows($query_res);
               if($num == 0){
                  $num = "No";
               }
               ?>
                 <h3><?php echo $num . " "?>New Message</h3> 
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