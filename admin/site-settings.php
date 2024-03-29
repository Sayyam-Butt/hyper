<?php
include('cofig.php');
include("include/connection.php");
if (isset($_POST['info-submit'])) {
   $fb_url = $_POST['fb'];
   $twit_url = $_POST['tweet'];
   $insta_url = $_POST['insta'];
   $query = " UPDATE `site_setting` SET `fb`=' $fb_url',`twiter`='$twit_url',`insta`='$insta_url'";
   $result = mysqli_query($conn, $query);
   if (!empty($result)) {
      $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
         <button type='button' class='close' data-dismiss='alert'>&times;</button>
         Links Updated Sucessfully !!!</div>";
   }
}
if (isset($_POST['img-submit'])) {
   $logo = $_FILES['logo'];
   $filename = $logo['name'];
   $filetmp = $logo['tmp_name'];
   $fileext = explode('.', $filename);
   $filecheck = strtolower(end($fileext));
   $fileextstored = array('png', 'jpg', 'jpeg');
   if (in_array($filecheck, $fileextstored)) {
      $destinationfile = 'upload/' . $filename;
      move_uploaded_file($filetmp, $destinationfile);
   }

   $logo_mobile = $_FILES['logo-mobile'];
   $logo_mobile_name = $logo_mobile['name'];
   $logo_mobile_tmp_name = $logo_mobile['tmp_name'];
   $logo_mobile_fileext = explode('.', $logo_mobile_name);
   $mobile_filecheck = strtolower(end($logo_mobile_fileext));
   $logo_mobile_fileextstored = array('png', 'jpg', 'jpeg');
   if (in_array($mobile_filecheck, $logo_mobile_fileextstored)) {
      $mobile_logo_destinationfile = 'upload/' . $logo_mobile_name;
      move_uploaded_file($logo_mobile_tmp_name, $mobile_logo_destinationfile);
   }

   $favicon = $_FILES['favicon'];
   $favicon_name = $favicon['name'];
   $favicon_name_tmp = $favicon['tmp_name'];
   $ext = explode('.', $favicon_name);
   $check = strtolower(end($ext));
   $storeext = array('png', 'jpg', 'jpeg');
   if (in_array($check, $storeext)) {
      $dest = 'upload/' . $favicon_name;
      move_uploaded_file($favicon_name_tmp, $dest);
   }
   if ($filetmp != "") {
      $sqllogo = " UPDATE `site_setting` SET `logo`='$destinationfile' ";
      $result1 = mysqli_query($conn, $sqllogo);
      $logoup = "<div class='alert alert-success alert-dismissible p-2'>
         <button type='button' class='close' data-dismiss='alert'>&times;</button>
         Logo Updated Sucessfully !!!</div>";
   }
   if ($logo_mobile_tmp_name != "") {
      $sql_mobile_logo = " UPDATE `site_setting` SET `mobile_logo`='$mobile_logo_destinationfile' ";
      $result1 = mysqli_query($conn, $sql_mobile_logo);
      $mobile_logoup = "<div class='alert alert-success alert-dismissible p-2'>
         <button type='button' class='close' data-dismiss='alert'>&times;</button>
         Mobile Logo Updated Sucessfully !!!</div>";
   }
   if ($favicon_name_tmp != "") {
      $sqlfav = " UPDATE `site_setting` SET `favicon`='$dest'";
      $result1 = mysqli_query($conn, $sqlfav);
      $favup = "<div class='alert alert-success alert-dismissible p-2'>
         <button type='button' class='close' data-dismiss='alert'>&times;</button>
         Favicon Updated Sucessfully !!!</div>";
   }
}
if (isset($_POST['submit-contact-info'])) {
   $address = $_POST['address'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $query2 = " UPDATE `site_setting` SET `address`=' $address',`contactnum`='$number',`email`='$email'";
   $result2 = mysqli_query($conn, $query2);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Site Settings | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
   <?php include("include/navbar.php") ?>
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
                        <div class="page-title-right">
                           <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="dashboard.php">Hyper</a></li>
                              <li class="breadcrumb-item active">Site Settings</li>
                           </ol>
                        </div>
                        <h4 class="page-title">Site Settings</h4>
                     </div>
                  </div>
               </div>
               <!-- end page title -->
               <form action="" method="post">
                  <div class="row">
                     <div class="col-12">
                        <?php
                        if (isset($info_alert)) {
                           echo $info_alert;
                        }
                        if (isset($logoup)) {
                           echo $logoup;
                        }
                        if (isset($favup)) {
                           echo $favup;
                        }
                        if (isset($mobile_logoup)) {
                           echo $mobile_logoup;
                        }

                        ?>
                        <?php
                        $sql = "SELECT * FROM site_setting";
                        $run = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($run);
                        ?>
                        <div class="card">
                           <div class="card-body">
                              <h4 class="page-title mb-4"> Social Links</h4>

                              <div class="form-group">
                                 <label for="simpleinput">Facebook</label>
                                 <input type="url" id="simpleinput" required class="form-control" value="<?php echo $row['fb'] ?>" name="fb">
                              </div>
                              <div class="form-group">
                                 <label for="example-email">Twitter</label>
                                 <input type="url" id="example-email" required name="tweet" class="form-control" value="<?php echo $row['twiter'] ?>">
                              </div>
                              <div class="form-group">
                                 <label for="example-number">Instagram</label>
                                 <input type="url" id="example-number" required name="insta" class="form-control mask-telefone" value="<?php echo $row['insta'] ?>">

                              </div>
                              <div>
                                 <input class="btn btn-primary" type="submit" name="info-submit" value="Update">
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
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="page-title mb-4"> Web Icons</h4>
                              <div class="form-group">
                                 <label for="logo-icon">Fullscreen Logo</label><br>
                                 <small>Upload size : 100px 335px</small>
                                 <input accept="image/png, image/gif, image/jpeg" type="file" id="logo-icon" name="logo" class="form-control-file border p-1">
                                 <div class="border mt-1 rounded"><img class="img-fluid" src="<?php echo $row['logo'] ?>" alt=""></div>
                              </div>

                              <div class="form-group my-2">
                                 <label for="logo-icon">Mobile Screen Logo</label><br>
                                 <small>Upload size : 100px 335px</small>
                                 <input accept="image/png, image/gif, image/jpeg" type="file" id="mobile-logo-icon" name="logo-mobile" class="form-control-file border p-1">
                                 <div class="border mt-1 rounded"><img class="img-fluid" style="width:298px;height:170px;" src="<?php echo $row['mobile_logo'] ?>" alt=""></div>

                              </div>
                              <div class="form-group my-2">
                                 <label for="favicon">Favicon</label><br>
                                 <small>Upload size : 32px 32px</small>
                                 <input accept="image/png, image/gif, image/jpeg" type="file" id="favicon" name="favicon" class="form-control-file border p-1">
                                 <div class="border mt-1 rounded p-1"><img style="width:32px;height:32px;" src="<?php echo $row['favicon'] ?>" alt=""></div>
                              </div>
                              <div>
                                 <input class="btn btn-primary" type="submit" name="img-submit" value="Update">
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
               <form action="#" method="post">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="page-title mb-4">Contact Us</h4>
                              <div class="form-group">
                                 <label for="address">Address</label>
                                 <div class="input-group input-group-merge">
                                    <input type="text" id="address" class="form-control" name="address" value="<?php echo $row['address'] ?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="number">Number</label>
                                 <div class="input-group input-group-merge">
                                    <input type="tel" id="number" class="form-control" name="number" value="<?php echo $row['contactnum'] ?>">

                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="email">Email</label>
                                 <div class="input-group input-group-merge">
                                    <input type="text" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                                    <div class="input-group-append" data-password="false">

                                    </div>
                                 </div>
                              </div>
                              <input class="btn btn-primary" type="submit" name="submit-contact-info" value="Update">
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
            <!-- <form action="#" method="post">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="page-title mb-4">Meta Tags</h4>
                           <div class="form-group">
                              <label for="metaTitle">Meta Title</label>
                              <div class="input-group input-group-merge">
                                 <input type="text" id="metaTitle" class="form-control" name="" value="">

                              </div>
                           </div>
                           <div class="form-group">
                              <label for="metadisc">Meta Discription</label>
                              <div class="input-group input-group-merge">
                                 <input type="tel" id="metadisc" class="form-control" name="" value="">

                              </div>
                           </div>
                           <div class="form-group">
                              <label for="metaImg">Meta Image</label>
                              <div class="input-group input-group-merge">
                                 <input type="file" id="metaImg" class="form-control-file border p-1" name="" value="">
                                 <div class="input-group-append" data-password="false">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="metaTag">Meta Tag</label>
                              <div class="input-group input-group-merge">
                                 <input type="text" id="metaTag" class="form-control" name="" value="">
                                 <div class="input-group-append" data-password="false">
                                 </div>
                              </div>
                           </div>
                           <input class="btn btn-primary" type="submit" name="" value="Update">
                        </div>
                     </div>
                      end card-body -->
                  <!-- </div> -->
                  <!-- end card -->
               <!-- </div> -->
               <!-- end col -->
         <!-- </div> -->
         <!-- end row -->
         <!-- </form> --> 
      </div>
      <!-- End Content -->
   </div>
   <!-- content-page -->
   </div>
   <!-- end wrapper-->
   </div>
   <!-- END Container -->
   <!-- bundle -->
   <script src="assets/js/vendor.min.js"></script>
   <script src="assets/js/app.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#number').mask('(+00)00000-0000');
      });
   </script>
</body>

</html>