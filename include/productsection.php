 <!-- ########### Product ########## -->
 <div class="product mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <h5>Management</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                          <a href="aboutus" class="text-black">About Us</a>  </li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                           <a href="terms-conditions"  class="text-black">Terms & Conditions</a> </li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                          <a href="privacy-policy" class="text-black">  Privacy Policy</a></li>
                        
                    </ul>
                </div>
              
                <div class="col-lg-3 col-md-6">
                    <h5>Support</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                       <a href="contact-us" class="text-black"> Contact Us </a></li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                        <a href="faq" class="text-black">FAQs</a>  </li>
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
                    <h5 class="pb-3 pt-md-0 pt-sm-3"> News Letter </h5>
                    <input type="email" placeholder="abc@gmail.com" class="form-control">
                   
                    <button class="btn btn-sm my-2 btn-secondary">Subscribe</button>
                    
                </div>
            </div>
        </div>
    </div>