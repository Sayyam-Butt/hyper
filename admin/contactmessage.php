<?php include('cofig.php');
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
    <title>Hyper | Blogs </title>
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

                                </div>
                                <h4 class="page-title">Messages </h4>
                            </div>

                            <div class="card py-2">
                                <div class="card-body" id="fetchmessage">




                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-data-blog">
                                                <?php


                                                $sql = "SELECT * FROM  contactmessage ";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $a = 1;
                                                    while ($row =  mysqli_fetch_assoc($result)) {
                                                ?>

                                                        <tr>
                                                            <td class="align-middle"><?php echo $a; ?> </td>
                                                            <td class="align-middle"><?php echo $row["name"] ?></td>
                                                            <td class="align-middle"><?php echo $row["email"] ?></td>
                                                            <td class="align-middle"><?php echo shorter($row["message"], 20) ?></td>

                                                            <td class="align-middle"><?php echo $row["time"] ?></td>
                                                            <td class="align-middle justify-contact-end">
                                                                <a style="color:white" class=" viewbutton btn btn-sm btn-success" data-id="<?php echo $row["id"]
                                                                    ?>">View</a>
                                                                <a style="color:white;" data-id="<?php
                                                                echo $row["id"]
                                                                ?>" class="delbutton btn btn-sm btn-danger">Delete</a>
                                                            </td>

                                                        </tr>

                                                <?php $a++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>


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


    <script>
        $(document).ready(function() {
            $(".viewbutton").on("click", function(e) {
                var msgid = $(this).data("id");
                $.ajax({
                    url: "viewmessage.php",
                    type: "POST",
                    data: {
                        id: msgid
                    },
                    success: function(data) {
                        $("#fetchmessage").html(data);
                    }

                });
            });
        });



        $(document).ready(function() {
            $(".delbutton").on("click", function(e) {
                var msgid = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "delete-message.php",
                    type: "POST",
                    data: {
                        id: msgid
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                        }
                    }

                });
            });
        });
    </script>


</body>

</html>