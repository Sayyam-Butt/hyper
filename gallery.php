<?php
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
    <title>Document</title>
    <?php include("include/head.php") ?>
</head>

<body>
    <div class="div sticky-top bg-white">
        <!-- ######## top-bar ######### -->
        <?php include("include/topbar.php") ?>
        <!-- ########### navbar ############### -->
        <?php include("include/navbar.php") ?>
    </div>



    <!-- ########## lifestyle ########## -->
    <div class="life">
        <div class="container text-center py-5 ">
            <div class="row">
                <div class="col-lg-4"></div>


                <div class="col-lg-4">
                    <h1>
                        Video Gallery
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
        <?php
        $query2 = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `video` !=' '";
        $run2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_assoc($run2)) {
        ?>
            <div class="row py-3">
                <div class="col-lg-6 ">
                    <video src="admin/<?php echo $row2['video'] ?>" controls width="100%"></video>
                </div>
                <div class="col-lg-6 ">
                    <a href="<?php echo $row2['pageurl']?>">
                        <b class="text-dark"><?php echo $row2['categories'] ?></b>
                        <h2 class="card-text text-dark"><?php echo $row2['title'] ?></h2>
                        <p class="text-dark"><?php echo $row2['post_date'] ?></p>
                        <p class="text-justify text-secondary"><?php echo $row2['discription'] ?></p>
                        <b class="text-dark">Read The Artical</b>
                    </a>
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
</body>

</html>