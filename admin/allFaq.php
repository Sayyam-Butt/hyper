<?php include('cofig.php');
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
if (isset($_GET['add'])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
    <title>Hyper | FaQ's </title>
    <style>
        #pagination {
            margin: 0;
            padding: 0;
            text-align: center
        }

        #pagination li {
            display: inline
        }

        #pagination li a {
            display: inline-block;
            text-decoration: none;
            padding: 4px 8px;
            color: #000;
            font-size: 10px;
        }

        #pagination li a {
            border-radius: 5px;
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s;
            background-color: #e7e7e7;
        }

        #pagination li a.active {
            background-color: #323a46;
            color: #fff
        }

        #pagination li a:hover:not(.active) {
            background-color: #b1aeae;
        }
    </style>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <?php include('include/navbar.php'); ?>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Begin page -->
        <div class="wrapper">
            <?php include('include/sidebar.php'); ?>
            <div class="content-page">
                <div class="content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <a class="btn btn-primary" href="add-faq.php">Add FaQ</a>
                                </div>
                                <h4 class="page-title">All FaQ's </h4>
                            </div>
                            <?php if (isset($info_alert)) {
                                echo $info_alert;
                            }
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div id="search-bar">
                                                <input id="searchfaq" type="search" class="form-control" placeholder="Search...">
                                            </div>

                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Question</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-data-faq">
                                                <?php
                                                include("include/connection.php");
                                                $limit = 5;
                                                if (isset($_GET['page'])) {
                                                    $page = $_GET['page'];
                                                } else {
                                                    $page = 1;
                                                }
                                                $offset = ($page - 1) * $limit;
                                                $sql = "SELECT * FROM faq LIMIT $offset,$limit ";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $a = 1;
                                                    while ($row =  mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr>
                                                            <td class="align-middle"><?php echo $a; ?> </td>
                                                            <td><?php echo shorter($row['question'],80)?></td>
                                                            <td class="align-middle">
                                                                <a style="color:grey;" href="edit-faq.php?id=<?php echo $row['id']?>"><i class='far fa-edit'></i></a>
                                                            </td>
                                                            <td class="align-middle ">           
                                                                <a style="color:grey;" href="del-faq.php?id=<?php echo $row['id']?>"><i class='fas fa-trash'></i>
                                                            </td>
                                                        </tr>
                                                      
                                                <?php $a++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                    include("include/connection.php");
                                    $query = "SELECT * FROM faq";
                                    $run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($run)) {
                                        $total_records = mysqli_num_rows($run);
                                        $total_pages = ceil($total_records / $limit);

                                    ?>
                                        <ul id="pagination">
                                            <?php
                                            for ($i = 1; $i <= $total_pages; $i++) {
                                                if ($i == $page) {
                                                    $active = "active";
                                                } else {
                                                    $active = "";
                                                }
                                            ?>
                                                <li><a class="<?php echo $active ?>" href="allFaq.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

                                        <?php
                                            }
                                        }
                                        ?>
                                        </ul>
                                </div>
                            </div>
                            <!-- end page title -->
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
            <!-- content-page -->
        </div>
        <!-- end wrapper-->
    </div>
    <!-- END Container -->
    <?php include("include/script.php") ?>

</body>

</html>