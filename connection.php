<?php
$host = "projectmap.mysql.database.azure.com";
$user = "toc@projectmap";
$password = "Techno123";
$database = "map";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn)
{
	echo "connection failed";
}
	


?>
