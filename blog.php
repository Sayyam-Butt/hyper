<?php
 include("include/connection.php");
 $id=$_GET['id'];
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
    <link rel="stylesheet" href="./cancas.css">
    <script src="https://kit.fontawesome.com/1e891c0bbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/cancas.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>The Canvas Times</title>
    <link rel="icon" type="image/x-icon" href="admin/<?php echo $row['favicon']?>">
    <style>
        body{
            font-family:times;
        }
    </style>
</head>

<body>
     <!-- ######## top-bar ######### -->
     <div class="div sticky-top bg-white">
        <?php include("include/topbar.php")?>
       <!-- ########### navbar ############### -->
       <?php include("include/navbar.php")?>
    </div>
    <!-- ######### Corona ########## -->
    <div class="corona text-center  container py-4">
        <?php 
         $query1 = "SELECT * FROM blogs WHERE `id`=$id";
         $result=mysqli_query($conn,$query1);
         $row1 = mysqli_fetch_assoc($result);
        ?>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
             <strong>Corona Virus Update -World</strong>
        <h2 class=" pt-3"><?php echo $row1['title']?></h2>
        <p class="text-secondary pt-4"><?php echo $row1['post_date']?> | By SemiColonWeb</p>
    </div>
        <div class="col-lg-4"> 

        </div>
       </div>
    </div>
    <!-- ########## content ########## -->
    <div class="container fw-bold content">
        <div class="row">
            <a href="./canvas-b.html">
                <img src="./img/hero.jpg" class="rounded" alt="">
            </a>
            <div class="col-lg-2 my-5 data-left ">
                <p>All online Conferences to save your box, get Inspired and Stay Connected
                </p>
                <hr>
                <p>Share This Post</p>
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
            <div class="col-lg-1"></div>
            <div class="col-lg-6 my-5 data-right">
                <p><?php echo $row1['discription']?></p>
                <h2 class="py-5">Content</h2>
                <p><?php echo $row1['content']?></p>

                    <hr>

                    <div class="tags">
                        <h4 class="py-3">Related Tags</h4>
                        <div class="tag  py-5 ">
                            <a href="">Terms</a>
                            <a href="">conditions</a>
                            <a href="">subjects</a>
                            <a href="">sources</a>
                            <a href="">address</a>
                            <a href="">hello</a>
                            <a href="">World</a>
                        </div>
                    </div>

                    <hr>

                    <div class="comments py-3 ">
                        <div class="main pb-5">
                            <h2 class="py-5">Comments</h2>
                            <div class="circle-img border d-inline-block p-2 rounded-circle">
                                <a href="./canvas-b.html"><img src="assets/images/ad516503a11cd5ca435acc9bb6523536.png" class="rounded-circle"
                                        alt=""></a>
                            </div>
                            <div class=" comment-box border rounded py-3  px-5">
                                <div class="clearfix">
                                    <div class="float-start">
                                        <h5 class="">Jon Doe</h5>
                                        <p>April 24,2020 at 10:04am</p>
                                    </div>
                                    <div class="float-end"><i class="fa-sharp fa-solid fa-share"></i></div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ea eveniet? Iure,
                                    omnis
                                    incidunt tempora dicta quasi natus dolor tempore eligendi provident facere? Ea,
                                    expedita
                                    cupiditate consequatur reiciendis qui minus.</p>
                            </div>
                        </div>
                        <div class="main-1 pb-5 ps-5">
                            <div class="circle-img-1 border d-inline-block p-2 rounded-circle">
                                <a href="./canvas-b.html"><img src="assets/images/30110f1f3a4238c619bcceb10f4c4484.png" class="rounded-circle"
                                        alt=""></a>
                            </div>
                            <div class=" comment-box border rounded py-3 px-5">
                                <div class="clearfix">
                                    <div class="float-start">
                                        <h5 class="">Jon Doe</h5>
                                        <p>April 24,2020 at 10:04am</p>
                                    </div>
                                    <div class="float-end"><i class="fa-sharp fa-solid fa-share"></i></div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ea eveniet? Iure,
                                    omnis
                                     eligendi provident facere? Ea,
                                    expedita
                                .</p>
                            </div>
                        </div>
                        <div class="main-2 ">
                            <div class="circle-img-2 border d-inline-block p-2 rounded-circle">
                                <a href="./canvas-b.html"><img src="assets/images/30110f1f3a4238c619bcceb10f4c4484.png" class="rounded-circle"
                                        alt=""></a>
                            </div>
                            <div class=" comment-box border rounded py-3 px-5">
                                <div class="clearfix">
                                    <div class="float-start">
                                        <h5 class="">Jon Doe</h5>
                                        <p>April 24,2020 at 10:04am</p>
                                    </div>
                                    <div class="float-end"><i class="fa-sharp fa-solid fa-share"></i></div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, ea eveniet? Iure,
                                    omnis
                                    incidunt tempora dicta quasi natus dolor tempore eligendi provident facere? Ea,
                                    expedita
                                    cupiditate consequatur reiciendis qui minus.</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="leave py-3">
                        <h2 class="py-3">Leave A Comment</h2>
                        <div class="row py-3">
                            <div class="col-4 g-0">
                                <label for="">Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="">Gmail</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-4 g-0">
                                <label for="">Website</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="py-2">Comments</label>
                            <textarea name="" id="" rows="15" class="form-control">

                        </textarea>
                        </div>
                        <a class="btn btn-dark py-2 g-0 my-4">Submit Comment</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ############# photo ############ -->
    <div class="container py-5 videos">
        <div class="clearfix">
            <h5 class="text-secondary float-start">Related Posts</h5>

        </div>

        <div class="row pt-4">
            <div class="col-lg-3 col-md-6 ">
                <div class="card border-0">

                   <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/4 (1).jpg" alt="Card image" style="width:100%"></a>

                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  ">
                <div class="card border-0">
                   <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/2.jpg" alt="Card image" style="width:100%"></a>

                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <div class="card border-0">
                   <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/1 (2).jpg" alt="Card image" style="width:100%"></a>

                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                   <a href="./canvas-b.html"> <img class="card-img-top rounded" src="assets/images/1.jpg" alt="Card image" style="width:100%"></a>

                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
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
                    <div class="social-icons ">
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