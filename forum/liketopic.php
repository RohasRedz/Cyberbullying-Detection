<?php 
include "connection.php"; 
$topic=$_GET['topic'];
$q="select topic_like_count from tbl_topics where topic_id=".$topic;
$rs = mysqli_query($con,$q);
$row = mysqli_fetch_assoc($rs);
	$count = $row['topic_like_count'];	
	$count = $count+1;
	$up = "update tbl_topics set topic_like_count='$count' where topic_id=".$topic;
	if( mysqli_query($con,$up))
		header("location:topic.php?id=$topic");
	else 
		echo mysqli_error($con);

?>
