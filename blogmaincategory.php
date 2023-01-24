<?php
include("include/connection.php");
$pageurl = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$currenturl = $pageurl[2];

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
    <style>
        .img-wraper {
            overflow: hidden;
        }

        .inner-img {
            transition: 0.3s;
        }

        .inner-img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- ######## top-bar ######### -->
    <?php include("include/topbar.php") ?>
    <div class="div sticky-top bg-white">
        <!-- ########### navbar ############### -->
        <?php include("include/navbar.php") ?>
    </div>
    <!-- ########## lifestyle ########## -->
    <div class="life">
        <div class="container text-center py-5 ">
            <div class="row">
                <div class="col-lg-4"></div>
                <?php
                $query1 = "SELECT * FROM blogcategories WHERE `caturl`='$currenturl'";
                $run1 = mysqli_query($conn, $query1);
                $row1 = mysqli_fetch_assoc($run1);
                $catid = $row1['blogs_id'];
                ?>

                <div class="col-lg-4">
                    <h1>
                        <?php echo $row1['categories'] ?>
                    </h1>
                    <P class=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam modi nisi vitae dicta ipsam,
                        ab quisquam architecto illum magnam voluptate ratione ipsum, fuga minima ad.</P>
                </div>
                <div class="col-lg-4"></div>
            </div>

        </div>
    </div>
    <!-- ########### Sidebar ############## -->
    <div class="post container py-5">
        <div class="row">
            <div class="col-lg-3 all">
                <form action="search" method="get">
                    <div class="input-group">
                        <input type="search" name="s" class="form-control" placeholder="Search">

                    </div>
                </form>

                <div class="side-bar">
                    <ul class="nav  fw-bold py-4">
                        <?php
                        $query3 = "SELECT * FROM subcategories WHERE `cat_id` = $catid";
                        $run3 = mysqli_query($conn, $query3);
                        while ($row3 = mysqli_fetch_assoc($run3)) {
                        ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo $row3['subcaturl'] ?>"><?php echo $row3['name'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 ">
                <div class="clearfix ">
                    <div class="float-start">
                        <h2>All <?php echo $row1['categories'] ?> Posts</h2>
                    </div>
                    <div class="float-end">
                        <!-- <select class="form-control" name="" id="">
                            <option value="">Filter By</option>
                            <option value=""> <a href="https://www.youtube.com/watch?v=0K4-DkwmoPk&ab_channel=SaurabhChaudhary">Latest Post</a> </option>
                            <option value=""> <a href="">Most Comments</a> </option>
                        </select> -->

                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown">
                                Filter By
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item latestpost" data-pageurl="<?php echo $currenturl ?>">Latest Post</a></li>
                                <li><a class="dropdown-item mostcomments" data-pageurl1="<?php echo $currenturl ?>">Most Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row py-4" id="fetchblog">

                    <?php
                    $query2 = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `blogcategories`= $catid ";
                    $run2 = mysqli_query($conn, $query2);
                    while ($row2 = mysqli_fetch_assoc($run2)) {
                    ?>
                        <div class="col-md-4">
                            <div class="card border-0 pb-3">

                                <a href="http://localhost/hyper/<?php echo $row2['pageurl'] ?>">
                                <div class="img-wraper rounded">
                                <img class="inner-img card-img-top rounded pb-2" src="admin/<?php echo $row2['img'] ?>" alt="Card image" style="width:100%">
                                </div>
                                    
                                    <div class="card-body p-0">
                                        <strong class="card-title text-dark"><?php echo $row2['categories'] ?></strong>
                                        <h5 class="card-text text-dark"><?php echo $row2['title'] ?></h5>
                                        <small class="text-dark"><?php echo $row2['post_date'] ?></small>
                                        <p class="text-justify text-secondary"><?php echo shorter($row2['discription'], 200) ?></p>
                                        <b class="text-dark">Read The Artical</b>
                                    </div>
                                </a>

                            </div>

                        </div>
                    <?php
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
    </div>
    <!-- ########## Email ########### -->
    <!-- <div class="container rounded email">
        <div class="row px-4 ">
            <div class="col-lg-5 my-lg-5 pt-sm-5">
                <h4 class="pt-2  ">Sign Up for Updates And NewsLetters.</h4>
            </div>
            <div class="col-lg-7 e-box my-lg-5 ">
                <form action="" class=" d-flex">

                    <input type="email" name="" class=" me-lg-5 e-box-1 me-sm-3 mb-sm-5 form-control form-control-lg  rounded-0" id="" placeholder="Your Email Address">
                    <button class="btn btn-dark btn-sm px-5 rounded-0 ms-0 g-0 mb-sm-5 ">Subscribe Now</button>
                </form>
            </div>
        </div>
    </div> -->
    <!-- ############# product section ########### -->
    <?php include("include/productsection.php") ?>
    <!-- ############# footer ########### -->
    <?php include("include/footer.php") ?>

    <script>
        $(document).ready(function() {
            $(".latestpost").on("click", function(e) {

                var pageurl = $(this).data("pageurl");
                $.ajax({
                    url: "ajax-viewlatestpost.php",
                    type: "POST",
                    data: {
                        pageurl: pageurl
                    },
                    success: function(data) {
                        $("#fetchblog").html(data);
                    }

                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".mostcomments").on("click", function(e) {
                var pageurl1 = $(this).data("pageurl1");
                $.ajax({
                    url: "ajax-viewmostComment.php",
                    type: "POST",
                    data: {
                        pageurl1: pageurl1
                    },
                    success: function(data) {
                        $("#fetchblog").html(data);
                    }

                });
            });
        });
    </script>
</body>

</html>