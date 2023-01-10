<?php
include_once("include/connection.php");
$blog_id = $_POST["blogid"];
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
	$insertComments = "INSERT INTO commnet (parent_id, blog_fid,comment,email ,sender) VALUES ('".$_POST["commentId"]."','".$_POST["blogid"]."' , '".$_POST["comment"]."','".$_POST["email"]."' ,'".$_POST["name"]."');";
	$insertComments .= "UPDATE blogs SET comment_count=comment_count+1 WHERE id=$blog_id;";
	mysqli_multi_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
	$message = '<label class="text-success">Comment posted Successfully.</label>';
	$status = array(
		'error'  => 0,
		'message' => $message
	);	
} else {
	$message = '<label class="text-danger">Error: Comment not posted.</label>';
	$status = array(
		'error'  => 1,
		'message' => $message
	);	
}
echo json_encode($status);
?>