<?php
function shorter($text, $chars_limit)
{
    if (strlen($text) > $chars_limit) {
        $new_text = substr($text, 0, $chars_limit);
        $new_text = trim($new_text);
        return $new_text . "...";
    } else {
        return $text;
    }
}
include("include/connection.php");
$pageurl = $_POST["pageurl"];

$query1 = "SELECT * FROM subcategories WHERE `subcaturl`='$pageurl'";
$run1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($run1);
$subcatid = $row1['id'];

$query2 = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `subcategory`= $subcatid  ORDER BY id DESC ";
$result =  mysqli_query($conn, $query2);
$output="";
if(mysqli_num_rows($result)>0){
        while ($rowforblog = mysqli_fetch_assoc($result)) {
                $output='
                <div class="col-md-4">
                  <div class="card border-0 pb-3">
                    <a href="http://localhost/hyper/'.$rowforblog['pageurl'].'">
                     <img class="card-img-top rounded pb-2" src="admin/'. $rowforblog['img'] .'" alt="Card image" style="width:100%">

                      <div class="card-body p-0">
                          <strong class="card-title text-dark">'. $rowforblog['categories'] .' </strong>
                          <h5 class="card-text text-dark">'.  $rowforblog['title'] .' </h5>
                          <small class="text-dark"> '. $rowforblog['post_date'] .' </small>
                          <p class="text-justify text-secondary"> '.shorter($rowforblog['discription'], 200) .' </p>
                          <b class="text-dark">Read The Artical</b>
                       </div>
                    </a>
                  </div>
                </div>
               
';   
echo $output;
        }
       
}






?>