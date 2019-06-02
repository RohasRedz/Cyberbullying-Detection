<?php 
include "connection.php";
if(isset($_POST['btn'])){
    $topicid=$_POST['tid'];
	$user=$_POST['uid'];

   $comment=$_POST['ucomment'];
   $date=date("Y-m-d");
 $q="insert into tbl_comments(topic_id,user_id, comment_description, comment_date) 
 values('$topicid', '$user', '$comment','$date')";
 $rs=mysqli_query($con,$q);
 if($rs) {
	 header("location:topic.php?id=$topicid");
 }
 else {
	 echo mysqli_error($con);
 }
}
?>