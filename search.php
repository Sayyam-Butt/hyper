<?php
include("include/connection.php");
$search = $_GET['s'];
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
             $searchquery = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `title` LIKE '%$search%' OR `discription` LIKE '%$search%'";
            $searchqueryresult = mysqli_query($conn, $searchquery);
            // if(mysqli_num_rows($searchqueryresult)>1){
            while ($searchrow = mysqli_fetch_assoc($searchqueryresult)) {
            ?>
                <div class="col-md-3  ">
                    <div class="card border-0 ">
                        <a href="http://localhost/hyper/<?php echo $searchrow['pageurl']?>">
                            <img class="card-img-top rounded pb-2" src="admin/<?php echo $searchrow['img'] ?>" alt="Card image" style="width:100%">
                        
                        <div class="card-body p-0">
                            <strong class="card-title text-dark"><?php echo $searchrow['categories'] ?></strong>
                            <h5 class="card-text text-dark"><?php echo $searchrow['title'] ?></h5>
                            <p class="text-dark"><?php echo $searchrow['post_date'] ?></p>
                            <p class="text-justify text-secondary"><?php echo shorter($searchrow['discription'], 200) ?></p>
                            <b class="text-dark">Read The Artical</b>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
            }
        // }else{
        //     echo "<h5 class='text-center'> No result found for this search </h5>";
        // }
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