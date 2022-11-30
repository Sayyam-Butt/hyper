<div class="hamburger-menu container ">
    <input type="checkbox" >
    <div class="hamburger-lines">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </div>

    <ul class="menu-items ">
    <li><a href="index.php" >Home</a> </li>
    <?php
     include("include/connection.php");
     $query = "SELECT * FROM blogcategories WHERE `shownavbar` = 'Yes'";
     $result = mysqli_query($conn , $query);
     while($row = mysqli_fetch_assoc($result)){
      ?>
      <li class="dropdown ">
        <a  class=" border-0   font-weight-bold " href="<?php echo $row['caturl']?>"  data-bs-toggle="dropdown"><?php echo $row['categories']?></a>
        <?php
        $category = $row['blogs_id'];
        $query1 = "SELECT * FROM subcategories WHERE `cat_id`=$category";
        $result1=mysqli_query($conn,$query1);
        if($result1 != " "){
        ?>
            <ul class="dropdown-menu" >
              <?php 
               while ($row1 = mysqli_fetch_assoc($result1)) {  
              ?>
                <li><a href="<?php echo $row['caturl']?>" class="dropdown-items ms-2 "><?php echo $row1['name']?> </a></li>
       <?php 
        } 
        ?>
         </ul>   
        <?php
        }
        ?>
        
      </li>

      <?php
     }
    ?>       
        <li><a href="aboutus.php">About us</a> </li>
        <li><a href="contact-us.php">Contact us</a> </li>
    </ul>
</div>