<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/head.php")?>
    <title>About Us</title>   
</head>

<body>
     <!-- ######## top-bar ######### -->
     <div class="div sticky-top bg-white">
        <?php include("include/topbar.php")?>
       <!-- ########### navbar ############### -->
       <?php include("include/navbar.php")?>
    </div>
    <div class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <h1  class=" pb-2 bor" >About Us</h1>
                <?php 
                            include("include/connection.php");
                            $query="SELECT * FROM site_setting";
                            $run=mysqli_query($conn,$query);
                            while ($row=mysqli_fetch_assoc($run)) {    
                        ?>
                <p class="text-justify pt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi nulla enim id eius! Voluptatem quidem unde ea quia quam inventore sed veniam cum. Quidem, mollitia repellendus. Necessitatibus culpa cum quisquam! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident mollitia harum enim, neque quod, quidem est, eius odio at ex incidunt beatae. Vitae quam repudiandae voluptates laboriosam quisquam a libero.</p>
            <div class="icons text-center ">
                <div class="row">
                    <div class="col-md-4"><i  style="color:#da5b37;" class=" d-block fa-solid fa-location-dot fa-3x pb-3 pt-4"></i>
                   <span class="fw-bold ps-3 "> <?php echo $row['address']?></span>
                    </div>
                    <div class="col-md-4"><i  style="color:#da5b37;" class="fa-regular  d-block fa-envelope fa-3x pb-3 pt-4"></i>
                    <span class="fw-bold ps-3"><?php echo $row['email']?></span>
                    </div>
                    <div class="col-md-4"><i  style="color:#da5b37;" class="fa-solid fa-phone d-block fa-3x pb-3 pt-4"></i>
                    <span class="fw-bold ps-3"><?php echo $row['contactnum']?></span>
                    </div>
                </div>
            </div>
            <?php
              }
            ?>
                </div>
                <div class="col-md-1"></div>
            </div>
            
        </div>
    </div>
</body>

</html>