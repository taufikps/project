<?php
	include "connection.php";
        $condition=0;
        
            
             $region = $_GET['region'];
             $year = $_GET['year'];
             $magnitudo = $_GET['magnitudo'];
            
            if($region != "0" && $year != "0" && $magnitudo != "0")//REGION, YEAR, MAGNITUDO
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE lokasi='$region' AND year='$year' AND jarak='$magnitudo'");
                //echo "SELECT * FROM location WHERE lokasi='$region' AND tahun='$year' AND range='$magnitudo'";
                $condition = 1;
            }
            else if($region != "0" && $year != "0" && $magnitudo == "0")//REGION,YEAR
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE lokasi='$region' AND year='$year'");
                //echo "SELECT * FROM location WHERE lokasi='$region' AND tahun='$year'";
                $condition = 2;
            }
            else if($region != "0" && $year == "0" && $magnitudo == "0")//REGION
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE lokasi='$region'");
                //echo "SELECT * FROM location WHERE lokasi='$region'";
                $condition = 3;
            }
            else if($region != "0" && $year == "0" && $magnitudo != "0")//REGION,MAGNITUDO
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE lokasi='$region' AND jarak='$magnitudo'");
                //echo "SELECT * FROM location WHERE lokasi='$region'";
                $condition = 4;
            }
            else if($region == "0" && $year != "0" && $magnitudo != "0")//MAGNITUDO, YEAR
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE year='$year' AND jarak='$magnitudo'");
                //echo "SELECT * FROM location WHERE lokasi='$region'";
                $condition = 5;
            }
            else if($region == "0" && $year == "0" && $magnitudo != "0")//MAGNITUDO
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE jarak='$magnitudo'");
                //echo "SELECT * FROM location WHERE lokasi='$region'";
                $condition = 6;
            }
            else if($region == "0" && $year != "0" && $magnitudo == "0")//YEAR
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE year='$year'");
                //echo "SELECT * FROM location WHERE tahun='$year'";
                $condition = 7;
            }
           
         
           
       
        
	


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Image Map By Taufik</title>
    <meta name="author" content="Codeconvey" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style_2.css">
    
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" type="text/css" href="css/demo_1.css" />
    <style>
        

        body {
            background-color: #blue;
        }
        .container{
             max-width:500px;
              margin:0 auto;
              background-color: red;
        }
        nav ul li{
              list-style:none;
          }
        nav ul li a{
              text-decoration:none;
              color:#222;
              background-color:#ecf0f1;
              padding:10px;
              float:left;
              font-weight: bold;

        }
        .active{
              background-color:#d35400;
              color:#fff;

        }


        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }

        
        
    </style>
	
</head>
<body>
    <form action="index2.php" method="POST">
	<div class="wrap">
		
		<div class="menu">
                    <nav class="navecation">
			<ul>
				<li><a class="list active" href="index.php">PETA PERSEBARAN</a></li>
				<li><a class="list" href="data.php">PENJELASAN</a></li>
								
			</ul>
                    </nav>
		</div>
            
            <div class="">
                    <nav class="navecation">
			<ul>
				<li><a class="list " href="index.php">MAP</a></li>
				<li><a class="list active" href="data.php">DATA</a></li>
								
			</ul>
                    </nav>
	    </div>
		<div class="badan2">			
			
    
			<div class="content2">
                            <table id="customers">
                                
                                <tr>
                                  <th>Lokasi</th>
                                  <th>Tanggal</th>
                                  <th>Provinsi</th>
                                  <th>Magnitudo</th>
                                </tr>
                                <?php
                                
                                while($mapresult = mysqli_fetch_array($mapselect))
                                {
                                
                                ?>
                                <tr>
                                  <td><?php echo $mapresult['lokasi']; ?></td>
                                  <td><?php echo $mapresult['tanggal']; ?></td>
                                  <td><?php echo $mapresult['provinsi']; ?></td>
                                  <td><?php echo $mapresult['magnitudo']; ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
		</div>
		<div class="clear"></div>
		
	</div>
    
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>
   </form> 
</body>
</html>