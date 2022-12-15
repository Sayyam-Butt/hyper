<?php

$search_value = $_POST["search"];

include("include/connection.php");

$sql = "SELECT * FROM blogcategories
 WHERE categories LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
             $a=1;
              while($row = mysqli_fetch_assoc($result)){
                $status=$row["shownavbar"];
                if ($status == 'Yes') {
                    $check='Published';
                } else {
                    $check='Not Publish';
                }
                $output .= " <tr>
                <td>  $a </td>
                <td> {$row["categories"]} </td>
                <td> {$row["post"]}</td>
                <td> $check </td>
                <td><a style='color:grey;' href='edit-blogcategory.php?blogs_id=  {$row["blogs_id"]} '><i class='far fa-edit'></i></a></td>
                <td><a style='color:grey;' href='delete-inline.php?blogs_id= {$row["blogs_id"]} '><i class='fas fa-trash'></i></a></td>
             </tr>";
                $a++;
              }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>