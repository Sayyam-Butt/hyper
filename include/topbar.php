<?php
 include("include/connection.php");
 $query="SELECT * FROM site_setting";
 $run= mysqli_query($conn,$query);
 $row= mysqli_fetch_assoc($run);
?>
<div class="container top-bar">
            <div class="row mt-2 ">
                <div class="col-md-4 mt-3 ">
                    <div class="social-icons">
                        <a href="https://facebook.com/semicolonweb" class="social-icon si-rounded si-dark si-mini si-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/__semicolon" class="social-icon si-rounded si-dark si-mini si-twitter" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                        </a>
                        <a href=" https://instagram.com/semicolonweb" class="social-icon si-rounded si-dark si-mini si-instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 logo-1 text-center g-0">
                    <a href="" class="text-decoration-none  text-dark">
                        <img src="admin/<?php echo $row['logo']?>" class="pb-1" alt="">
                    </a>

                    <div class="line-1">
                        <p class="text-secondary date">Sat , October 15</p>
                    </div>
                </div>
                <div class="col-md-4 magna text-end mt-4">
                    <a href="#new-page" id="trigger">
                        <i class="fa-solid fa-magnifying-glass text-dark "></i>
                    </a>
                </div>
            </div>
            <div class="canvas-logo pt-3">
                 <a href="" class="text-decoration-none text-dark">
                        <img src="assets/images/mobile-logo@2x.png" class="pb-1" alt="">
                    </a>
                <p class="text-secondary ps-2 ">Sat , October 15</p>
            </div>
        </div>