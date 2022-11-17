<?php
 include("include/connection.php");
 $query="SELECT * FROM site_setting";
 $run= mysqli_query($conn,$query);
 $row= mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/cancas.css">
    <script src="https://kit.fontawesome.com/1e891c0bbd.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>The Canvas Times</title>
    <link rel="icon" type="image/x-icon" href="admin/<?php echo $row['favicon']?>">
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
                <div class="col-lg-4">
                    <h1>
                        LIFESTYLE
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
                    <li class="nav-item active ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link  " href="#" >Fashion</a>
                    </li>
                   
                  </ul>
                </div>
            </div>
            <div class="col-lg-9 ">
                <div class="clearfix ">
                    <div class="float-start"><h2>All LifeStyle Posts</h2></div>
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
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/2 (1).jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/1 (2).jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/3 (1).jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row py-3">
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/1.jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/5 (1).jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/2.jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row py-3">
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/9.jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/5 (2).jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  ">
                        <div class="card border-0">
                           <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/8.jpg" alt="Card image" style="width:100%"></a>

                            <div class="card-body px-0">
                                <strong class="card-title">Arts And Agriculture</strong>
                                <h5 class="card-text">Some example text some example text. John Doe is an architect and
                                    engineer
                                </h5>
                                <p>March 11, 2016</p>
                                <p> eum maxime maiores itaque tempora illum non veniam blanditiis?</p>
                                <a href="" class="text-dark">Read The Article</a>
                            </div>
                        </div>
                    </div>

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
                        <a href="" class="btn btn-block w-100 mb-2 fw-bold btn-dark text-white"><i
                                class="fa-brands fa-apple text-white"></i> <Span> Apple
                                Store</Span></a>
                    </div>
                    <div class="button-b">
                        <a href="" class="btn btn-dark btn-block w-100 fw-bold text-white"><i
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