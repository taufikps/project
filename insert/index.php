<?php
include "connection.php";

$selectlocation = mysqli_query($conn, "SELECT * FROM location")



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    

<div class="container">
  <h2>Location List</h2>
  <p>This is list registered location</p>     
  <a href="insert.php" class="glyphicon glyphicon-plus"></a>
  <span class="" aria-hidden="true"></span>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>City Name</th>
        <th>Coor X</th>
        <th>Coor Y</th>
        <th>Magnitudo</th>
        <th>Description</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
        while($locresult = mysqli_fetch_array($selectlocation))
        {
        
        ?>
        
      <tr>
        <td><?php echo $locresult['name']; ?></td>
        <td><?php echo $locresult['x']; ?></td>
        <td><?php echo $locresult['y']; ?></td>
        <td><?php echo $locresult['earthquake']; ?></td>
        <td><?php echo $locresult['information']; ?></td>
        <td><a href="delete_process.php?id=<?php echo $locresult['id']; ?>">Delete</a>
      </tr>
      
        <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
