<?php
$hostname="localhost";
$username="root";
$password="";
$conn=mysql_connect($hostname,$username,$password);
if($conn)
{
$db=mysql_select_db("discussion_forum_db");
}
else {
echo "host not found";
}
?>