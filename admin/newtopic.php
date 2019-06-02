<?php 
 include("connection.php");
 if(isset($_POST['btn1']))
{ 
	$title=$_POST['topictitle'];
	$description=$_POST['topicdes'];
    $date=date("Y-m-d");
	$cat=$_POST['category'];

if($_FILES['image']['error']>0)
 { 
   echo "error in uploading file";
 }	 
else {
	$source=$_FILES['image']['tmp_name'];
	$des="images/".$_FILES['image']['name'];
	 if(move_uploaded_file($source,$des))
	 {
$q="insert into tbl_topics(topic_title,cat_id,topic_description,topic_date,topic_image) values('$title','$cat','$description', '$date', '$des')";
 $rs=mysqli_query($conn ,$q);
if($rs) { 
 header("location:topics.php?msg=inserted");
 }
else {
	mysqli_error($conn);
} 
	 }
}
 }
 ?>
 