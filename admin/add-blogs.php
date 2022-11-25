<?php include('cofig.php');
   if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $category = $_POST['category'];
      $subcat = $_POST['sub-cat'];
      $tag = implode(",",$_POST['tags']);
      $content = $_POST['content'];
      $disc = $_POST['discription'];
      $url ='/'.$_POST['link'];
      $date = date("d M Y");
      $files = $_FILES['img'];
      $filename = $files['name'];
      $fileerror = $files['error'];
      $filetmp = $files['tmp_name'];
      $fileext = explode('.',$filename);
      $filecheck = strtolower(end( $fileext ));
      $fileextstored = array('png','jpg','jpeg');
      if(in_array($filecheck,$fileextstored)){
         $destinationfile = 'upload/'.$filename; 
         move_uploaded_file($filetmp,$destinationfile);
       }
      include("include/connection.php");
         $query = "INSERT INTO `blogs`(`title`, `blogcategories`, `subcategory`,`discription`,`content`, `post_date`,`tagname`,`pageurl`,`img`) VALUES ('$title ',' $category','$subcat','$disc','$content',' $date','$tag','$url','$destinationfile');";
         $query .="UPDATE blogcategories SET post=post+1 WHERE blogs_id=$category ;";
         $query_run =  mysqli_multi_query($conn , $query);
      header("location:all-blogs.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Hyper |  Add Blog </title>
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
      <!-- Summernote css -->
      <link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <!-- Select2 -->
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    
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
                           <div class="card">
                              <div class="card-body">
                                 <div class="form-group">
                                    <label for="simpleinput">Title</label>
                                    <input onkeyup="createurl(this.value)" type="text" id="simpleinput" required class="form-control" 
                                       value="" name="title" >
                                 </div>
                                 <div class="form-group">
                                    <label for="simpleinput">Url</label>
                                    <input required type="text" id="sluggenrated"  class="form-control" 
                                       value="" name="link" >
                                 </div>
                            <div class="form-group">
                                <label for="CATEGORY-DROPDOWN">Category</label>
                                <select name="category" required class="form-control" id="category-dropdown">
                                    <option value="">Select Category</option>
                                    <?php
                                        $result = mysqli_query($conn,"SELECT * FROM blogcategories");
                                        while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['blogs_id'];?>"><?php echo $row["categories"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SUBCATEGORY">Sub Category</label>
                                <select required name="sub-cat" class="form-control" id="sub-category-dropdown">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>


                                 <div class="form-group">
                                    <label for="example-textarea"> Description</label>
                                    <textarea required class="form-control " name="discription" id="" rows="3" ></textarea>
                                 </div>

                                 <div class="form-group">
                                    <label for="example-textarea"> Content</label>
                                    <textarea required class="form-control" name="content" id="summernote-basic" rows="10" ></textarea>
                                 </div>
                               
                                 <div class="form-group">
                                    <label for="simpleinput"> Tags</label>
                                    <select name="tags[]" id="simpleinput" class="form-control-file
                                     js-example-basic-multiple"  multiple="multiple" required>
                                        <?php
                                            include("include/connection.php");

                                            $sql1 = "SELECT * FROM tags";
                                            $result1 = mysqli_query($conn , $sql1);
                                            if(mysqli_num_rows($result) > 0){
                                                while ( $row1 =  mysqli_fetch_assoc($result1)) {
                                                    echo'<option value="'.$row1['tagname'].'" >'.$row1["tagname"].'</option>';
                                                }
                                            }
                                        ?> 
                                    </select>
                                 </div>
                                 
                                 <div class="form-group">
                                    <label for="simpleinput">Picture</label>
                                    <input required accept="image/png, image/gif, image/jpeg" type="file" id="simpleinput"  class="form-control-file border" 
                                        name="img" >
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
     
     <?php include("include/script.php")?>
   </body>
</html>