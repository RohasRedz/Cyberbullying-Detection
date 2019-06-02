<?php 
include "connection.php"; 
$topic=$_GET['topic'];
$comment=$_GET['comment'];
$q="select comment_dislike_count from tbl_comments where comment_id=".$comment;
$rs = mysqli_query($con,$q);
$row = mysqli_fetch_assoc($rs);
	$count = $row['comment_dislike_count'];	
	$count = $count+1;
	$up = "update tbl_comments set comment_dislike_count='$count' where comment_id=".$comment;
	if( mysqli_query($con,$up))
		header("location:topic.php?id=$topic");
	else 
		echo mysqli_error($con);

?>