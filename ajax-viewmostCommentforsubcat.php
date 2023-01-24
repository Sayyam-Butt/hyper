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
 $pageurl = $_POST["pageurl1"];

$queryforcat = "SELECT * FROM subcategories WHERE `subcaturl`='$pageurl'";
$queryforcat_res = mysqli_query($conn, $queryforcat);
$rowforcat = mysqli_fetch_assoc($queryforcat_res);
$subcatid1 = $rowforcat['id'];

$queryforblog = "SELECT * FROM blogs INNER JOIN blogcategories ON blogcategories.blogs_id = blogs.blogcategories  WHERE `shownavbar` = 'Yes' AND `subcategory`= $subcatid1 ORDER BY comment_count DESC ";
$queryforblog_res =  mysqli_query($conn, $queryforblog);
$output="";
if(mysqli_num_rows($queryforblog_res)>0){
        while ($rowforblog = mysqli_fetch_assoc($queryforblog_res)) {
                $output='
                <div class="col-md-4 ">
                <div class="card border-0 pb-3">
                <a href="http://localhost/hyper/'.$rowforblog['pageurl'].'">
                <div class="img-wraper rounded">
                <img class="card-img-top rounded pb-2 inner-img" src="admin/'. $rowforblog['img'] .'" alt="Card image" style="width:100%">
                </div>
                

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