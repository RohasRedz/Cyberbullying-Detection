<?php 
session_start();
if($_SESSION['login']==true) { ?>
<?php
if(isset($_POST['btn2'])) {
	include("connection.php");
	$categoryid=$_POST['cid'];
	$category=$_POST['categoryname'];
$q="update tbl_categories set cat_name='$category' where cat_id=$categoryid";
if(mysqli_query($conn ,$q)) { 

header("location:category.php?msg=updated");
?> 

<?php  }
else {
	echo mysqli_error($conn);
}
}
}
else {
	header("location:courses.php?msg=unauthorised");
}
?>