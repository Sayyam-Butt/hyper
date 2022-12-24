 <!-- ########### Product ########## -->
 <div class="product my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-2 col-md-6 ">
                    <h5>Management</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            About Us</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Careers</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Customers</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Themes</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Our Products</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Real Estate</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Movers</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Stores</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Landing</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Support</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Privacy</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Help Center</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Chat</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Email Us</li>
                    </ul>
                    <div class="social-icons ">
                        <a href="https://facebook.com/semicolonweb" class="social-icon si-rounded si-dark si-mini si-facebook" target="_blank">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/__semicolon"  
                        class="social-icon si-rounded si-dark si-mini si-twitter" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com/semicolonweb"
                         class="social-icon si-rounded si-dark si-mini si-instagram" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 cloud">
                    <h5>TagCloud</h5>
                    <div class="tag py-3 ">
                        <?php
                        include("include/connection.php");
                        $tagquery = "SELECT * FROM `tags`";
                        $tagresult = mysqli_query($conn, $tagquery);
                        while ($tagrow = mysqli_fetch_array($tagresult)) {

                        ?>
                            <a href="<?php echo $tagrow['tagurl']?>"><?php echo $tagrow['tagname'] ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="pb-3 pt-md-0 pt-sm-3">Download In Mobile</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo maiores eum sunt molestiae
                        perspiciatis velit?</p>
                    <div class="button-a">
                        <a href="" class="btn btn-block w-100 mb-2 fw-bold btn-dark text-white"><i class="fa-brands fa-apple text-white"></i> <Span> Apple
                                Store</Span></a>
                    </div>
                    <div class="button-b">
                        <a href="" class="btn btn-dark btn-block w-100 fw-bold text-white"><i class="fa-brands fa-google-play text-white"></i> <Span> Google
                                Play</Span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>