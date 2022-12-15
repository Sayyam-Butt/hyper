<?php
include("include/connection.php");
$search = $_GET['search'];
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
    <div class="container my-5">
        <h4>Search Term : <?php echo $search ?></h4>
    </div>
    <div class="container">
        <div class="row py-4">
            <?php
            include("include/connection.php");
             $searchquery = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `title` LIKE '%$search%'";
            $searchqueryresult = mysqli_query($conn, $searchquery);
            while ($searchrow = mysqli_fetch_assoc($searchqueryresult)) {
            ?>
                <div class="col-md-3  ">
                    <div class="card border-0 shadow">
                        <a href="">
                            <img class="card-img-top rounded" src="admin/<?php echo $searchrow['img'] ?>" alt="Card image" style="width:100%">
                        </a>
                        <div class="card-body p-2">
                            <strong class="card-title"><?php echo $searchrow['categories'] ?></strong>
                            <h5 class="card-text"><?php echo $searchrow['title'] ?></h5>
                            <p><?php echo $searchrow['post_date'] ?></p>
                            <p class="text-justify"><?php echo shorter($searchrow['discription'], 250) ?></p>
                            <a href="http://localhost/hyper/<?php echo $searchrow['pageurl'] ?>" class="text-dark">Read The Article</a>
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


    <script src="assets/js/custom.js"></script>

</body>

</html>