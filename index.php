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
    <title>The Canvas Times</title>
    <link rel="stylesheet" href="./assets/css/cancas.css">
    <script src="https://kit.fontawesome.com/1e891c0bbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="admin/<?php echo $row['favicon']?>">

</head>


<body>
    
    <div class="div sticky-top bg-white">
       <!-- ######## top-bar ######### -->
       <?php include("include/topbar.php")?>
       <!-- ########### navbar ############### -->
       <?php include("include/navbar.php")?>
    </div>
    <!-- ######### Highlight ########### -->
    <?php
      include("include/connection.php");
      $query="SELECT * FROM blogs";
      $run= mysqli_query($conn,$query);
      $row= mysqli_fetch_assoc($run);
    ?>
    <section class="container my-5 highlight">
        <div class="row">
            <div class="col-lg-7 g-0 hero border-end-md pe-md-4">
                <a href="" class="">
                    <img src="admin/<?php echo $row['img']?>" class="rounded mx-1" alt="">
                </a>
                <strong class="text-secondary py-4 ps-1 d-block">Coronavirus Update - World</strong>
                <h3 class="ps-1"><?php echo $row['title']?></h3>
                <p class="text-secondary"><?php echo $row['post_date']?></p>
                <p class="text-secondary"><?php echo $row['discription']?></p>
            </div>
            <div class="col-lg-5 ps-md-4 ps-sm-0  hero-2">
                <h2>Highlight</h2>
                <div class="row mt-3  border-bottom">
                    <div class="col-md-4  ">
                        <a href="./canvas-b.html">
                            <img src="admin/<?php echo $row['img']?>" class="rounded w-100" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 ps-md-4">
                        <strong class="my-2 d-block">Market</strong>
                        <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row mt-3 border-bottom">
                    <div class="col-md-4 ">
                        <a href="./canvas-b.html">
                            <img src="assets/images/1 (3).jpg" class="rounded w-100" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 ps-md-4">
                        <strong class="my-2  d-block">Market</strong>
                        <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam, reprehenderit.
                            amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row mt-3 border-bottom">
                    <div class="col-md-4 ">
                        <a href="./canvas-b.html">
                            <img src="assets/images/2 (1).jpg" class="rounded  w-100" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 ps-md-4">
                        <strong class="my-2  d-block">Market</strong>
                        <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam, reprehenderit.
                            amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-md-4 ">
                        <a href="./canvas-b.html">
                            <img src="assets/images/3.jpg" class="rounded w-100" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 ps-md-4">
                        <strong class="my-2  d-block">Market</strong>
                        <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam, reprehenderit.
                            amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ########## Email ########### -->
    <div class="container rounded email">
        <div class="row px-4 ">
            <div class="col-lg-5   my-lg-2 pt-sm-5">
                <h4 class="  ">Sign Up for Updates And NewsLetters.</h4>
            </div>
            <div class="col-lg-7 e-box my-lg-5 ">
                <form action="" class=" d-flex">
           
                <input type="email" name="" class=" me-lg-2 e-box-1 me-sm-3 mb-sm-5 form-control form-control-lg  rounded-0" id="" placeholder="Your Email Address">
          
           
                <button class="btn btn-dark btn-sm px-5 rounded-0 ms-0 g-0 mb-sm-5 ">Subscribe Now</button>
           </form>
        </div>
        </div>
    </div>
    <!-- ####### Videos ######### -->
    <div class="container py-5 videos">
        <div class="clearfix">
            <h5 class="text-secondary float-start">Lastest Videos</h5>
            <button class="btn btn-outline-dark float-end text-secondary">More Content &rarr; </button>
        </div>

        <div class="row pt-4">
            <div class="col-md-4  ">
                <div class="card border-0">
                    <a href="./canvas-b.html"> <img class="card-img-to rounded" src="assets/images/1.jpg" alt="Card image"
                            style="width:100%"></a>
                    <i class="fa-regular fa-circle-play text-white "> <strong> Watch</strong> </i>
                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  ">
                <div class="card border-0">
                    <a href="./canvas-b.html"><img class="card-img-top rounded" src="assets/images/1.jpg" alt="Card image"
                            style="width:100%"></a>
                    <i class="fa-regular fa-circle-play text-white "> <strong> Watch</strong> </i>
                    <div class="card-body px-0">
                        <strong class="card-title">Travel</strong>
                        <h5 class="card-text">Some example text some example text. John Doe is an architect and engineer
                        </h5>
                        <p>March 11, 2016</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card border-0">
                    <a href="./canvas-b.html"> <img class="card-img-to rounded" src="assets/images/3 (2).jpg" alt="Card image"
                            style="width:100%"></a>
                    <i class="fa-regular fa-circle-play text-white "> <strong> Watch</strong> </i>
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
    <!-- ######## Spotlight ######### -->
    <div class="spotlight bg-dark text-white">
        <div class="container ">
            <h2 class="py-5">Spotlight</h2>
            <div class="row">
                <div class="col-lg-7 g-0 hero  pe-md-5">
                    <a href="./canvas-b.html" class="">
                        <img src="assets/images/3 (1).jpg" class="rounded " alt="">
                    </a>
                    <strong class=" py-4 d-block">Coronavirus Update - World</strong>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem illo sunt voluptatibus? Totam,
                        optio commodi.</h3>
                    <p class="text-secondary">March-11, 2016</p>
                    <p class="text-secondary">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                        qui voluptatem illum ea laboriosam nam quis repellendus molestiae ab dolore doloribus sequi
                        minima, natus a, corporis sit, ex nesciunt! At. ipsum dolor sit amet, consectetur adipisicing
                        elit. Quisquam distinctio voluptatum saepe id ratione nulla in suscipit dolor tempore rerum ut
                        optio nam tenetur, consectetur laudantium non illo odio est.</p>
                </div>
                <div class="col-lg-5 ps-md-5 mb-4  hero-2">
                    <h2>Highlight</h2>
                    <div class="row mt-3 border-bottom">
                        <div class="col-md-4 ">
                            <a href="./canvas-b.html">
                                <img src="assets/images/3 (1).jpg" class="rounded w-100" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="my-2  d-block">Market</strong>
                            <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam,
                                reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                            <P class="text-secondary">March 11,2016</P>
                        </div>
                    </div>
                    <div class="row mt-3 border-bottom">
                        <div class="col-md-4 ">
                            <a href="./canvas-b.html">
                                <img src="assets/images/3 (3).jpg" class="rounded w-100" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="my-2  d-block">Market</strong>
                            <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam,
                                reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                            <P class="text-secondary">March 11,2016</P>
                        </div>
                    </div>
                    <div class="row mt-3 border-bottom">
                        <div class="col-md-4 ">
                            <a href="./canvas-b.html">
                                <img src="assets/images/4 (1).jpg" class="rounded w-100" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="my-2  d-block">Market</strong>
                            <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam,
                                reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                            <P class="text-secondary">March 11,2016</P>
                        </div>
                    </div>
                    <div class="row mt-3  ">
                        <div class="col-md-4 ">
                            <a href="./canvas-b.html">
                                <img src="assets/images/4 (2).jpg" class="rounded w-100" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="my-2  d-block">Market</strong>
                            <h5>Lorem ipsum dolor , ipsum dolor sit amet consectetur adipisicing elit. Totam,
                                reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                            <P class="text-secondary">March 11,2016</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ########## History ######## -->
    <div class="container history py-5">
        <div class="row history-a">
            <div class="col-lg-8   history-border pe-4">
                <h3 class="">based on your Reading History</h3>
                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="./canvas-b.html">
                            <img src="assets/images/5 (1).jpg" class="rounded" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong class="pb-3 pt-md-0 pt-sm-3 p  d-block">CoronaVirus Update - world</strong>
                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, cum?</h4>
                        <p class="text-secondary">March 11, 2016</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ipsam praesentium magnam
                            tempora nostrum, rem minima, ullam asperiores saepe delectus ad explicabo harum quidem
                            tenetur?</p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="./canvas-b.html">
                            <img src="assets/images/1 (1).jpg" class="rounded" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong class="pb-3 pt-md-0 pt-sm-3 p  d-block">TECH</strong>
                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, cum?</h4>
                        <p class="text-secondary">March 11, 2016</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ipsam praesentium magnam
                            tempora nostrum, rem minima, ullam asperiores saepe delectus ad explicabo harum quidem
                            tenetur?</p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="./canvas-b.html">
                            <img src="assets/images/5 (2).jpg" class="rounded" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong class="pb-3 pt-md-0 pt-sm-3 p  d-block">FOOD</strong>
                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, cum?</h4>
                        <p class="text-secondary">March 11, 2016</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ipsam praesentium magnam
                            tempora nostrum, rem minima, ullam asperiores saepe delectus ad explicabo harum quidem
                            tenetur?</p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="./canvas-b.html">
                            <img src="assets/images/5.jpg" class="rounded" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <strong class="pb-3 pt-md-0 pt-sm-3 p  d-block">HEALTH</strong>
                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, cum?</h4>
                        <p class="text-secondary">March 11, 2016</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ipsam praesentium magnam
                            tempora nostrum, rem minima, ullam asperiores saepe delectus ad explicabo harum quidem
                            tenetur?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-4">
                <h2 class="mb-4">This Week</h2>
                <div class="row  mt-3 py-4 border-bottom">
                    <div class="col-2 ps-1 text-secondary">
                        <h1>01.</h1>
                    </div>
                    <div class="col-10 ">
                        <h5> Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row ps-1 mt-3 py-4 border-bottom">
                    <div class="col-2 ps-1 text-secondary">
                        <h1>02.</h1>
                    </div>
                    <div class="col-10 ">
                        <h5> Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row   mt-3 py-4 border-bottom">
                    <div class="col-2 ps-1 text-secondary">
                        <h1>03.</h1>
                    </div>
                    <div class="col-10 ">
                        <h5> Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row  mt-3 py-4 border-bottom">
                    <div class="col-2 ps-1 text-secondary">
                        <h1>04.</h1>
                    </div>
                    <div class="col-10 ">
                        <h5> Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>
                <div class="row  mt-3 py-4 border-bottom">
                    <div class="col-2 ps-1 text-secondary">
                        <h1>05.</h1>
                    </div>
                    <div class="col-10 ">
                        <h5> Totam, reprehenderit. amet, consectetur adipisicing elit. Ipsam, neque.</h5>
                        <P class="text-secondary">March 11,2016</P>
                    </div>
                </div>

                <div class=" ads mt-3 pt-4 pb-0">
                    <div>
                        <h1>Ad</h1>
                    </div>
                    <div class="card img-fluid mt-5 ">
                        <a href="./canvas-b.html" class="img-3">
                            <img class="card-img-top" src="assets/images/1 (1).jpg" alt="Card image" style="width:100%">
                        </a>
                        <div class="card-img-overlay">
                            <div class="clearfix">
                                <div class="float-start ps-0 img-2">
                                    <img src="assets/images/2.jpg" class="d-inline" alt="">
                                    <div class="d-inline-block text-white">
                                        <strong class="">SemiColonWeb</strong>
                                        <p class="">About 3 Years Ago</p>
                                    </div>
                                </div>
                                <div class="float-end text-white">
                                    <i class="fa-brands fa-facebook fa-3x"></i>
                                </div>
                            </div>
                            <div class="icons text-white ">
                                <i class="fa-solid fa-thumbs-up "></i><span class="pe-2"> 1</span>
                                <i class="fa-solid fa-comment"></i> <span class="pe-2"> comments</span>
                                <i class="fa-sharp fa-solid fa-share"></i> <span> share</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ Empty ########## -->
    <div class=" py-5 bg-light empty">

    </div>
    <!-- ############# World ########### -->
    <div class="container world">
        <div class="row">
            <div class="col-lg-3 col-md-6   mt-5 history-border pe-4">
                <h2 class="">World</h2>
                <div class="row border-bottom py-3">
                    <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                    <p class="text-secondary pt-3">March 11, 2016</p>
                </div>
                <div class="row border-bottom py-5">
                    <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                    <p class="text-secondary pt-3">March 11, 2016</p>
                </div>
                <div class="row py-5">
                    <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                    <p class="text-secondary pt-3">March 11, 2016</p>
                    <a href="" class="text-dark">View More &rarr; </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <div class=" mt-5 history-border ps-2 pe-4">
                    <h2 class="">Travel</h2>
                    <div class="row border-bottom py-3">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row border-bottom py-5">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row py-5">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                        <a href="" class="text-dark">View More &rarr; </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  ">
                <div class=" mt-5 history-border ps-2 pe-4">
                    <h2 class="">Fashion</h2>
                    <div class="row border-bottom py-3">
                        <h4>Coronavirus Live Updates: Singapore Sees Record of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row border-bottom py-5">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number of new Cases of the Infected
                            Patients.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row py-5">
                        <h4>Coronavirus Live Updates: Singapore Record Number of Cases of Corona Virus patients show
                            Symmptoms.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                        <a href="" class="text-dark">View More &rarr; </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class=" mt-5  ps-2 ">
                    <h2 class="">Food</h2>
                    <div class="row border-bottom py-3">
                        <h4>Coronavirus Live Updates: Recently Very Short Of times Singapore Sees Record Number Number
                            of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row border-bottom py-5">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                    </div>
                    <div class="row py-5">
                        <h4>Coronavirus Live Updates: Singapore Sees Record Number Number of new Cases.</h4>
                        <p class="text-secondary pt-3">March 11, 2016</p>
                        <a href="" class="text-dark">View More &rarr; </a>
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
                        <a href="" class="social-icon si-rounded si-dark si-mini si-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                        </a>
                        <a  class="social-icon si-rounded si-dark si-mini si-twitter" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                        </a>
                        <a  class="social-icon si-rounded si-dark si-mini si-instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 cloud">
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


  