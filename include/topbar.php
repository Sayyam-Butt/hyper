<?php
include("include/connection.php");
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
$query = "SELECT * FROM site_setting";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($run);
?>





<!-- ######## top-bar ######### -->
<div class="div sticky-top bg-white">
    <section class="container top-bar">
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
                    <img src="admin/<?php echo $row['logo'] ?>" class="pb-1" alt="">
                </a>

                <div class="line-1">
                    <p class="text-secondary date">Sat , October 15</p>
                </div>
            </div>

            <div class="col-md-4 magna text-end mt-4">

                <a id="show" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fa fa-search text-dark icon"></i>
                </a>

            </div>
        </div>


        <div class="canvas-logo pt-1">
            <a href="" class="text-decoration-none text-dark">
                <img src="admin/<?php echo $row['mobile_logo'] ?>" class="pb-1 ps-3" alt="">
            </a>
            <p class="text-secondary ps-3 ">Sat , October 15</p>
        </div>

    </section>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">


            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cancel text-end">
                            <button type="button" class="btn-close me-5 pe-5 py-3 bbt" data-bs-dismiss="modal"></button>
                        </div>
                    </div>
                </div>
                <div id="box">
                    <form action="search.php" method="get">
                        <input placeholder="Search Here" id="searchbox" type="search" name="search" />
                        <input type="submit" class="btn btn-secondary" value="Search">

                </div>
            </div>

        </div>
    </div>
</div>