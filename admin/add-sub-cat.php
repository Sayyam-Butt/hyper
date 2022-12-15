<?php include('cofig.php');
if (isset($_POST['submit'])) {
    include("include/connection.php");
    $cat_id = $_POST['cat_id'];
    $sub_cat = $_POST['subcategory'];
    $url=$_POST['link'];
    $result = "INSERT INTO `subcategories`(`cat_id`, `name`,`subcaturl`) VALUES ('$cat_id','$sub_cat','$url')";
    $run=mysqli_query($conn,$result);
    header("location:Sub-category.php?add=$run");
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
                              <div class="form-group"> 
                                    <label for="slcat">Select Category</label>
                                    <select name="cat_id" id="slcat" class="form-control" required>
                                       <option value="">Select Category</option>
                                    <?php 
                                       $query = "SELECT * FROM blogcategories";
                                       $result = mysqli_query($conn,$query);
                                       if(mysqli_num_rows($result)>0){
                                          while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                       <option value="<?php echo $row['blogs_id']?>"><?php echo $row['categories'] ?></option>
                                       <?php 
                                      }}
                                    ?>
                                    </select>
                                   
                                 </div> 
                              </div>
                           </div>
                       
                           <div class="card">
                              <div class="card-body">
                                 <div id="items" class="form-group">
                                    <label for="textinput">Sub Category Name</label>
                                    <input  onkeyup="createurl(this.value)" type="text" id="textinput" required class="form-control " 
                                       value="" name="subcategory" >
                                 </div> 
                                 <div class="form-group">
                                    <label for="simpleinput">Url</label>
                                    <input required type="text" id="sluggenrated"  class="form-control" 
                                       value="" name="link" >
                                 </div>
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
      <?php include("include/script.php")?>
     
   </body>
</html>