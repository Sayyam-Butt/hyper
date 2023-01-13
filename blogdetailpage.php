<?php
session_start();
$baseurl = "http://localhost/hyper/";
$pageurl = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $currenturl = $pageurl[2];
        $queryforurl = "SELECT `title`,`img`,`pageurl` FROM blogs WHERE `pageurl`='$currenturl'";
        $queryforurl_res = mysqli_query($conn, $queryforurl);
        $rowforurl = mysqli_fetch_assoc($queryforurl_res);
         $ogurl=$rowforurl['pageurl'];
         $ogtitle=$rowforurl['title'];
         $ogimg = $rowforurl['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta property="og:url" content="<?php echo $baseurl.$ogurl?>"> 
    <meta property="og:type" content="Blog">
    <meta property="og:title" content="<?php echo $ogtitle?>" />
    <meta property="og:image" content="<?php echo $ogimg ?>" />
    <?php include("include/head.php") ?>
</head>

<body>
    <!-- ######## top-bar ######### -->
    <?php include("include/topbar.php") ?>
    <div class="div sticky-top bg-white">
        <!-- ########### navbar ############### -->
        <?php include("include/navbar.php") ?>
    </div>
    <!-- ######### Corona ########## -->

    <div class="corona text-center  container py-4">
        <?php

       
        $query1 = "SELECT * FROM blogs WHERE `pageurl`='$currenturl'";
        $result = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result);
        $blogid = $row1['id'];
        $_SESSION['blogid'] = $blogid;
        $titletocheck = $row1['title'];
        ?>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <?php
                $catid = $row1['blogcategories'];
                $catquery = "SELECT * FROM blogcategories WHERE blogs_id=$catid";
                $catqueryrun = mysqli_query($conn, $catquery);
                $catrow = mysqli_fetch_assoc($catqueryrun);
                $categorytocheck = $catrow['categories'];
                ?>
                <strong><?php echo $catrow['categories'] ?></strong>
                <h2 class=" pt-3"><?php echo $row1['title'] ?></h2>
                <p class="text-secondary pt-4"><?php echo $row1['post_date'] ?> | By The Canvas Times</p>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
    <!-- ########## content ########## -->
    <div class="container fw-bold content">
        <div class="row">
            <img style="width: 100%; " src="admin/<?php echo $row1['img'] ?>" class="rounded" alt="">
            <div class="col-lg-2 my-5 data-left ">
                <p>All online Conferences to save your box, get Inspired and Stay Connected
                </p>
                <hr>
                <p>Share This Post</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo $baseurl . $row1['pageurl'] ?>" class="social-icon si-rounded si-dark si-mini si-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="http://twitter.com/share?text=<?php echo $row1['title'] ?>&url=<?php echo $baseurl . $row1['pageurl'] ?>&hashtags=<?php echo $row1['tagname'] ?> " class="social-icon si-rounded si-dark si-mini si-twitter" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($row1['title'])?> <?php echo  $baseurl . $row1['pageurl'] ?>" class="social-icon si-rounded si-dark si-mini si-instagram" target="_blank">
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 my-5 data-right">
                <p><?php echo $row1['discription'] ?></p>
                <h2 class="py-5">Content</h2>
                <p><?php echo $row1['content'] ?></p>

                <hr>

                <div class="tags">
                    <h4 class="py-3">Related Tags</h4>
                    <div class="tag  py-5 ">
                        <?php
                        $tags = explode(",", $row1['tagname']);
                        foreach ($tags as $t) {
                        ?>
                            <a><?php echo $t ?></a>
                        <?php
                        }
                        ?>

                    </div>
                </div>

                <hr>

                <div class="comments py-3 ">
                    <div class="main">
                        <h2 class="py-5">Comments</h2>
                    </div>
                    <div id="showComments"></div>

                </div>



                <hr>

                <div class="leave py-3 ">
                    <h2 class="py-3">Leave A Comment</h2>
                    <form id="commentForm" method="POST">
                        <div class="row py-3">
                            <div class="col-6 g-0">
                                <label for="">Name</label>
                                <input placeholder="Enter Name" type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Gmail</label>
                                <input placeholder="Enter Email" type="text" id="email" name="email" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="py-2">Comments</label>
                            <textarea placeholder="Enter Comment" name="comment" id="comment" rows="5" class="form-control">
                        </textarea>
                        </div>
                        <span id="message"></span>
                        <br>
                        <input type="hidden" name="blogid" value="<?php echo $blogid ?>">
                        <input type="hidden" name="commentId" id="commentId" value="0" />
                        <input type="submit" name="submit" id="submit" class="btn btn-dark py-2 g-0 my-4" value="Post Comment" />
                    </form>


                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- ############# Related post ############ -->
    <div class="container py-5 videos">
        <div class="clearfix">
            <h5 class="text-secondary float-start">Related Posts</h5>

        </div>

        <div class="row pt-4">

            <?php
            $queryforrelatedpost = "SELECT  * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `blogcategories`=$catid 
                    AND title NOT LIKE '$titletocheck' 
                     LIMIT 4 ";
            $resultforrelatedpost = mysqli_query($conn, $queryforrelatedpost);
            while ($rowforrelatedpost = mysqli_fetch_assoc($resultforrelatedpost)) {
            ?>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card border-0">
                        <a href="http://localhost/hyper/<?php echo $rowforrelatedpost['pageurl'] ?>"> <img class="card-img-top rounded" src="admin/<?php echo $rowforrelatedpost['img'] ?>" alt="Card image" style="width:100%"></a>

                        <div class="card-body px-0">
                            <strong class="card-title"><?php echo $rowforrelatedpost['categories'] ?></strong>
                            <h5 class="card-text">
                                <?php echo $rowforrelatedpost['title'] ?>
                            </h5>
                            <small><?php echo $rowforrelatedpost['post_date'] ?></small>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>


    </div>
    <!-- ############# product section ########### -->
    <?php include("include/productsection.php") ?>
    <!-- ############# footer ########### -->
    <?php include("include/footer.php") ?>


    <script>
        $(document).ready(function() {
            showComments();
            $('#commentForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "comments.php",
                    method: "POST",
                    data: formData,
                    dataType: "JSON",
                    success: function(response) {
                        if (!response.error) {
                            $('#commentForm')[0].reset();
                            $('#commentId').val('0');
                            $('#message').html(response.message);
                            showComments();
                        } else if (response.error) {
                            $('#message').html(response.message);
                        }
                    }
                })
            });
            $(document).on('click', '.reply', function() {
                var commentId = $(this).attr("id");
                $('#commentId').val(commentId);
                $('#name').focus();
            });
        });
        // function to show comments
        function showComments() {
            $.ajax({
                url: "show_comments.php",
                method: "POST",
                success: function(response) {
                    $('#showComments').html(response);
                }
            })
        }
    </script>

</body>

</html>