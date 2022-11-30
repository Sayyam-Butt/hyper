<?php
 include("include/connection.php");
 function shorter($text, $chars_limit)
{
    if (strlen($text) > $chars_limit)
    {
        $new_text = substr($text, 0, $chars_limit);
        $new_text = trim($new_text);
        return $new_text . "...";
    }
    else
    {
    return $text;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/head.php")?>
    <title>The Canvas Times</title>
</head>
<body>
    <div class="div sticky-top bg-white">
       <!-- ######## top-bar ######### -->
       <?php include("include/topbar.php")?>
       <!-- ########### navbar ############### -->
       <?php include("include/navbar.php")?>
    </div>
    <!-- ######### Highlight ########### -->
   
    <section class="container my-5 highlight">
        <div class="row">
            <div class="col-lg-7 g-0 hero border-end-md pe-md-4">
                <a href="" class="">
                    <img src="assets/images/3 (1).jpg" class="rounded mx-1" alt="">
                </a>
                <strong class="text-secondary py-4 ps-1 d-block">Coronavirus Update - World</strong>
                <h3 class="ps-1"></h3>
                <p class="text-secondary"></p>
                <p class="text-secondary"></p>
            </div>
            <div class="col-lg-5 ps-md-4 ps-sm-0  hero-2">
                <h2>Highlight</h2>
                <?php
                $query="SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' GROUP BY categories  LIMIT 4 ";
                $result= mysqli_query($conn,$query);
                while ($row1= mysqli_fetch_assoc($result)) {
                  ?>
                    <div class="row my-3 pb-3  border-bottom">
                    <div class="col-md-4  ">
                        <a href="http://localhost/hyper/<?php echo$row1['pageurl']?>">
                            <img src="admin/<?php echo $row1['img']?>" class="rounded w-100" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 ps-md-4">
                        <strong class="mb-2 d-block"><?php echo $row1['categories']?></strong>
                        <h5><?php echo shorter($row1['title'],40)?></h5>
                        <P class="text-secondary"><?php echo $row1['post_date']?></P>
                    </div>
                    </div>    
                    <?php 
                    }
                    ?>
                  
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
    <div class="spotlight text-white" style="background-color:black">
        <div class="container ">
            <h2 class="py-5">Spotlight</h2>
           
            <div class="row">
                <div class="col-lg-7 g-0 hero  pe-md-5">
                    <a href="" class="">
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
                    
                    <?php
                      $query="SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' GROUP BY categories  LIMIT 4 ";
                      $result= mysqli_query($conn,$query);
                      while ($row1= mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="row mt-3 pb-3  border-bottom">
                        <div class="col-md-4 ">
                            <a href="http://localhost/hyper<?php echo$row1['pageurl']?>">
                                <img src="admin/<?php echo $row1['img']?>" class="rounded w-100" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="my-2  d-block"><?php echo $row1['categories']?></strong>
                            <h5 class="text-white"><?php echo shorter($row1['title'],40)?></h5>
                            <P class="text-secondary"><?php echo $row1['post_date']?></P>
                        </div>
                        </div>
                        <?php 
                          }
                         ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ########## History ######## -->
    <div class="container history py-5">
        <div class="row history-a">
            <div class="col-lg-8   history-border pe-4">
                <h3 class="">Latest Posts</h3>
                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="">
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
                        <a href="">
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
                        <a href="">
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
                        <a href="">
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
        <?php
          include("include/connection.php");
          $query = "SELECT * FROM blogcategories WHERE `shownavbar` = 'Yes'";
          $result = mysqli_query($conn , $query);
           while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="col-lg-3 col-md-6   mt-5 history-border pe-4">
                <h2 class=""><?php echo $row['categories']?></h2>
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
            
            <?php }?>
           
            
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
                    <div class="tag py-3 ">
                        <?php
                        include("include/connection.php");
                         $tagquery = "SELECT * FROM `tags`";
                         $tagresult=mysqli_query($conn,$tagquery);
                          while ($tagrow= mysqli_fetch_array($tagresult)) {

                        ?>
                        <a href=""><?php echo $tagrow['tagname']?></a>
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


  