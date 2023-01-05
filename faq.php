<html lang="en">

<head>
    <?php include("include/head.php") ?>
    <style>
        ul li {
            list-style: none;
        }

        i {
            padding-right: 10px;
        }

        button {
            text-decoration: none !important;
            color: black !important;
            font-size: large !important;
        }

        .card {
            margin-top: 8px;
            background-color: #da5b374f !important
        }
    </style>
</head>

<body>

    <!-- ######## top-bar ######### -->
    <?php include("include/topbar.php") ?>
    <!-- ########### navbar ############### -->
    <?php include("include/navbar.php") ?>

    <div class="container">
        <h3 class="px-5" style="color: #da5b37;padding-top:60px">Frequently Asked Questions (FAQ)</h3>
        <div class="row p-5">
            <div class="benifitrow faq ">
                <div class="col-md-12">
                    <div id="tab-4" class="tab-content current">
                        <div class="accordion" id="accordionExample">

                            <?php
                            $query = "SELECT * FROM faq";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="card ">
                                        <div class="card-header" id="faq<?php echo $row['id'] ?>">
                                            <h5 class="mb-0">
                                                <button id="sign<?php echo $row['id'] ?>" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq_content<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="fa fa-plus" id="plus<?php echo $row['id'] ?>"></i><i class='fa-solid fa-minus' id="minus<?php echo $row['id'] ?>"></i>
                                                    <?php echo $row['question'] ?>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="faq_content<?php echo $row['id'] ?>" class="collapse" aria-labelledby="faq1" data-parent="#accordionExample">
                                            <div class="card-body" style="padding-left:60px">
                                                <?php echo $row['answer'] ?>
                                            </div>
                                        </div>
                                    </div>





                                    <script>
                                        $(document).ready(function() {
                                            $("#minus<?php echo $row['id'] ?>").hide()
                                            $("#sign<?php echo $row['id'] ?>").click(function() {
                                                $("#minus<?php echo $row['id'] ?>").toggle();
                                                $("#plus<?php echo $row['id'] ?>").toggle()
                                            });

                                        });
                                    </script>


                            <?php
                                }
                            }
                            ?>








                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- ############# product section ########### -->
    <?php include("include/productsection.php") ?>
    <!-- ############# footer ########### -->
    <?php include("include/footer.php") ?>
</body>

</html>