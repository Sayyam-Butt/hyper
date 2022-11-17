<div class="hamburger-menu container ">
    <input type="checkbox" >
    <div class="hamburger-lines">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </div>

    <ul class="menu-items ">
    <li><a href="index.php" >Home</a> </li>
    <li class="dropdown ">
            <a  class=" border-0   font-weight-bold " href="#"  data-bs-toggle="dropdown">Business</a>
            <ul class="dropdown-menu" >
              <li><a href="" class="dropdown-items ms-2 ">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
            </ul>
          </li>
    <li class="dropdown ">
            <a  class=" border-0   font-weight-bold " href="#"  data-bs-toggle="dropdown">Fashion</a>
            <ul class="dropdown-menu dr" >
              <li><a href="" class="dropdown-items ms-2 ">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
            </ul>
          </li>
    <li class="dropdown ">
            <a  class=" border-0   font-weight-bold " href="#"  data-bs-toggle="dropdown">Tech</a>
            <ul class="dropdown-menu dr" >
              <li><a href="" class="dropdown-items ms-2 ">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
            </ul>
          </li>
    <li class="dropdown ">
            <a  class=" border-0   font-weight-bold " href="#"  data-bs-toggle="dropdown">Entertainment</a>
            <ul class="dropdown-menu dr" >
              <li><a href="" class="dropdown-items ms-2 ">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
              <li><a href="" class="dropdown-items mt-3 ms-2">Dropdown </a></li>
            </ul>
          </li>
        <?php 
        //  include("include/connection.php");
        //  $query = "SELECT * FROM blogcategories";
        //  $result= mysqli_query($conn , $query);
        //     while ($row=mysqli_fetch_assoc($result)) {      
        ?>
        <!-- <li><a href="category.php"><?php echo $row["categories"]?></a> </li> -->
        <?php
            // }
        ?>
        <li><a href="">About us</a> </li>
        <li><a href="contact-us.php">Contact us</a> </li>
    </ul>
</div>