<?php 
session_start();
if($_SESSION['login']==true) { ?>
<?php
	include("connection.php");
if(isset($_POST['btn2'])) {
	$newsid=$_POST['nid'];
	$news=$_POST['title'];
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
	 $q="UPDATE tbl_news SET news_title='$news', news_description='$describe', news_image='$des' where news_id=$newsid";

if(mysqli_query($conn ,$q)) { 
header("location:news.php?msg=updated");
  }
	 }
else {
	echo mysqli_error($conn);
}
}
} 
}
 }
else {
	header("location:index.php");
}
?>
