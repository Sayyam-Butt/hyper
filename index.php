<?php
include("include/connection.php");
function shorter($text, $chars_limit)
{
    if (strlen($text) > $chars_limit) {
        $new_text = substr($text, 0, $chars_limit);
        $new_text = trim($new_text);
        return $new_text . "...";
    } else {
        return $text;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
    <title>The Canvas Times</title>
</head>

<body>
   
    <div class="div sticky-top bg-white">
        <!-- ######## top-bar ######### -->
        <?php include("include/topbar.php") ?>
        <!-- ########### navbar ############### -->
        <?php include("include/navbar.php") ?>
    </div>
    <!-- ######### Highlight ########### -->

    <section class="container my-5 highlight">
        <div class="row">
            <div class="col-lg-7 g-0 hero border-end-md pe-md-4">
                <?php
                $queryforsectionone = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `section` = '1'";
                $resultforsectinone = mysqli_query($conn, $queryforsectionone);
                $rowforsectionone = mysqli_fetch_assoc($resultforsectinone);
                ?>
                <a href="<?php echo $rowforsectionone['pageurl'] ?>">
                    <img src="admin/<?php echo $rowforsectionone['img'] ?>" class="rounded mx-1" alt="Nothing to show">

                    <strong class="text-secondary py-4 ps-1 d-block"><?php echo $rowforsectionone['categories'] ?></strong>
                    <h3 class="ps-1 text-dark"><?php echo $rowforsectionone['title'] ?></h3>
                    <p class="text-secondary"><?php echo $rowforsectionone['post_date'] ?></p>
                    <p class="text-secondary"><?php echo shorter($rowforsectionone['discription'], 230) ?></p>
                </a>
            </div>
            <div class="col-lg-5 ps-md-4 ps-sm-0  hero-2">
                <h2>Trending</h2>
                <?php
                $query = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `trending` = 'trending'
                 LIMIT 4 ";
                $result = mysqli_query($conn, $query);
                while ($row1 = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="row my-3 pb-3  border-bottom">
                        <div class="col-md-4 ">
                            <a href="http://localhost/hyper/<?php echo $row1['pageurl'] ?>">
                                <img src="admin/<?php echo $row1['img'] ?>" class="rounded w-100 " alt="">
                            </a>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <strong class="mb-2 d-block"><?php echo $row1['categories'] ?></strong>
                            <a href="http://localhost/hyper/<?php echo $row1['pageurl'] ?>">
                                <h5 class="text-dark"><?php echo shorter($row1['title'], 40) ?></h5>
                            </a>
                            <P class="text-secondary"><?php echo $row1['post_date'] ?></P>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
       
    </section>
   <!-- ############ Empty ########## -->
    <div class=" py-5 bg-light empty"></div>
    <!-- ########## Email ########### -->
    <!-- <div class="container rounded email">
        <div class="row px-5 py-3 align-items-center">
            <div class="col-lg-5 ">
                <h4 class="" id="signup">Sign Up for Updates And NewsLetters.</h4>
            </div>
            <div class="col-lg-7 e-box my-lg-5 ">
                <form id="newsform" class="d-md-flex justify-content-evenly">
                    <div>
                        <input type="email"class="form-control form-control-lg  rounded" id="email" placeholder="Your Email Address">
                    </div>
                    <div class="signup-btn">
                        <button id="subscribe"  class="btn btn-lg btn-dark  rounded ">Subscribe Now</button>
                    </div>
                    
                </form>
                <span id="message" class="text-secondary"></span> 
            </div>
        </div>
    </div> -->
    <!-- ####### Videos ######### -->
    <div class="container py-5 videos">
        <div class="clearfix">
            <h5 class="text-secondary float-start">Lastest Videos</h5>
            <a href="gallery" class="btn btn-outline-dark float-end text-secondary">More Content&rarr;</a>
           
        </div>

        <div class="row pt-4">
            <?php
            $queryforvideoblog = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `video` != ' '
                 LIMIT 3 ";
            $resultforvideoblog = mysqli_query($conn, $queryforvideoblog);
            while ($rowforvideoblog = mysqli_fetch_assoc($resultforvideoblog)) {
            ?>
                <div class="col-md-4  ">
                    <div class="card border-0">

                        <video controls class=" rounded" src="admin/<?php echo $rowforvideoblog['video'] ?>" style="width: 100%; height: 320px;"></video>

                        <div class="card-body px-0">
                            <strong class="card-title"><?php echo $rowforvideoblog['categories'] ?></strong>
                            <a href="http://localhost/hyper/<?php echo $rowforvideoblog['pageurl'] ?>">
                                <h5 class="card-text text-dark">
                                    <?php echo $rowforvideoblog['title'] ?>
                                </h5>
                            </a>

                            <small class="text-secondary"><?php echo $rowforvideoblog['post_date'] ?></small>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>


    </div>
    <!-- ######## Spotlight ######### -->
    <div class="spotlight text-white" style="background-color:black">
        <div class="container ">
            <h2 class="py-5">Spotlight</h2>

            <div class="row">
                <?php
                $queryforsectiontwo = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `section` = '2'";
                $resultforsectiontwo = mysqli_query($conn, $queryforsectiontwo);
                $rowforsectiontwo = mysqli_fetch_assoc($resultforsectiontwo);
                ?>
                <div class="col-lg-7 g-0 hero  pe-md-5">
                    <a href="<?php echo $rowforsectiontwo['pageurl'] ?>" class="">
                        <img src="admin/<?php echo $rowforsectiontwo['img'] ?>" class="rounded " alt="">

                        <strong class=" py-4 d-block"><?php echo $rowforsectiontwo['categories'] ?></strong>
                        <h3 class="text-white"><?php echo $rowforsectiontwo['title'] ?></h3>
                        <p class="text-secondary"><?php echo $rowforsectiontwo['post_date'] ?></p>
                        <p class="text-secondary"><?php echo shorter($rowforsectiontwo['discription'], 250) ?></p>
                    </a>
                </div>
                <div class="col-lg-5 ps-md-5 mb-4  hero-2">
                    <h2>Highlight</h2>

                    <?php
                    $query = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes'
                     AND `highlight`='highlight'
                      LIMIT 4 ";
                    $result = mysqli_query($conn, $query);
                    while ($row1 = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="row mt-3 pb-3  border-bottom">
                            <div class="col-md-4 ">
                                <a href="http://localhost/hyper/<?php echo $row1['pageurl'] ?>">
                                    <img src="admin/<?php echo $row1['img'] ?>" class="rounded w-100" alt="">
                                </a>
                            </div>
                            <div class="col-md-8 ps-md-4">
                                <strong class="my-2  d-block"><?php echo $row1['categories'] ?></strong>
                                <a href="http://localhost/hyper/<?php echo $row1['pageurl'] ?>">
                                    <h5 class="text-white"><?php echo shorter($row1['title'], 40) ?></h5>
                                </a>
                                <P class="text-secondary"><?php echo $row1['post_date'] ?></P>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ########## Latest Post ######## -->
    <div class="container history py-5">
        <div class="row history-a">
            <div class="col-lg-8   history-border pe-4">
                <h3 class="">Latest Posts</h3>

                <?php
                $latestpostquery = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' 
                    ORDER BY id DESC
                     LIMIT 4 ";
                $latestpostresult = mysqli_query($conn, $latestpostquery);
                while ($latestpostrow = mysqli_fetch_assoc($latestpostresult)) {
                ?>
                    <div class="row py-4">
                        <div class="col-md-6">
                            <a href="http://localhost/hyper/<?php echo $latestpostrow['pageurl'] ?>">
                                <img src="admin/<?php echo $latestpostrow['img'] ?>" class="rounded" alt="">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <strong class="pb-3 pt-md-0 pt-sm-3 p  d-block"><?php echo $latestpostrow['categories'] ?></strong>
                            <a href="http://localhost/hyper/<?php echo $latestpostrow['pageurl'] ?>">
                                <h4 class="text-dark"><?php echo shorter($latestpostrow['title'], 35) ?></h4>
                                <small class="text-secondary"><?php echo $latestpostrow['post_date'] ?></small>
                                <p class="text-secondary"><?php echo shorter($latestpostrow['discription'], 250) ?></p>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>


            <div class="col-lg-4 ps-4">
                <h2 class="mb-4">This Week</h2>
                <?php
                $thisweekquery = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' 
                    ORDER BY id DESC
                     LIMIT 5 ";
                $thisweekresult = mysqli_query($conn, $thisweekquery);
                $serial = 1;
                while ($thisweekrow = mysqli_fetch_assoc($thisweekresult)) {

                ?>

                    <div class="row  mt-3 py-4 border-bottom">
                        <div class="col-2 ps-1 text-secondary">
                            <h1>0<?php echo $serial ?>.</h1>
                        </div>
                        <div class="col-10 ">
                            <a href="http://localhost/hyper/<?php echo $thisweekrow['pageurl'] ?>" class="text-secondary">
                                <h4><?php echo $thisweekrow['title'] ?></h4>
                            </a>

                            <P class="text-secondary"><?php echo $thisweekrow['post_date'] ?></P>
                        </div>
                    </div>
                <?php
                    $serial++;
                }
                ?>



                <!-- Advertisment -->
                <div class=" ads mt-3 pt-4 pb-0">

                    <div class="card img-fluid mt-5 ">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fsemicolonweb%2Fphotos%2Fa.1218538191515522%2F2855299231172735%2F%3Ftype%3D3&width=350&show_text=false&height=350&appId" width="350" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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
            $query = "SELECT * FROM blogcategories WHERE `shownavbar` = 'Yes' LIMIT 4";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $blog_id = $row['blogs_id'];
            ?>
                <div class="col-lg-3 col-md-6   mt-5 history-border pe-4">
                    <h2 class=""><?php echo $row['categories'] ?></h2>
                    <?php
                    $queryforblogs = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories WHERE blogcategories = $blog_id LIMIT 4 ";
                    $resultforblogs = mysqli_query($conn, $queryforblogs);
                    while ($rowforblogs = mysqli_fetch_assoc($resultforblogs)) {
                    ?>
                        <div class="row border-bottom py-3">
                           <a href="<?php echo $rowforblogs['pageurl']?>"><h4 class="text-dark"><?php echo $rowforblogs['title'] ?></h4></a> 
                            <p class="text-secondary pt-3"><?php echo $rowforblogs['post_date'] ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <a href="<?php echo $row['caturl'] ?>" class="text-dark">View More &rarr; </a>
                </div>

            <?php } ?>


        </div>
    </div>
    <!-- ############# product section ########### -->
    <?php include("include/productsection.php") ?>
    <!-- ############# footer ########### -->
    <?php include("include/footer.php") ?>

</body>

</html>