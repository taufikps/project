<?php
include "connection.php";
$city = $_POST['city'];
$coorX = $_POST['x'];
$coorY = $_POST['y'];
$magnitudo = $_POST['magnitudo'];
$description = $_POST['description'];
$submit = $_POST['submit'];

if($submit)
{
    $locquery = mysqli_query($conn, "INSERT INTO location VALUES ('','$city','$coorX','$coorY','$magnitudo','$description')");
 
    echo "success insert";
    
}



?>