<?php include('cofig.php');

include 'include/admin_class.php';

$siteurl = new admin_class;

if (isset($_POST['submit'])) {
    include("include/connection.php");
    $catname = $_POST['category'];
    $url =$_POST['link'];
    $show = $_POST['show'];
    $siteurl->savesiteurl($url,'blogmaincategory');
    $sql1=" INSERT INTO `blogcategories`( `categories`,`shownavbar`,`caturl`) VALUES ('$catname','$show','$url')"; 
    $result = mysqli_query($conn , $sql1);
    header("location:blogs-categories.php?add=$result");
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("include/head.php")?>
      <title>Hyper | Add Category </title>
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
                           <h4 class="page-title">Add New Category </h4>
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
                                    <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" 
                                       value="" name="category" >
                                 </div> 
                                 <div class="form-group">
                                    <label for="simpleinput">Url</label>
                                    <input required type="text" id="sluggenrated"  class="form-control" 
                                       value="" name="link" >
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">Show on Navbar</label>
                                    <select name="show" class="form-control" required>
                                       <option value="">Select</option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div> 

                                 <div>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add">
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
      <?php include("include/script.php")?>
   </body>
</html>