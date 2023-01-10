    <?php
    include("include/connection.php");
    $query = "SELECT * FROM site_setting";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);
    $favicon = $row['favicon'];
    ?>
    <?php
     $pageurl = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
      $currenturl = $pageurl[2];

     $meta_title = "The Canvas Times";
     $meta_desc = "The Canvas Times";
     $meta_keyword = "The Canvas Times";

     if($currenturl=="aboutus"){
        $meta_title = "About Us - The Canvas Times";
        $meta_desc = "The Canvas Times";
        $meta_keyword = "The Canvas Times";
     }
     if($currenturl=="gallery"){
        $meta_title = "Video Gallery - The Canvas Times";
        $meta_desc = "The Canvas Times";
        $meta_keyword = "The Canvas Times";
     }
     if($currenturl=="faq"){
        $meta_title = "FaQ's - The Canvas Times";
        $meta_desc = "The Canvas Times";
        $meta_keyword = "The Canvas Times";
     }
     if($currenturl=="contact-us"){
        $meta_title = "Contact Us - The Canvas Times";
        $meta_desc = "The Canvas Times";
        $meta_keyword = "The Canvas Times";
     }
     if($currenturl=="index"){
        $meta_title = "The Canvas Times";
        $meta_desc = "The Canvas Times";
        $meta_keyword = "The Canvas Times";
     }
     $queryfortag = "SELECT * FROM blogs WHERE `pageurl`='$currenturl'";
     $queryfortag_res = mysqli_query($conn,$queryfortag);
     if(mysqli_num_rows($queryfortag_res)>0){
        while($meta=mysqli_fetch_assoc($queryfortag_res)){
             $meta_title = $meta['meta_title']." - The Canvas Times";
             $meta_desc = $meta['meta_desc'];
             $meta_keyword = $meta['meta_keyword'];
        }
     }
     $queryforcattag = "SELECT * FROM blogcategories WHERE `caturl`='$currenturl'";
     $queryforcattag_res = mysqli_query($conn,$queryforcattag);
     if(mysqli_num_rows($queryforcattag_res)>0){
        while($metacattag=mysqli_fetch_assoc($queryforcattag_res)){
             $meta_title = $metacattag['meta_title']." - The Canvas Times";
             $meta_desc = $metacattag['meta_desc'];
             $meta_keyword = $metacattag['meta_keyword'];
        }
     }
     $queryforsubcattag = "SELECT * FROM subcategories WHERE `subcaturl`='$currenturl'";
     $queryforsubcattag_res = mysqli_query($conn,$queryforsubcattag);
     if(mysqli_num_rows($queryforsubcattag_res)>0){
        while($metasubcattag=mysqli_fetch_assoc($queryforsubcattag_res)){
             $meta_title = $metasubcattag['meta_title']." - The Canvas Times";
             $meta_desc = $metasubcattag['meta_desc'];
             $meta_keyword = $metasubcattag['meta_keyword'];
        }
     }
     $queryforblogtag = "SELECT * FROM tags WHERE `tagurl`='$currenturl'";
     $queryforblogtag_res = mysqli_query($conn,$queryforblogtag);
     if(mysqli_num_rows($queryforblogtag_res)>0){
        while($metasubcattag=mysqli_fetch_assoc($queryforblogtag_res)){
             $meta_title = $metasubcattag['meta_title']." - The Canvas Times";
             $meta_desc = $metasubcattag['meta_desc'];
             $meta_keyword = $metasubcattag['meta_keyword'];
        }
     }
   
     
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $meta_title ?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
    <meta name="keywords" content="<?php echo $meta_keyword?>">
    <script src="https://kit.fontawesome.com/1e891c0bbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    

    
    <link rel="icon" type="image/x-icon" href="admin/<?php echo  $favicon  ?>">
    <style>
        body {
            font-family: times;
        }

        .bor {
            border-bottom: 1px solid #da5b37;
        }

        .drop {
            /* position: relative; */
            display: inline-block;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;

        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background-color: rgb(241, 241, 241);
        }

        .dropdown:hover .dropdown-content {
            display: block;


        }
    </style>