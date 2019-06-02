<?php 
session_start();
if($_SESSION['login']==true) { ?>
<?php
	include("connection.php");
if(isset($_POST['btn2'])) {
	$topicid=$_POST['tid'];
	$topic=$_POST['title'];
	$describe=$_POST['description'];	
	if($_FILES['image']['name'])
{
	if($_FILES['image']['error']>0)
	{ echo "file uploading error"; 
     }
    else 
	{  $src=$_FILES['image']['tmp_name'];
     $des="images/".$_FILES['image']['name'];
	 if(move_uploaded_file($src,$des)) {
	 $q="UPDATE tbl_topics SET topic_title='$topic', topic_description='$describe', topic_image='$des' where topic_id=$topicid";

if(mysql_query($q)) { 
header("location:topics.php?msg=updated");
  }
	 }
else {
	echo mysql_error();
}
}
} 
}
 }
else {
	header("location:index.php");
}
?>
