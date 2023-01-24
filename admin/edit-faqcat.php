<?php include('cofig.php');
include("include/connection.php");
$faqcat_id = $_GET['id'];
if (isset($_POST['submit'])) {
  $faqcat = $_POST['faqcategory'];
  $query = "UPDATE `faqcategory` SET `catename`='$faqcat' WHERE id = '$faqcat_id'";
  $result = mysqli_query($conn,$query);
  if ($result) {
   $_SESSION['status'] = "Faq Category Updated Successfully";
   header("location:faqCategory.php");  
 }

}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("include/head.php")?>
      <title>Hyper | Add Faq </title>
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
                           <h4 class="page-title">Add New Faq </h4>
                        </div>
                     </div>
                  </div>
                  <?php
                    $queryforfaqcat = "SELECT * FROM faqcategory WHERE id = '$faqcat_id'";
                     $queryforfaqcat_res = mysqli_query($conn, $queryforfaqcat);
                     $rowforfaqcat = mysqli_fetch_assoc($queryforfaqcat_res);
                   $cat = $rowforfaqcat['catename'];
                  ?>
                  <!-- end page title -->   
                  <form action="#" method="post">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="form-group">
                                    <label for="simpleinput">Faq Category</label>
                                    <input type="text" name="faqcategory" value="<?php echo $cat ?>" class="form-control" required>
                                 </div> 
                                 <div>
                                    <input class="btn btn-primary"  type="submit" name="submit" value="Update">
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