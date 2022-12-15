<?php include('cofig.php');
if (isset($_POST['submit'])) {
    include("include/connection.php");
    $subcat_name = $_POST['sub-category'];
    $sub_id = $_GET['id'];
    $sql1 = " UPDATE `subcategories` SET `name`='$subcat_name' WHERE id = $sub_id"; 
    $result = mysqli_query($conn , $sql1);
   
    header("location:Sub-category.php?edit=$result");
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include("include/head.php")?>
      <title>Hyper |  Edit Category </title>
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
                                        $sub_id = $_GET['id'];
                                        $sql = "SELECT * FROM subcategories WHERE id = $sub_id";
                                        $result = mysqli_query($conn , $sql);
                                        if(mysqli_num_rows($result) > 0){
                                            while ( $row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                    <input type="text" id="simpleinput" required class="form-control" 
                                       value="<?php echo $row['name']?>" name="sub-category" >
                                       
                                 </div>          
                                 <?php
                                 
                                            }}?>  
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
      <?php include("include/script.php")?>
     
   </body>
</html>