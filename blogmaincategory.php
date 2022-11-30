<?php
 include("include/connection.php");
 $pageurl = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
 $currenturl = $pageurl[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/head.php")?>
    <title>The Canvas Times</title>
</head>

<body>
     <!-- ######## top-bar ######### -->
     <div class="div sticky-top bg-white">
        <?php include("include/topbar.php")?>
       <!-- ########### navbar ############### -->
       <?php include("include/navbar.php")?>
    </div>
    <!-- ########## lifestyle ########## -->
    <div class="life">
        <div class="container text-center py-5 ">
            <div class="row">
                <div class="col-lg-4"></div>
                <?php
                 $query1="SELECT * FROM blogcategories WHERE `caturl`='$currenturl'";
                 $run1=mysqli_query($conn,$query1);
                 $row1=mysqli_fetch_assoc($run1);
                 $catid=$row1['blogs_id'];
                 ?>
                
                <div class="col-lg-4">
                    <h1>
                       <?php echo $row1['categories']?> 
                    </h1>
                    <P class=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam modi nisi vitae dicta ipsam,
                        ab quisquam architecto illum magnam voluptate ratione ipsum, fuga minima ad.</P>
                </div>
                <div class="col-lg-4"></div>
            </div>
            
        </div>
    </div>
    <!-- ########### posts ############## -->
    <div class="post container py-5">
        <div class="row">
            <div class="col-lg-3 all">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
               <div class=" side-bar">
                <ul class="nav  fw-bold py-4">
                    <?php
                     $query3="SELECT * FROM subcategories WHERE `cat_id` = $catid";
                     $run3=mysqli_query($conn,$query3);
                     while ( $row3=mysqli_fetch_assoc($run3)) {
                        ?>
                        <li class="nav-item ">
                          <a class="nav-link"  href="#" ><?php echo $row3['name']?></a>
                       </li>
                        <?php
                     }
                    ?>
                  </ul>
                </div>
            </div>
            <div class="col-lg-9 ">
                <div class="clearfix ">
                    <div class="float-start"><h2>All   <?php echo $row1['categories']?>  Posts</h2></div>
                    <div class="float-end">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle"
                                data-bs-toggle="dropdown">
                               Most Papular
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 2</a></li>
                                <li><a class="dropdown-item" href="#">Link 3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row py-4">
                <?php
                 $query2="SELECT * FROM blogs WHERE `blogcategories`= $catid";
                 $run2 = mysqli_query($conn,$query2);
                    while ($row2=mysqli_fetch_assoc($run2)) {
                        ?>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="http://localhost/hyper/<?php echo$row2['pageurl']?>">
                             <img class="card-img-top rounded" src="admin/<?php echo$row2['img']?>" alt="Card image" style="width:100%">
                            </a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text"><?php echo $row2['title']?></h5>
                                <p><?php echo $row2['post_date']?></p>
                                <p><?php echo $row2['discription']?></p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                ?>
                   
                </div>
            </div>
        </div>
    </div>
          <!-- ########## Email ########### -->
    <div class="container rounded email">
        <div class="row px-4 ">
            <div class="col-lg-5  my-lg-5 pt-sm-5">
                <h4 class="pt-2  ">Sign Up for Updates And NewsLetters.</h4>
            </div>
            <div class="col-lg-7 e-box my-lg-5 ">
                <form action="" class=" d-flex">
           
                <input type="email" name="" class=" me-lg-5 e-box-1 me-sm-3 mb-sm-5 form-control form-control-lg  rounded-0" id="" placeholder="Your Email Address">
                <button class="btn btn-dark btn-sm px-5 rounded-0 ms-0 g-0 mb-sm-5 ">Subscribe Now</button>
           </form>
        </div>
        </div>
    </div>
      <!-- ########### Product ########## -->
      <div class="product my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-2 col-md-6 ">
                    <h5>Management</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Our Products</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Support</h5>
                    <ul class="pt-3">
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                        <li><i class="fa-solid fa-chevron-right"></i>
                            Career</li>
                    </ul>
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
                <div class="col-lg-3 col-md-6 cloud">
                    <h5>TagCloud</h5>
                    <div class="tag py-3  ">
                        <a href="">Terms</a>
                        <a href="">conditions</a>
                        <a href="">subjects</a>
                        <a href="">sources</a>
                        <a href="">address</a>
                        <a href="">hello</a>
                        <a href="">World</a>
                        <a href="">Terms</a>
                        <a href="">what</a>
                        <a href="">Terms</a>
                        <a href="">that is</a>
                        <a href="">abouts</a>
                        <a href="">hye</a>
                        <a href="">Terms</a>
                        <a href="">Terms</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="pb-3 pt-md-0 pt-sm-3">Download In Mobile</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo maiores eum sunt molestiae
                        perspiciatis velit?</p>
                    <div class="button-a">
                        <a href="#" class="btn btn-block w-100 mb-2 fw-bold btn-dark text-white"><i
                                class="fa-brands fa-apple text-white"></i> <Span> Apple
                                Store</Span></a>
                    </div>
                    <div class="button-b">
                        <a href="#" class="btn btn-dark btn-block w-100 fw-bold text-white"><i
                                class="fa-brands fa-google-play text-white"></i> <Span> Google
                                Play</Span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############# footer ########### -->
     <?php include("include/footer.php")?>
</body>

</html>