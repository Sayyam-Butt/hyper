<?php include('cofig.php');
if (isset($_POST['submit'])) {
   include("include/connection.php");
   $tagname = trim($_POST['tag']);
   $tagurl = $_POST['link'];
   $meta_title = $_POST['meta_title'];
   $meta_desc = $_POST['meta_desc'];
   $meta_keyword = $_POST['meta_keyword'];

   $querytocheck = "SELECT * FROM tags WHERE tagname = '$tagname'";
   $querytocheck_res = mysqli_query($conn,$querytocheck);
   if(mysqli_num_rows($querytocheck_res)>0){
      $_SESSION['check']="Tag Already Exits!!";
      header("location:blogs-tags.php");
   }else{
      $sql1 = "INSERT INTO `tags`(`tagname`, `tagurl`,`meta_title`,`meta_desc`,`meta_keyword`) VALUES ('$tagname','$tagurl','$meta_title','$meta_desc','$meta_keyword')";
   $result = mysqli_query($conn, $sql1);
   if ($result) {
		$_SESSION['status'] = "Tag Added Successfully";
      header("location:blogs-tags.php");
   	}

   
   }  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Hyper | Add Tag </title>

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
                        <h4 class="page-title">Add New Tag </h4>
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
                                 <label for="simpleinput">Tag Name</label>
                                 <input type="text" onkeyup="createurl(this.value)" id="simpleinput" required class="form-control" value="" name="tag">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Url</label>
                                 <input required type="text" id="sluggenrated" class="form-control" value="" name="link">
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
   <?php include("include/script.php") ?>

</body>

</html>