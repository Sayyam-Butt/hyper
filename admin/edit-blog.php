<?php include('cofig.php');
include("include/connection.php");
$id = $_GET['id'];
if (isset($_POST['submit'])) {
   $title = $_POST['title'];
   $caty = $_POST['category'];
   $subcat = $_POST['sub-cat'];
   $tag = implode(",", $_POST['tags']);
   $disc = $_POST['discription'];
   $content = $_POST['content'];
   $date = date("d M Y");
   $url = $_POST['link'];

   $title_meta = $_POST['meta_title'];
   $desc_meta = $_POST['meta_desc'];
   $keyword_meta = $_POST['meta_keyword'];

   // $sectionone = $_POST['sec-one'];
   // $sectiontwo = $_POST['sec-two'];
   $section = $_POST['section'];

   $trending = $_POST['trend'];
   $highlight = $_POST['highlight'];

   $img = $_FILES['img']['name'];
   $img_temp = $_FILES['img']['tmp_name'];
   $destinationfile = 'upload/' . $img;



   $name = $_FILES['video']['name'];
   $target_dir = "upload video/";
   $target_file = $target_dir . $_FILES["video"]["name"];


   if (!empty($img_temp) and empty($name)) {
      move_uploaded_file($img_temp, $destinationfile);
      $query = "UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',`img`='$destinationfile',`section`='$section',`pageurl`='$url',`highlight`='$highlight',`trending`='$trending',`meta_title`='$title_meta',`meta_desc`='$desc_meta',`meta_keyword`='$keyword_meta' WHERE id=$id";
   }
   if (empty($img_temp) and !empty($name)) {
      move_uploaded_file($_FILES['video']['tmp_name'], $target_file);
      $query = "UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',`video`='$target_file',
      `section`='$section',`pageurl`='$url' ,`highlight`='$highlight',`trending`='$trending',`meta_title`='$title_meta',`meta_desc`='$desc_meta',`meta_keyword`='$keyword_meta' WHERE id=$id";
   }
   if (!empty($img_temp) and !empty($name)) {
      move_uploaded_file($img_temp, $destinationfile);
      move_uploaded_file($_FILES['video']['tmp_name'], $target_file);
      $query = "UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',
      `section`='$section',`img`='$destinationfile',`video`='$target_file',`pageurl`='$url' ,`highlight`='$highlight',`trending`='$trending' ,`meta_title`='$title_meta',`meta_desc`='$desc_meta',`meta_keyword`='$keyword_meta' WHERE id=$id";
   }
   if (empty($img_temp) and empty($name)) {
      $query = "UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',
      `section`='$section',`pageurl`='$url' ,`highlight`='$highlight',`trending`='$trending' ,`meta_title`='$title_meta',`meta_desc`='$desc_meta',`meta_keyword`='$keyword_meta' WHERE id=$id";
   }
   $resultupdate = mysqli_query($conn, $query);
   header("location:all-blogs.php?edit=$resultupdate");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Hyper | Edit Blog </title>
   <?php include("include/head.php") ?>
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
                        <h4 class="page-title">Edit Blog </h4>
                     </div>
                  </div>
               </div>
               <!-- end page title -->
               <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">

                        <div class="card">
                           <div class="card-body">
                              <div class="form-group">
                                 <?php
                                 $id = $_GET['id'];
                                 $sql1 = "SELECT * FROM blogs where id=$id";
                                 $result1 = mysqli_query($conn, $sql1);
                                 if (mysqli_num_rows($result1) > 0) {
                                    $row1 = mysqli_fetch_array($result1);
                                    $pic = $row1['img'];
                                    $section = $row1['section'];
                                    $trendcheck = $row1['trending'];
                                    $highlightcheck = $row1['highlight'];
                                    $videolocation = $row1['video'];
                                    $meta_title = $row1['meta_title'];
                                    $meta_desc = $row1['meta_desc'];
                                    $meta_keyword = $row1['meta_keyword'];
                                 ?>
                                    <label for="simpleinput">Name</label>
                                    <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" value="<?php echo $row1['title'] ?> " name="title">
                              </div>

                              <div class="form-group">
                                 <label for="simpleinput">URL</label>
                                 <input required type="text" id="sluggenrated" class="form-control" value="<?php echo $row1['pageurl'] ?>" name="link">
                              </div>
                              <div class="form-group">
                                 <label for="CATEGORY-DROPDOWN">Category</label>
                                 <select name="category" id="category-dropdown" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    include("include/connection.php");

                                    $sql = "SELECT * FROM blogcategories";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row =  mysqli_fetch_assoc($result)) {
                                          if ($row['blogs_id'] == $row1['blogcategories']) {
                                             $selected = "selected";
                                          } else {
                                             $selected = "";
                                          }
                                          echo '<option ' . "$selected" . ' value="' . $row['blogs_id'] . '" >' . $row["categories"] . '</option>';
                                       }
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="SUBCATEGORY">Sub Category</label>
                                 <select name="sub-cat" class="form-control" id="sub-category-dropdown">
                                    <option value="">Select Sub Category</option>
                                    <?php
                                    $parent_id = $row1['blogcategories'];
                                    $subcat_id = $row1['subcategory'];
                                    include("include/connection.php");
                                    $sub_cat = $row1['subcategory'];
                                    $sql = "SELECT * FROM subcategories WHERE `cat_id` = $parent_id ";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                          <option <?php

                                                   if ($subcat_id == $row['id']) {
                                                      if ($sub_cat == $row['id']) {

                                                         echo "selected";
                                                      } else {
                                                         echo " ";
                                                      }
                                                   ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                 <?php
                                                   }
                                                }
                                             }
                                 ?>

                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="">Description</label>
                                 <textarea class="form-control" name="discription" id="" rows="3"><?php echo $row1['discription'] ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="textarea">Content</label>
                                 <textarea class="form-control" name="content" id="summernote-basic" rows="5"><?php echo $row1['content'] ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Meta Tags</label>
                                 <select name="tags[]" id="simpleinput" class="form-control-file
                                     js-example-basic-multiple" multiple="multiple" required>
                                    <?php
                                    $tagdemo = explode(",", $row1['tagname']);
                                    $sql1 = "SELECT * FROM tags";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row1 =  mysqli_fetch_assoc($result1)) { ?>
                                          <option <?php
                                                   foreach ($tagdemo as $r) {
                                                      if ($r == $row1['tagname']) {
                                                         echo "selected";
                                                      }
                                                   }
                                                   ?> value="<?php echo $row1['tagname']; ?>"><?php echo $row1['tagname']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="simpleinput">Picture</label>
                                 <input accept="image/png, image/gif, image/jpeg" type="file" id="simpleinput" class="form-control-file border " name="img">
                              </div>
                              <div class="border my-2 p-1">
                                 <img style="width:120px;height:120;" src="<?php echo $pic; ?>" alt="">
                              </div>


                              <div class="form-group">
                                 <label for="">Video</label>
                                 <br>
                                 <input class="form-control-file border" type="file" accept="video/mp4,video/x-m4v,video/*" name="video" id="">
                              </div>
                              <div class="border my-2 p-1">
                                 <video src="<?php echo $videolocation ?>" autoplay muted controls width="320px" height="200px"></video>
                              </div>


                              <!-- <div class="form-group py-2">
                                 <input <?php
                                          // if ($sectionOne == 'section-one') {
                                          //    echo 'checked';
                                          // } else {
                                          //    echo '';
                                          // }
                                          ?> type="checkbox" name="sec-one" value="section-one" id="section-one">&nbsp;
                                 <label for="section-one">Visible to Section 1</label>
                                 <br>
                                 <input <?php
                                          // if ($sectionTwo == 'section-two') {
                                          //    echo 'checked';
                                          // } else {
                                          //    echo '';
                                          // }
                                          ?> type="checkbox" name="sec-two" value="section-two" id="section-two">&nbsp;
                                 <label for="section-two">Visible to Section 2</label>
                              </div> -->

                              <div class="form-group">
                                 <label for="section">Section</label>
                                 <select class="form-control" name="section" id="section">
                                    <option value="">Select Section </option>
                                    <option <?php
                                             if ($section == 1) {
                                                echo "selected";
                                             } else {
                                                echo "";
                                             }

                                             ?> value="1">Section One </option>
                                    <option <?php
                                             if ($section == 2) {
                                                echo "selected";
                                             } else {
                                                echo "";
                                             }

                                             ?> value="2">Section Two</option>
                                 </select>
                              </div>


                              <div class="form-group py-2">
                                 <input type="checkbox" name="trend" value="trending" id="trend" <?php
                                                                                                   if ($trendcheck == "trending") {
                                                                                                      echo "checked";
                                                                                                   } else {
                                                                                                      echo "";
                                                                                                   }
                                                                                                   ?>>&nbsp;&nbsp;
                                 <label for="trend">Trending</label>
                                 <br>
                                 <input type="checkbox" name="highlight" value="highlight" id="highlight" <?php
                                                                                                            if ($highlightcheck == "highlight") {
                                                                                                               echo "checked";
                                                                                                            } else {
                                                                                                               echo "";
                                                                                                            }
                                                                                                            ?>>&nbsp;&nbsp;
                                 <label for="highlight">Highlights</label>

                              </div>

                              <div class="form-group">
                                 <label for="metaTitle">Meta Title</label>
                                 <div class="input-group input-group-merge">
                                    <input type="text" id="metaTitle" class="form-control" name="meta_title" value="<?php echo $meta_title?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metadisc">Meta Description</label>
                                 <div class="input-group input-group-merge">
                                    <input type="tel" id="metadisc" class="form-control" name="meta_desc" value="<?php echo $meta_desc?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="metaTag">Meta Keyword</label>
                                 <div class="input-group input-group-merge">
                                    <input type="text" id="metaTag" class="form-control" name="meta_keyword" value="<?php echo $meta_keyword?>">
                                    <div class="input-group-append" data-password="false">
                                    </div>
                                 </div>
                              </div>


                           <?php
                                 }
                           ?>
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