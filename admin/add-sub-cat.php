<?php include('cofig.php');
if (isset($_POST['submit'])) {
    include("include/connection.php");
    $cat_id = $_GET['id'];
    $subcat=implode(",",$_POST['subcategory']);
    $result = "INSERT INTO `sub`(`cat_id`, `subcategory`) VALUES ('$cat_id','$subcat')";
    mysqli_query($conn,$result);
    header("location:blogs-categories.php");
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper | Add Category </title>
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
                           <h4 class="page-title">Add Sub Category </h4>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->   
                  <form action="#" method="post">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                
                                 <div id="items" class="form-group">
                                    <label for="textinput">Sub Category Name</label>
                                    <input type="text" id="textinput" required class="form-control " 
                                       value="" name="subcategory[]" >
                                 </div> 
                                 <button id="add" class="btn btn-success add-more button-yellow uppercase" type="button">Add more</button> 
                                 <button id="del" class="delete btn button-white btn-danger uppercase" onclick="deleteimnput">Delete </button>
                                 <div>
                                    <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit">
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
      <script>
        $(document).ready(function() {
        $(".delete").hide();
        //when the Add Field button is clicked
        $("#add").click(function(e) {
            $(".delete").fadeIn("1500");
            //Append a new row of code to the "#items" div
            $("#items").append(
            '<div class="next-referral  mt-2"><input id="textinput" name="subcategory[]" type="text"  class="form-control input-md"></div>'
            );
        });
        $("body").on("click", ".delete", function(e) {
            $(".next-referral").last().remove();
        });
        });

      </script>
   </body>
</html>