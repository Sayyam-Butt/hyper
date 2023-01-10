<?php include('cofig.php');
// if (isset($_GET['add'])) {
//    $var = $_GET['add'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//         <button type='button' class='close' data-dismiss='alert'>&times;</button>
//         Blog Added Successfully  </div>";
//    }
// }
// if (isset($_GET['edit'])) {
//    $var = $_GET['edit'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//         <button type='button' class='close' data-dismiss='alert'>&times;</button>
//         Blog Updated Successfully </div>";
//    }
// }
// if (isset($_GET['del'])) {
//    $var = $_GET['del'];
//    if (!empty($var)) {
//       $info_alert = "<div class='alert alert-success alert-dismissible p-2'>
//         <button type='button' class='close' data-dismiss='alert'>&times;</button>
//         Blog Deleted Successfully </div>";
//    }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("include/head.php") ?>
   <title>Hyper | Blogs </title>
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
                           <a class="btn btn-primary" href="add-blogs.php">Add Blog</a>
                        </div>
                        <h4 class="page-title">Blogs </h4>
                     </div>
                     <?php
                     //  if (isset($info_alert)) {
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
                                 <div id="search-bar">
                                    <input id="searchblog" type="search" class="form-control" placeholder="Search...">
                                 </div>

                              </div>
                           </div>



                           <div class="table-responsive">
                              <table class="table table-hover">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th>SN</th>
                                       <th>Image</th>
                                       <th>Title</th>
                                       <th>Category</th>
                                       <th>Visible</th>
                                       <th>Date</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody id="table-data-blog">
                                    <?php
                                    include("include/connection.php");
                                    $limit = 5;
                                    if (isset($_GET['page'])) {
                                       $page = $_GET['page'];
                                    } else {
                                       $page = 1;
                                    }
                                    $offset = ($page - 1) * $limit;
                                    $sql = "SELECT * FROM blogs  INNER JOIN blogcategories ON blogs.blogcategories = blogcategories.blogs_id LIMIT $offset,$limit ";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       $a = 1;
                                       while ($row =  mysqli_fetch_assoc($result)) {
                                    ?>

                                          <tr>
                                             <td class="align-middle"><?php echo $a; ?> </td>
                                             <td class="align-middle"><img style="width:70px;height:70;border-radius:2px;" src="<?php echo $row['img'] ?>"> </td>
                                             <td class="align-middle"><?php echo $row["title"] ?></td>
                                             <td class="align-middle"><?php echo $row["categories"] ?></td>
                                             <td class="align-middle">
                                                <?php
                                                if ($row["section"] == 1) {
                                                   echo "Section 1";
                                                } elseif ($row["section"] == 2) {
                                                   echo "Section 2";
                                                } else {
                                                   echo "Null";
                                                }

                                                ?>
                                             </td>
                                             <td class="align-middle"><?php echo $row["post_date"] ?></td>
                                             <td class="align-middle"><a style="color:grey;" href="edit-blog.php?id=<?php echo $row["id"] ?>"> <i class='far fa-edit'></i></a></td>
                                             <td class="align-middle"><a style="color:grey;" href="delete-blog.php?id=<?php echo $row["id"] ?>&cat_id=<?php echo $row["blogs_id"]; ?>"><i class='fas fa-trash'></i></a></td>
                                          </tr>
                                          <!-- Model -->
                                          <!-- <div class="modal fade" id="myModal">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                   <div class="modal-body mt-3">
                                                      <h4>Are you sure to want to Delete Blog?</h4>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <a href="delete-blog.php?id=<?php echo $row["id"] ?>&cat_id=<?php echo $row["blogs_id"]; ?>" class="btn btn-danger">Yes</a>
                                                      <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> -->
                                    <?php $a++;
                                       }
                                    } ?>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                           include("include/connection.php");
                           $query = "SELECT * FROM blogs";
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
                                    <li><a class="<?php echo $active ?>" href="all-blogs.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

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