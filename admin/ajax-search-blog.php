<?php

$search_value = $_POST["search"];
include("include/connection.php");
$sql = "SELECT * FROM blogs
 INNER JOIN blogcategories ON blogs.blogcategories = blogcategories.blogs_id
 WHERE title LIKE '%{$search_value}%' OR categories LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
             $a=1;
              while($row = mysqli_fetch_assoc($result)){
                if ($row["section"]==1) {
                  $section= "Section 1";
                 }
                 if ($row["section"]==2) {
                    $section =  "Section 2";
                 }
                 if ($row["section"]=="0") {
                   $section = "Null";
                 }
                $output .= "<tr><td class='align-middle'>$a </td>
                <td class='align-middle'><img style='width:70px;height:70;border-radius:2px;' 
                src='{$row['img']}'> </td>
                <td class='align-middle'>{$row["title"]}</td>
                <td class='align-middle'> {$row["categories"]}</td>
                <td class='align-middle'>$section</td>
                <td class='align-middle'> {$row["post_date"]}</td>
                <td class='align-middle'><a style='color:grey;' href='edit-blog.php?id= {$row["id"]}'> <i class='far fa-edit'></i></a></td>
                <td class='align-middle'><a style='color:grey;'  href='delete-blog.php?id= {$row["id"]}&cat_id= {$row["blogs_id"]}?>' '><i class='fas fa-trash'></i></a></td></tr>";
                $a++;
              }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
