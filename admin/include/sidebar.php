<?php
include("include/connection.php");
$id = $_SESSION["id"];
$sql =  "SELECT * FROM `users` WHERE id = $id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while ($row =  mysqli_fetch_assoc($result)) {
?>
      <!-- ========== Left Sidebar Start ========== -->
      <div class="left-side-menu left-side-menu-detached">
         <div class="leftbar-user">
            <a href="javascript: void(0);">
               <?php if (!empty($row['profile'])) {  ?>
                  <a href="profile.php">
                     <img src="<?php echo $row['profile']; ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
                  </a>
               <?php  } else {   ?>
                  <a href="profile.php">
                     <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                  <?php } ?>
                  </a>
                  <span class="leftbar-user-name"><?php echo $row["name"]; ?></span>
            </a>
         </div>
   <?php
   }
}
   ?>
   <!--- Sidemenu -->
   <ul class="metismenu side-nav">
      <li class="side-nav-title side-nav-item">Navigation</li>
      <li class="side-nav-item">
         <a href="dashboard.php" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
         </a>
      </li>
      <li class="side-nav-item">
         <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Blogs </span>
         </a>
         <ul class="side-nav-second-level" aria-expanded="false">
            <li>
               <a href="blogs-categories.php">Catergories</a>
            </li>
            <li>
               <a href="Sub-category.php">Subcategories</a>
            </li>
            <li>
               <a href="all-blogs.php">All Blogs</a>
            </li>

            <li>
               <a href="add-blogs.php">Add Blog</a>
            </li>
            <li>
               <a href="blogs-tags.php">Blog Tags</a>
            </li>
         </ul>
      </li>
      <?php
      $sql = "SELECT * FROM  contactmessage WHERE status=0";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      ?>
      <li class="side-nav-item">
         <a href="contactmessage.php" class="side-nav-link">
            <i style='font-size:15px' class="fas fa-comment-alt"></i>
            <span> Contact Messages
               <?php
               if ($num > 0) {
                  echo "<span class='badge badge-info badge-pill float-right'> $num </span>";
               }
               ?>
               
            </span>
         </a>
      </li>
      <li class="side-nav-item">
         <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> FaQ's </span>
         </a>
         <ul class="side-nav-second-level" aria-expanded="false">
            <li>
               <a href="faqCategory.php">FaQ Catergories</a>
            </li>
            <li>
               <a href="allFaq.php">All FaQ's</a>
            </li>
           
         </ul>
      </li>
      
      <li class="side-nav-item">
         <a href="site-settings.php" class="side-nav-link">
            <i class="uil-edit-alt"></i>
            <span> Site Settings </span>
         </a>
      </li>
   </ul>
   </li>
   </ul>
   <!-- End Sidebar -->
   <div class="clearfix"></div>
   <!-- Sidebar -left -->
      </div>
      <!-- Left Sidebar End -->