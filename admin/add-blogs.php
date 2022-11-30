<?php include('cofig.php');
   if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $category = $_POST['category'];
      $subcat = $_POST['sub-cat'];
      $tag = implode(",",$_POST['tags']);
      $content = $_POST['content'];
      $disc = $_POST['discription'];
      $url =$_POST['link'];
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
     
      <?php include("include/head.php")?>
      <title>Hyper |  Add Blog </title>
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