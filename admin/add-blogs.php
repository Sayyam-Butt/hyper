<?php include('cofig.php');
include("include/connection.php");
if (isset($_POST['submit'])) {
   $title = $_POST['title'];
   $category = $_POST['category'];
   $subcat = $_POST['sub-cat'];
   $tag = implode(",", $_POST['tags']);
   $content = $_POST['content'];
   $disc = $_POST['discription'];
   $url = $_POST['link'];
   $date = date("d M Y");

   $meta_title = mysqli_escape_string($conn,$_POST['meta_title']);
   $meta_desc = mysqli_escape_string($conn,$_POST['meta_disc']);
  echo $meta_keyword = mysqli_escape_string($conn,$_POST['meta_keyword']);
   
   $trending = $_POST['trend'];
   $highlight = $_POST['highlight'];
   // $sectionOne = $_POST['section-one'];
   // $querysectionOne="SELECT section_one FROM blogs";
   // $resultsectionOne = mysqli_query($conn,$querysectionOne);

   // $sectionTwo = $_POST['section-two'];
   // $querysectionTwo="SELECT section_two FROM blogs";
   // $resultsectionTwo = mysqli_query($conn,$querysectionTwo);

   $section = $_POST['section'];
   $files = $_FILES['img'];
   $filename = $files['name'];
   $fileerror = $files['error'];
   $filetmp = $files['tmp_name'];
   $fileext = explode('.', $filename);
   $filecheck = strtolower(end($fileext));
   $fileextstored = array('png', 'jpg', 'jpeg');
   if (in_array($filecheck, $fileextstored)) {
      $destinationfile = 'upload/' . $filename;
      move_uploaded_file($filetmp, $destinationfile);
   }
   // if (mysqli_num_rows($resultsectionOne)>1) {
   //    $alert1 = "<div class='alert alert-success alert-dismissible p-2'>
   //    <button type='button' class='close' data-dismiss='alert'>&times;</button>
   //    Section 1 is Filled </div>";
   // }
   // if (mysqli_num_rows($resultsectionTwo)>1) {
   //    $alert2 = "<div class='alert alert-success alert-dismissible p-2'>
   //    <button type='button' class='close' data-dismiss='alert'>&times;</button>
   //    Section 2 is Filled </div>";
   //  } else{


   $name = $_FILES['video']['name'];
   $target_dir = "upload video/";
   $target_file = $target_dir . $_FILES["video"]["name"];

   // Select file type
   $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


   // Upload
   move_uploaded_file($_FILES['video']['tmp_name'], $target_file);


   $query = "INSERT INTO `blogs`(`title`, `blogcategories`, `subcategory`,`discription`,`content`, `post_date`,`tagname`,`pageurl`,`img`,`video`,`section`,`trending`,`highlight`,`meta_title`, `meta_desc`, `meta_keyword`) VALUES ('$title ',' $category','$subcat','$disc','$content',' $date','$tag','$url','$destinationfile','$target_file','$section','$trending','$highlight','$meta_title','$meta_desc','$meta_keyword');";
   $query .= "UPDATE blogcategories SET post=post+1 WHERE blogs_id=$category ;";
   $query_run =  mysqli_multi_query($conn, $query);
   header("location:all-blogs.php?add=$query_run");
   // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Hyper | Add Blog </title>
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
                        <h4 class="page-title">Add Blog </h4>
                     </div>
                  </div>
               </div>
               <!-- end page title -->
               <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <?php
                        //  if (isset($alert1)) {
                        //    echo $alert1;
                        // }
                        // if (isset($alert2)) {
                        //    echo $alert2;
                        // }
                        ?>
                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="simpleinput1">Name</label>
                                 <input onkeyup="createurl(this.value)" type="text" id="simpleinput1" required class="form-control" value="" name="title">
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Url</label>
                                 <input required type="text" id="sluggenrated" class="form-control" value="" name="link">
                              </div>
                              <div class="form-group">
                                 <label for="CATEGORY-DROPDOWN">Category</label>
                                 <select name="category" required class="form-control" id="category-dropdown">
                                    <option value="">Select Category</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM blogcategories");
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                       <option value="<?php echo $row['blogs_id']; ?>"><?php echo $row["categories"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="SUBCATEGORY">Sub Category</label>
                                 <select  name="sub-cat" class="form-control" id="sub-category-dropdown">
                                    <option value="">Select Sub Category</option>
                                 </select>
                              </div>


                              <div class="form-group">
                                 <label for="example-textarea"> Description</label>
                                 <textarea required class="form-control " name="discription" id="" rows="3"></textarea>
                              </div>

                              <div class="form-group">
                                 <label for="example-textarea"> Content</label>
                                 <textarea required class="form-control" name="content" id="summernote-basic" rows="10"></textarea>
                              </div>

                              <div class="form-group">
                                 <label for="simpleinput2"> Tags</label>
                                 <select name="tags[]" id="simpleinput2" class="form-control-file
                                     js-example-basic-multiple" multiple="multiple" required>
                                    <?php
                                    include("include/connection.php");
                                    $sql1 = "SELECT * FROM tags";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row1 =  mysqli_fetch_assoc($result1)) {
                                          echo '<option value="' . $row1['tagname'] . '" >' . $row1["tagname"] . '</option>';
                                       }
                                    }
                                    ?>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label for="simpleinput3">Picture</label>
                                 <input required accept="image/png, image/gif, image/jpeg" type="file" id="simpleinput3" class="form-control-file border" name="img">
                              </div>

                              <div class="form-group">
                                 <label for="">Video</label>
                                 <br>
                                 <input class="form-control-file border" type="file" accept="video/mp4,video/x-m4v,video/*" name="video" id="">
                              </div>


                              <!-- <div class="form-group py-2">
                                 <input type="checkbox" name="section-one" value="section-one" id="section-one">&nbsp;
                                 <label for="section-one">Visible to Section 1</label>
                                 <br>
                                 <input type="checkbox" name="section-two" value="section-two" id="section-two">&nbsp;
                                 <label for="section-two">Visible to Section 2</label>
                              </div> -->

                              <?php

                              $queryforsection = "SELECT * FROM blogs WHERE `section` = 1 ";
                              $resultforsection = mysqli_query($conn, $queryforsection);
                              $fetchrow = mysqli_fetch_assoc($resultforsection);
                              $sectionOne = $fetchrow['section'];


                              $queryforsectiontwo = "SELECT * FROM blogs WHERE `section` = 2 ";
                              $resultforsectiontwo = mysqli_query($conn, $queryforsectiontwo);
                              $fetchrowtwo = mysqli_fetch_assoc($resultforsectiontwo);
                              $sectionTwo = $fetchrowtwo['section'];

                              ?>


                              <div class="form-group">
                                 <label for="section">Section</label>
                                 <select class="form-control" name="section" id="section">
                                    <option value="">Select Section </option>
                                    <option <?php
                                             if ($sectionOne == 1) {
                                                echo "disabled";
                                             }
                                             ?> value="1">Section One </option>
                                    <option <?php
                                             if ($sectionTwo == 2) {
                                                echo "disabled";
                                             }
                                             ?> value="2">Section Two</option>
                                 </select>
                              </div>

                              <div class="form-group py-2">
                                 <input type="checkbox" name="trend" value="trending" id="trend">&nbsp;&nbsp;
                                 <label for="trend">Trending</label>
                                 <br>
                                 <input type="checkbox" name="highlight" value="highlight" id="highlight">&nbsp;&nbsp;
                                 <label for="highlight">Highlights</label>

                              </div>

                              <div class="form-group">
                                 <label for="metaTitle">Meta Title</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="metaTitle" class="form-control" name="meta_title" value="">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metadisc">Meta Description</label>
                                 <div re class="input-group input-group-merge">
                                    <input required type="tel" id="metadisc" class="form-control" name="meta_disc" value="">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metaTag">Meta Keyword</label>
                                 <div class="input-group input-group-merge">
                                    <input required type="text" id="metaTag" class="form-control" name="meta_keyword" value="">
                                    <div class="input-group-append" data-password="false">
                                    </div>
                                 </div>
                              </div>

                              <div>
                                 <input class="btn btn-primary" type="submit" name="submit" value="Save">
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