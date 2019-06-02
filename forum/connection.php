<?php
$hostname="localhost";
$username="root";
$password="";
$con=mysqli_connect($hostname,$username,$password);
if($con)
{
$db=mysqli_select_db($con,"discussion_forum_db");
}
else {
echo "host not found";
}
?>