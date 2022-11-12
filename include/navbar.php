<div class="hamburger-menu container ">
    <input type="checkbox" >
    <div class="hamburger-lines">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </div>

    <ul class="menu-items ">
        
        <li><a href="index.php" class="active">Home</a> </li>
        <?php 
         include("include/connection.php");
         $query = "SELECT * FROM blogcategories";
         $result= mysqli_query($conn , $query);
            while ($row=mysqli_fetch_assoc($result)) {      
        ?>
        <li><a href="category.php"><?php echo $row["categories"]?></a> </li>
        <?php
            }
        ?>
        <li><a href="">About us</a> </li>
        <li><a href="contact-us.php">Contact us</a> </li>
    </ul>
</div>