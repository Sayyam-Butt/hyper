<?php

$search_value = $_POST["search"];

include("include/connection.php");

$sql = "SELECT * FROM subcategories INNER JOIN blogcategories 
ON cat_id = blogs_id 
WHERE `name` LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
             $a=1;
              while($row = mysqli_fetch_assoc($result)){
                $output .= "  <tr>
                <td> $a </td>
                <td> {$row['name']} </td>

                <td>{$row['categories']} </td>
                <td><a style='color:grey' href='edit-subcategory.php?id= {$row['id']} '><i class='far fa-edit'></i></a></td>
                <td><a style='color:grey' href='delete-subcat.php?id= {$row['id'] }&cat_id= {$row['cat_id'] }'><i class='fas fa-trash'></i></a></td>
             </tr>";
                $a++;
              }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>