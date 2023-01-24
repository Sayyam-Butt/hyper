<?php include('cofig.php');
include("include/connection.php");
if (isset($_POST['submit'])) {
   $question = $_POST["question"];
   $answer = $_POST["answer"];
   $faqcatid = $_POST['faqcat'];
   $query = "INSERT INTO `faq`(`question`, `answer`,`faqcat_fid`) VALUES ('$question','$answer','$faqcatid')";
   $result = mysqli_query($conn, $query);
   if ($result) {
      $_SESSION['status'] = "Faq Added Successfully";
      header("location:allFaq.php");
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
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
               <!-- end page title -->
               <form action="#" method="post">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="cat">Category</label>
                                 <select name="faqcat" id="cat" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                        $queryforselect = "SELECT * FROM faqcategory";
                                        $queryforselect_res = mysqli_query($conn , $queryforselect);
                                        if(mysqli_num_rows($queryforselect_res)>0){
                                          while ($rowforselectcat = mysqli_fetch_assoc($queryforselect_res)) {
                                          ?>
                                                <option value="<?php echo $rowforselectcat['id']?>"><?php echo $rowforselectcat['catename']?></option>
                                          <?php
                                          }
                                        }
                                    ?>
                                    
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Question</label>
                                 <textarea class="form-control" required name="question" id="simpleinput"></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput1">Answer</label>
                           <textarea name="answer" id="simpleinput1" class="form-control" rows="5"></textarea>
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