    <?php
    include("include/connection.php");
    $query = "SELECT * FROM site_setting";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="https://kit.fontawesome.com/1e891c0bbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    

    
    <link rel="icon" type="image/x-icon" href="admin/<?php echo $row['favicon'] ?>">
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