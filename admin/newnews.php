<?php 
 include("connection.php");
 if(isset($_POST['btn1']))
{ 
	$title=$_POST['newstitle'];
	$description=mysqli_real_escape_string($_POST['newsdes']);
    $date=date("Y-m-d");
if($_FILES['image']['error']>0)
 { 
   echo "error in uploading file";
 }	 
else {
	$source=$_FILES['image']['tmp_name'];
	$des="images/".$_FILES['image']['name'];
	 if(move_uploaded_file($source,$des))
	 {
$q="insert into tbl_news(news_title,news_description,news_image,news_addedon) values('$title','$description', '$des', '$date')";
 $rs=mysqli_query($conn ,$q);
if($rs) { 
 header("location:news.php?msg=inserted");
 }
else {
	mysqli_error($conn);
} 
	 }
}
 }
 ?>
 