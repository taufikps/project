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
<form class="form-horizontal" action="insert_process.php" method="POST">
    <center><h1></h1></center>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city">City Name:</label>
    <div class="col-xs-2">
      <input type="text" name="city" class="form-control " id="city" placeholder="Enter City Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="x">Coordinate X:</label>
    <div class="col-xs-2">
      <input type="number" name="x" class="form-control" id="x" placeholder="Enter Coordinate">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="y">Coordinate Y:</label>
    <div class="col-xs-2">
      <input type="number" name="y" class="form-control" id="y" placeholder="Enter Coordinate">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="magnitudo">Magnitudo:</label>
    <div class="col-xs-2">
      <input type="number" name="magnitudo" class="form-control" id="magnitudo" placeholder="Enter Magnitudo">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="description">Description:</label>
    <div class="col-xs-2">
      <textarea class="form-control" name="description" rows="5" id="comment"></textarea>
    </div>
  </div>
    
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="submit" name="submit" class="btn btn-default">
    </div>
  </div>
</form> 
</body>
</html>