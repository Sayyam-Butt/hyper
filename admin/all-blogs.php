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
      <style>
         #pagination {
               margin: 0;
               padding: 0;
               text-align: center
               }
         #pagination li {
               display: inline
               }
         #pagination li a {
               display: inline-block;
               text-decoration: none;
               padding: 4px 8px;
               color: #000;
               font-size:10px;
               }
         #pagination li a {
               border-radius: 5px;
               -webkit-transition: background-color 0.3s;
               transition: background-color 0.3s;
               background-color: #e7e7e7; 
               }
               #pagination li a.active {
               background-color: #323a46;
               color: #fff
               }
               #pagination li a:hover:not(.active) {
               background-color: #b1aeae;
               } 
      </style>
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
                        <div class="card">
                              <div class="card-body">
                        <table class="table table-hover">
                           <thead class="thead-dark">
                           <tr>
                              <th>SN</th>
                              <th>Image</th>
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
                           $limit = 5;
                           if (isset($_GET['page'])) {
                              $page= $_GET['page'];
                           }
                           else{
                              $page=1;
                           }
                           $offset=($page-1)*$limit;
                           $sql = "SELECT * FROM blogs  INNER JOIN blogcategories ON blogs.blogcategories = blogcategories.blogs_id LIMIT $offset,$limit ";
                           $result = mysqli_query($conn , $sql);
                           if(mysqli_num_rows($result) > 0){
                              $a=1;
                              while ( $row =  mysqli_fetch_assoc($result)) {
                           ?>
                           <tr>
                              <td class="align-middle"><?php echo$a;?> </td>
                              <td class="align-middle"><img style="width:70px;height:70;border-radius:2px;" src="<?php echo $row['img']?>"> </td>
                              <td class="align-middle"><?php echo $row["title"]?></td>
                              <td class="align-middle"><?php echo $row["categories"]?></td>
                              <td class="align-middle"><?php echo $row["post_date"]?></td>
                              <td class="align-middle"><a style="color:grey;" href="edit-blog.php?id=<?php echo $row["id"]?>"> <i class='far fa-edit'></i></a></td>
                              <td class="align-middle"><a style="color:grey;"  href="delete-blog.php?id=<?php echo $row["id"]?>&cat_id=<?php echo $row["blogs_id"];?>"><i class='fas fa-trash'></i></a></td>
                           </tr>
                           <?php $a++; }} ?>
                           </tbody>
                           </table>
                           <?php
                                include("include/connection.php");
                                $query = "SELECT * FROM blogs";
                                $run = mysqli_query($conn , $query);
                                if (mysqli_num_rows($run)) {
                                  $total_records = mysqli_num_rows($run);
                                  $total_pages = ceil($total_records/$limit);
                               
                           ?>
                           <ul id="pagination">
                              <?php
                                 for ($i=1; $i <= $total_pages  ; $i++) { 
                                    if ($i==$page) {
                                       $active="active";
                                    }
                                    else{
                                       $active="";
                                    }
                              ?>
                              <li><a class="<?php echo$active ?>" href="all-blogs.php?page=<?php echo$i?>"><?php echo $i?></a></li>
                             
                              <?php
                                 }
                              }
                              ?>
                               </ul> 
                     </div>
                  </div>
                  <!-- end page title -->    
               </div>
               <!-- End Content -->
               </div>
                  </div>
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