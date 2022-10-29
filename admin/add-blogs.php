<?php include('cofig.php');
   if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $category = $_POST['category'];
      $disc = $_POST['discription'];
      $date = date("d M Y");
      include("include/connection.php");
      $query = "INSERT INTO `blogs`(`title`, `blogcategories`, `discription`, `post_date`) VALUES ('$title ',' $category','$disc',' $date');";
      $query .="UPDATE blogcategories SET post=post+1 WHERE blogs_id=$category ";
      mysqli_multi_query($conn , $query);
      header("location:all-blogs.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper |  Add Blog </title>
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
                           <h4 class="page-title">Add Blog </h4>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->   
                  <form action="#" method="post">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="form-group">
                                    <label for="simpleinput">Title</label>
                                    <input type="text" id="simpleinput" required class="form-control" 
                                       value="" name="title" >
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">Category</label>
                                    <select name="category" id="simpleinput" class="form-control" required>
                                        <option >Select Category</option>
                                        <?php
                                            include("include/connection.php");

                                            $sql = "SELECT * FROM blogcategories";
                                            $result = mysqli_query($conn , $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while ( $row =  mysqli_fetch_assoc($result)) {
                                                    echo'<option value="'.$row['blogs_id'].'" >'.$row["categories"].'</option>';
                                                }
                                            }
                                        ?> 
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="example-textarea">Description</label>
                                    <textarea class="form-control" name="discription" id="example-textarea" rows="5" ></textarea>
                                 </div>
                                 <div>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Save">
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