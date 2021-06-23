<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "map";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn)
{
	echo "connection failed";
}
	


?>