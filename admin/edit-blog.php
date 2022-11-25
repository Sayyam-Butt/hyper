<?php include('cofig.php');
   include("include/connection.php");
   $id=$_GET['id'];
   if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $caty=$_POST['category'];
    $subcat = $_POST['sub-cat'];
    $tag = implode(",",$_POST['tags']);
    $disc=$_POST['discription'];
    $content = $_POST['content'];
    $date=date("d M Y");
    $url=$_POST['link'];
    $img= $_FILES['img']['name'];
    $img_temp=$_FILES['img']['tmp_name'];
    if($img_temp != "")
   {
    $destinationfile = 'upload/'.$img; 
    move_uploaded_file($img_temp ,$destinationfile );
    $query="UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',`img`='$destinationfile',`pageurl`='$url' WHERE id=$id";
   }else
   {
      $query="UPDATE `blogs` SET `title`='$title',`blogcategories`='$caty',`subcategory`='$subcat',`post_date`='$date',`tagname`='$tag',`discription`='$disc',`content`='$content',`pageurl`='$url' WHERE id=$id";
   }
    mysqli_query($conn,$query);
    header("location:all-blogs.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper |  Edit Blog </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- third party css -->
      <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <!-- third party css end -->
      <!-- App css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
      <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <!-- Summernote css -->
      <link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
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
                  <form action="#" method="post"  enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="form-group">
                                    <?php 
                                        include("include/connection.php");
                                        $id=$_GET['id'];
                                        $sql1 = "SELECT * FROM blogs where id=$id";
                                        $result1=mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)>0) {
                                            while ($row1 = mysqli_fetch_assoc($result1)) {         
                                    ?>
                                    <label for="simpleinput">Title</label>
                                    <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" 
                                       value="<?php echo$row1['title']?>" name="title" >
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">URL</label>
                                    <input required type="text" id="sluggenrated"  class="form-control" 
                                       value="<?php echo $row1['pageurl']?>" name="link" >
                                 </div>
                                 <div class="form-group">
                                    <label for="CATEGORY-DROPDOWN">Category</label>
                                    <select name="category" id="category-dropdown" class="form-control" required>
                                        <option value="" >Select Category</option>
                                        <?php
                                            include("include/connection.php");

                                            $sql = "SELECT * FROM blogcategories";
                                            $result = mysqli_query($conn , $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while ( $row =  mysqli_fetch_assoc($result)) {
                                                    if ($row['blogs_id']==$row1['blogcategories']) {
                                                        $selected = "selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                    echo'<option '."$selected".' value="'.$row['blogs_id'].'" >'.$row["categories"].'</option>';
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
                                   $parent_id= $row1['blogcategories'];
                                   $subcat_id = $row1['subcategory'];
                                     include("include/connection.php");

                                   $sub_cat= $row1['subcategory'];
                                           $sql = "SELECT * FROM subcategories WHERE `cat_id` = $parent_id ";
                                            $result = mysqli_query($conn , $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while ( $row =  mysqli_fetch_assoc($result)){
                                                   ?>
                                                   <option
                                                   <?php

                                                   if ($subcat_id == $row['id']) {
                                                   if ($sub_cat == $row['id']) {

                                                      echo "selected";
                                                   }
                                                   else{
                                                      echo " ";
                                                   }
                                                   ?>
                                                   value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                 <?php  
                                                }
                                            }
                                          }
                                        ?> 
                                    
                                     </select>
                                   </div>
                                 <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="discription" id="" rows="3" ><?php echo$row1['discription']?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="textarea">Content</label>
                                    <textarea class="form-control" name="content" id="summernote-basic" rows="5" ><?php echo$row1['content']?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">Meta Tags</label>
                                    <select name="tags[]" id="simpleinput" class="form-control-file
                                     js-example-basic-multiple"  multiple="multiple" required>
                                      <?php
                                            $tagdemo = explode(",",$row1['tagname']);
                                            $sql1 = "SELECT * FROM tags";
                                            $result1 = mysqli_query($conn , $sql1);
                                            if(mysqli_num_rows($result) > 0){
                                                while ( $row1 =  mysqli_fetch_assoc($result1)) { ?>
                                                    <option  
                                                    <?php  
                                                      foreach ($tagdemo as $r) {
                                                         if($r == $row1['tagname'])
                                                         {
                                                            echo "selected";
                                                         }
                                                      }
                                                    ?>
                                                    value="<?php echo $row1['tagname']; ?>"><?php echo $row1['tagname']; ?></option>
                                                <?php }
                                            }
                                        ?> 
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">Picture</label>
                                    <input accept="image/png, image/gif, image/jpeg" type="file" id="simpleinput"  class="form-control-file border " name="img" >
                                 </div>
                                         <div class="border my-2 p-1">
                                          <img style="width:70px;height:70;" src="<?php echo$row1['img']?>"alt=""> </div>
                                             <?php
                                            }
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
      <?php include("include/script.php")?>
   </body>
</html>