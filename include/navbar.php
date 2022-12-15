
  <!-- ########### navbar ############### -->
  <div class="hamburger-menu container ">
        <input type="checkbox">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>

        <ul class="menu-items">
            <div class="dropdown drop">
                <li class="dropdown-item"> <a href="index">Home</a> </li>
            </div>
            <?php
              include("include/connection.php");
              $query = "SELECT * FROM blogcategories WHERE `shownavbar` = 'Yes'";
              $result = mysqli_query($conn , $query);
              while($row = mysqli_fetch_assoc($result)){
                ?>
            <div class="dropdown drop">
                <li class="dropdown-item"> <a href="<?php echo $row['caturl']?>"><?php echo $row['categories']?></a> </li>
                <?php
                  $category = $row['blogs_id'];
                  $query1 = "SELECT * FROM subcategories WHERE `cat_id`=$category";
                  $result1=mysqli_query($conn,$query1);
                  if($result1 != " "){
                  ?>
                <div class="dropdown-content">
                  <?php 
                  while ($row1 = mysqli_fetch_assoc($result1)) {  
                  ?>
                    <!-- <li><a href="blogsubcategory?subcat_id=<?php 
                    // echo $row1['id']
                    ?>
                    &&caturl=
                    <?php 
                    // echo $row['caturl']
                    ?>
                    "><?php
                    //  echo $row1['name']
                     ?></a></li> -->

                    <li><a href="<?php echo $row1['subcaturl']?>"><?php echo $row1['name']?></a></li>
                    <?php 
                     } 
                    ?>
                </div>
                <?php
                  }
                ?>
            </div>
                  <?php
                    }
                  ?>      
             <div class="dropdown drop">
                <li><a href="aboutus">About us</a> </li>
            </div>
            <div class="dropdown drop">
                <li class="dropdown-item"> <a href="contact-us">Contact Us</a> </li>
            </div>
           
        </ul>
    </div>