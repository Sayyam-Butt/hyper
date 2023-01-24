<?php include('cofig.php');
if (isset($_POST['submit'])) {
   include("include/connection.php");
   $catname = trim($_POST['category']);
   $cat_id = $_GET['blogs_id'];
   $shownav = $_POST['show'];
   $link = $_POST['link'];
   $meta_title = $_POST['meta_title'];
   $meta_desc = $_POST['meta_desc'];
   $meta_keyword = $_POST['meta_keyword'];
   $sql1 = " UPDATE `blogcategories` SET `categories`='$catname',`caturl`='$link',`shownavbar`='$shownav',`meta_title`='$meta_title',`meta_desc`='$meta_desc',`meta_keyword`='$meta_keyword' WHERE blogs_id = $cat_id";
   $result = mysqli_query($conn, $sql1);
   if ($result) {
		$_SESSION['status'] = "Category Updated Successfully";
      header("location:blogs-categories.php");
	}
  

   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Hyper | Edit Category </title>
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
                                 $result = mysqli_query($conn, $sql);
                                 if (mysqli_num_rows($result) > 0) {
                                    while ($row =  mysqli_fetch_assoc($result)) {
                                 ?>
                                       <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" value="<?php echo $row['categories'] ?>" name="category">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Url</label>
                                 <input required type="text" id="sluggenrated" class="form-control" value="<?php echo $row['caturl'] ?>" name="link">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Show on Navbar</label>
                                 <select name="show" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                       $check = $row['shownavbar'];

                                    ?>
                                    <option <?php
                                             if ($check == 'Yes') {
                                                echo "selected";
                                             }
                                             ?> value="Yes">Yes</option>
                                    <option <?php
                                             if ($check == 'No') {
                                                echo "selected";
                                             }
                                             ?> value="No">No</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="metaTitle">Meta Title</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="input2" class="form-control" name="meta_title" value="<?php echo $row['meta_title']?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metadisc">Meta Description</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="tel" id="metadisc" class="form-control" name="meta_desc" value="<?php echo $row['meta_desc']?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metaTag">Meta Keyword</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="metaTag" class="form-control" name="meta_keyword" value="<?php echo $row['meta_keyword']?>">
                                    
                                 </div>
                              </div>
                        <?php

                                    }
                                 } ?>
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
   <?php include("include/script.php") ?>

</body>

</html>