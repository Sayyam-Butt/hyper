<?php include('cofig.php');
if (isset($_POST['submit'])) {
    include("include/connection.php");
    $catname = $_POST['category'];
    $cat_id = $_GET['blogs_id'];
    $sql1 = " UPDATE `blogcategories` SET `categories`='$catname' WHERE blogs_id = $cat_id"; 
    $result = mysqli_query($conn , $sql1);
    
    
    header("location:blogs-categories.php");
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper |  Edit Category </title>
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
                           <h4 class="page-title">Edit Blog Category </h4>
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
                                    <label for="simpleinput">Category Name</label>
                                    <?php
                                        include("include/connection.php");
                                        $cat_id = $_GET['blogs_id'];
                                        $sql = "SELECT * FROM blogcategories WHERE blogs_id = $cat_id";
                                        $result = mysqli_query($conn , $sql);
                                        if(mysqli_num_rows($result) > 0){
                                            while ( $row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                    <input type="text" id="simpleinput" required class="form-control" 
                                       value="<?php echo $row['categories']?>" name="category" >
                                       
                                 </div>          
                                 <div class="form-group">
                                    <label for="simpleinput">Sub categories</label>
                                    <select name="subcategory[]" id="simpleinput" class="form-control-file
                                     js-example-basic-multiple"  multiple="multiple" required>
                                     <?php
                                            
                                            
                                            $subcatname = explode(",", $row1['subcategory']);
                                            $sql1 = "SELECT * FROM sub";
                                            $result1 = mysqli_query($conn , $sql1);
                                            if(mysqli_num_rows($result1) > 0){
                                                while ( $row1 =  mysqli_fetch_assoc($result1)) { 
                                                   
                                                   ?>
                                                    <option  
                                                    <?php  
                                                      foreach ($subcatname as $value) {
                                                         if ($value == $row1['subcategory']) {
                                                            echo "selected";
                                                         }
                                                      }
                                                
                                                    ?>
                                                    value="<?php echo $row1['subcategory']; ?>"><?php
                                                     echo $row1['subcategory']; ?></option>
                                                <?php 
                                            
                                        ?> 
                                    </select>
                                    <?php 
                                     } }
                                            
                                    ?>

                                    <?php 
                                     } }
                                            
                                    ?>
                                 </div>         
                                 <div>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update">
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
        <!-- Select2 -->
        <script>
         $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
          });
      </script>
   </body>
</html>