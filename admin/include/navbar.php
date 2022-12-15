<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
   <div class="container-fluid">
      <!-- LOGO -->
      <a href="dashboard.php" class="topnav-logo">
        <span class="topnav-logo-lg">
          <img src="assets/images/logo-light.png" alt="" height="16">
        </span>
        <span class="topnav-logo-sm">
          <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
      </a>
      <ul class="list-unstyled topbar-right-menu float-right mb-0">
         <?php
            include("include/connection.php");
            $id =$_SESSION["id"]; 
            $sql =  "SELECT * FROM `users` WHERE id = $id ";
            $result = mysqli_query($conn , $sql);
               if(mysqli_num_rows($result) > 0){
                   while ( $row =  mysqli_fetch_assoc($result)) {    
            ?>
         <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
            <span class="account-user-avatar"> 
            <?php if (!empty($row['profile'])) {  ?>
            <img src="<?php echo $row['profile']; ?>"  alt="user-image" height="42" class="rounded-circle shadow-sm">
            <?php  }
               else {   ?>
            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <?php } ?>
            </span>
            <span>
            <span class="account-user-name"><?php echo $row["name"]; ?></span>
            <span class="account-position">Admin</span>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
               <!-- item-->
               <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome !</h6>
               </div>
               <!-- item-->
               <a href="profile.php" class="dropdown-item notify-item">
               <i class="mdi mdi-account-edit mr-1"></i>
               <span>Profile</span>
               </a>
               <a href="setting.php" class="dropdown-item notify-item">
               <i class="mdi mdi-account-edit mr-1"></i>
               <span>Settings</span>
               </a>
               <!-- item-->
               <a href="logout.php" class="dropdown-item notify-item">
               <i class="mdi mdi-logout mr-1"></i>
               <span>Logout</span>
               </a>
            </div>
         </li>
         <?php
            }
            }
            ?>
      </ul>
      <a class="button-menu-mobile disable-btn">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
   </div>
</div>
<!-- end Topbar -->