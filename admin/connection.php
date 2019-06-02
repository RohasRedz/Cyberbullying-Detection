<?php
$hostname="localhost";
$username="root";
$password="";
$conn=mysqli_connect($hostname,$username,$password);
if($conn)
{
$db=mysqli_select_db($conn ,"discussion_forum_db");
}
else {
echo "host not found";
}
?>