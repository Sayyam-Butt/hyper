<?php include('cofig.php');
//    if (isset($_POST['submit'])) {
//       include("include/connection.php");
//       $catname = $_POST['category'];
//       $sql1 = " INSERT INTO `blogcategories`( `categories`) VALUES ('$catname')"; 
//       $result1 = mysqli_query($conn , $sql1);
//       header("location:blogs-categories.php"); 
//   }

// if (isset($_GET['add'])) {
//    $var = $_GET['add'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//          <button type='button' class='close' data-dismiss='alert'>&times;</button>
//          Subcategory Added  </div>";
//    }
// }
// if (isset($_GET['edit'])) {
//    $var = $_GET['edit'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//          <button type='button' class='close' data-dismiss='alert'>&times;</button>
//          Subcategory Updated  </div>";
//    }
// }
// if (isset($_GET['del'])) {
//    $var = $_GET['del'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//          <button type='button' class='close' data-dismiss='alert'>&times;</button>
//          Subcategory Deleted  </div>";
//    }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Hyper | Blogs Categories</title>
   <style>
      #pagination {
         margin: 0;
         padding: 0;
         text-align: center
      }

      #pagination li {
         display: inline
      }

      #pagination li a {
         display: inline-block;
         text-decoration: none;
         padding: 4px 8px;
         color: #000;
         font-size: 10px;
      }

      #pagination li a {
         border-radius: 5px;
         -webkit-transition: background-color 0.3s;
         transition: background-color 0.3s;
         background-color: #e7e7e7;
      }

      #pagination li a.active {
         background-color: #323a46;
         color: #fff
      }

      #pagination li a:hover:not(.active) {
         background-color: #b1aeae;
      }
   </style>
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
                        <div class="page-title-right">
                           <a href="add-sub-cat.php" class="btn btn-primary">Add Subcategory</a>
                        </div>
                        <h4 class="page-title">Subcategories</h4>
                     </div>

                     <?php
                     // if (isset($info_alert)) {
                     //    echo $info_alert;
                     // }
                     ?>

                     <?php
                     if (isset($_SESSION['status'])) {
                     ?>
                        <div class="alert alert-success alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <?php echo $_SESSION['status']; ?>
                        </div>
                     <?php

                        unset($_SESSION['status']);
                     }
                     ?>
                     <div class="card">
                        <div class="card-body">
                           <div class="row mb-3">
                              <div class="col-md-4"></div>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                 <input id="searchsubcat" type="search" class="form-control" placeholder="Search...">
                              </div>
                           </div>
                           <div class="table-responsive">
                              <table class="table table-hover">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th>SN</th>
                                       <th>Subcategory</th>
                                       <th>Category</th>
                                       <!-- <th>No of Blogs</th> -->
                                       <th>Edit</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody id="table-data-subcat">
                                    <?php
                                    include("include/connection.php");
                                    $limit = 5;
                                    if (isset($_GET['page'])) {
                                       $page = $_GET['page'];
                                    } else {
                                       $page = 1;
                                    }
                                    $offset = ($page - 1) * $limit;
                                    $sql = "SELECT * FROM subcategories INNER JOIN blogcategories 
                           ON cat_id = blogs_id 
                            LIMIT $offset,$limit";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       $a = 1;
                                       while ($row =  mysqli_fetch_assoc($result)) {
                                    ?>
                                          <tr>
                                             <td><?php echo $a ?></td>
                                             <td><?php echo $row["name"] ?></td>
                                             <td><?php echo $row['categories'] ?></td>
                                             <td><a style="color:grey;" href="edit-subcategory.php?id=<?php echo $row['id'] ?>"><i class='far fa-edit'></i></a></td>
                                             <td><a style="color:grey;" href="delete-subcat.php?id=<?php echo $row['id'] ?>&cat_id=<?php echo $row['cat_id'] ?>"><i class='fas fa-trash'></i></a></td>
                                          </tr>

                                          <!-- Model -->
                                          <!-- <div class="modal fade" id="myModal">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                   <div class="modal-body mt-3">
                                                      <b>Are you sure to want to Delete Subcategory?</b>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <a href="delete-subcat.php?id=<?php echo $row['id'] ?>&cat_id=<?php echo $row['cat_id'] ?>" class="btn btn-danger">Yes</a>
                                                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> -->
                                    <?php
                                          $a++;
                                       }
                                    } ?>
                                 </tbody>
                              </table>
                           </div>
                           <!-- pagination -->
                           <?php
                           include("include/connection.php");
                           $query = "SELECT * FROM subcategories";
                           $run = mysqli_query($conn, $query);
                           if (mysqli_num_rows($run)) {
                              $total_records = mysqli_num_rows($run);
                              $total_pages = ceil($total_records / $limit);
                           ?>
                              <ul id="pagination">
                                 <?php
                                 for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $page) {
                                       $active = "active";
                                    } else {
                                       $active = "";
                                    }
                                 ?>
                                    <li><a class="<?php echo $active ?>" href="sub-category.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

                              <?php
                                 }
                              }
                              ?>
                              </ul>



                        </div>
                     </div>
                     <!-- end page title -->
                  </div>
                  <!-- End Content -->
               </div>
            </div>
         </div>
         <!-- content-page -->
      </div>
      <!-- end wrapper-->
   </div>
   <!-- END Container -->
   <?php include("include/script.php") ?>

</body>

</html>