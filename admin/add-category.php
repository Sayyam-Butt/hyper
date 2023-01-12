<?php include('cofig.php');

include 'include/admin_class.php';

$siteurl = new admin_class;
$msgerror ="";
if (isset($_POST['submit'])) {
   include("include/connection.php");
   $catname = trim($_POST['category']);

   $url = $_POST['link'];
   $show = $_POST['show'];
   $meta_title = $_POST['meta_title'];
   $meta_desc = $_POST['meta_desc'];
   $meta_keyword = $_POST['meta_keyword'];
   $siteurl->savesiteurl($url, 'blogmaincategory');

   $querytocheck = "SELECT * FROM blogcategories WHERE categories = '$catname'";
   $querytocheck_res = mysqli_query($conn,$querytocheck);
   if(mysqli_num_rows($querytocheck_res)>0){
      $_SESSION['check']="Category Already Exits!!";
      header("location:blogs-categories.php");
   }else{
      $sql1 = " INSERT INTO `blogcategories`( `categories`,`shownavbar`,`caturl`,`meta_title`,`meta_desc`,`meta_keyword`) VALUES ('$catname','$show','$url','$meta_title','$meta_desc','$meta_keyword')";
      $result = mysqli_query($conn, $sql1);
      if ($result) {
	    	$_SESSION['status'] = "Category Added Successfully";
         header("location:blogs-categories.php");
	   }
   }
   
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
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
               <form  method="post">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="simpleinput">Category Name</label>
                                 <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" value="" name="category">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Url</label>
                                 <input required type="text" id="sluggenrated" class="form-control" value="" name="link">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Show on Navbar</label>
                                 <select name="show" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="metaTitle">Meta Title</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="input2" class="form-control" name="meta_title" value="">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metadisc">Meta Description</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="tel" id="metadisc" class="form-control" name="meta_desc" value="">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metaTag">Meta Keyword</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="metaTag" class="form-control" name="meta_keyword" value="">
                                 </div>
                              </div>

                              <div>
                                 <input class="btn btn-primary" type="submit" name="submit" value="Add"><br>
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