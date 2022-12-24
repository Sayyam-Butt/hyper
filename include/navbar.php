
  <!-- ########### navbar ############### -->
  <div class="hamburger-menu container ">
        <input type="checkbox">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>

        <ul class="menu-items nav-item ">
            <div class="dropdown drop">
                <li class="dropdown-item"> <a style="color: #555;" href="index" class="ms-4">Home</a> </li>
            </div>
            <?php
              include("include/connection.php");
              $query = "SELECT * FROM blogcategories WHERE `shownavbar` = 'Yes'";
              $result = mysqli_query($conn , $query);
              while($row = mysqli_fetch_assoc($result)){
                ?>
            <div class="dropdown drop">
                <li class="dropdown-item"> <a  style="color: #555;" class="mx-4 " href="<?php echo $row['caturl']?>"><?php echo $row['categories']?></a> </li>
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
                <li><a class="mx-4 "  style="color: #555;" href="gallery">Video Gallery</a> </li>
            </div>
             <div class="dropdown drop">
                <li><a  class="mx-4"  style="color: #555;" href="aboutus">About us</a> </li>
            </div>
            <div class="dropdown drop">
                <li class="dropdown-item"> <a  style="color: #555;" class="mx-4" href="contact-us">Contact Us</a> </li>
            </div>
            <div class="dropdown drop">
                <li class="dropdown-item"> <a  style="color: #555;" class="mx-4" href="faq">FAQ's</a> </li>
            </div>
           
        </ul>
    </div>