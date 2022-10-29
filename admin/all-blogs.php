<?php include('cofig.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper |  Blogs </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- third party css -->
      <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <!-- third party css end -->
      <!-- App css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
      <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
                        <div class="page-title-right">
                           <a class="btn btn-primary" href="add-blogs.php">Add Blog</a>
                        </div>
                           <h4 class="page-title">Blogs </h4>
                        </div>
                        
                        <table class="table table-striped">
                           <thead>
                           <tr>
                              <th>SN</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Date</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                           include("include/connection.php");

                           $sql = "SELECT * FROM blogs INNER JOIN blogcategories ON blogs.blogcategories = blogcategories.blogs_id ";
                           $result = mysqli_query($conn , $sql);
                           if(mysqli_num_rows($result) > 0){
                              $a=1;
                              while ( $row =  mysqli_fetch_assoc($result)) {
                           ?>
                           <tr>
                              <td><?php echo$a;?> </td>
                              <td><?php echo $row["title"]?></td>
                              <td><?php echo $row["categories"]?></td>
                              <td><?php echo $row["post_date"]?></td>
                              <td><a style="color:grey;" href="edit-blog.php?id=<?php echo $row["id"];?>"> <i class='far fa-edit'></i></a></td>
                              <td><a style="color:grey;"  href="delete-blog.php?id=<?php echo $row["id"];?>"><i class='fas fa-trash'></i></a></td>
                           </tr>
                           
                           <?php $a++; }} ?>
                           </tbody>
                           </table>
                     </div>
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
      <!-- bundle -->
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/js/app.min.js"></script>
      <!-- third party js -->
      <script src="assets/js/vendor/apexcharts.min.js"></script>
      <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
      <!-- third party js ends -->
      <!-- demo app -->
      <script src="assets/js/pages/demo.dashboard.js"></script>
      <!-- end demo js-->
   </body>
</html>