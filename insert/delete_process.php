<?php 
include "connection.php";

$id = $_GET['id'];

$deletelocquery = mysqli_query($conn, "DELETE FROM location WHERE id='$id'");

if($deletelocquery)
{
    header("Location:index.php");
    
}





?>