<?php
session_start();
$blogid=$_SESSION['blogid'];
include_once("include/connection.php");
include("include/time_method.php");
$commentQuery = "SELECT * FROM commnet WHERE parent_id = '0' AND blog_fid = '$blogid' ORDER BY id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
	                    <div class="my-3">
                            
                            <div class=" comment-box border rounded py-3  px-5">
                                <div class="clearfix">
                                    <div class="float-start">
                                        <h4 class="">'.$comment["sender"].'</h4>
                                        <p style="font-size:12px">'.timeAgo($comment["date"]).'</p>
                                    </div>
                                </div>
                                <h5 style="padding-left:20px;">'.$comment["comment"].'</h5>
								<div class="panel-footer" align="right"><button type="button" class="btn btn-dark reply" id="'.$comment["id"].'">Reply</button></div>
                            </div>
                        </div> ';
	$commentHTML .= getCommentReply($conn, $comment["id"]);
}
echo $commentHTML;

function getCommentReply($conn, $parentId = 0, $marginLeft = 0) {
	$commentHTML = '';
	$commentQuery = "SELECT id, parent_id, comment, sender, date FROM commnet WHERE parent_id = '".$parentId."'";	
	$commentsResult = mysqli_query($conn, $commentQuery);
	$commentsCount = mysqli_num_rows($commentsResult);
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if($commentsCount > 0) {
		while($comment = mysqli_fetch_assoc($commentsResult)){  
			$commentHTML .= '
				<div class="my-3" style="margin-left:'.$marginLeft.'px">
				
				<div class=" comment-box border rounded py-3  px-5">
					<div class="clearfix">
						<div class="float-start">
							<h4 class="">'.$comment["sender"].'</h4>
							<p>'.$comment["date"].'</p>
						</div>
					</div>
					<p style="padding-left:20px;">'.$comment["comment"].'</p>
					<div class="panel-footer" align="right"><button type="button" class="btn btn-dark reply" id="'.$comment["id"].'">Reply</button></div>
				</div>
			</div>';
			$commentHTML .= getCommentReply($conn, $comment["id"], $marginLeft);
		}
	}
	return $commentHTML;
}
