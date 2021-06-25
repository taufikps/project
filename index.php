<?php
	include "connection.php";
        $condition=0;
        if(isset($_POST['submit']))
        {
            
             $region = $_POST['region'];
             $year = $_POST['year'];
             $magnitudo = $_POST['magnitudo'];
            
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
                //echo "SELECT * FROM location WHERE range='$magnitudo'";
                $condition = 6;
            }
            else if($region == "0" && $year != "0" && $magnitudo == "0")//YEAR
            {
                $mapselect = mysqli_query($conn,"SELECT * FROM location WHERE year='$year'");
                //echo "SELECT * FROM location WHERE tahun='$year'";
                $condition = 7;
            }
           
           
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
    background-color: #red;
}
.container{
     max-width:500px;
      margin:0 auto;
      background-color: yellow;
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

        
        
        </style>
	
</head>
<body>
    <form action="index.php" method="POST">
	<div class="wrap">
		
		<div class="menu">
                    <nav class="">
			<ul>
				<li><a class="list active" href="index.php">PETA PERSEBARAN</a></li>
				<li><a class="list" href="penjelasan.php">PENJELASAN</a></li>
								
			</ul>
                    </nav>
		</div>
         <div class="wrap2">   
            <div class="menu2">
                    <nav class="">
			<ul>
				<li><a class="list active" href="index.php">MAP</a></li>
                                <?php if($condition!=0)
                                { ?>
                                    <li><a class="list" href="data.php?region=<?php echo $region; ?>&year=<?php echo $year; ?>&magnitudo=<?php echo $magnitudo; ?>">DATA</a></li>
                                <?php }?>			
			</ul>
                    </nav>
	    </div>
         </div>
            
		<div class="badan">			
			<div class="sidebar">
                            <h2>EARTHQUAKE RECORDS</h2><br>
				<ul>    
                                        <li>REGION</li>
                                        <li><select name="region">
                                            <option value="0">Choose Region</option>
                                            <?php 
                                            $regionselect = mysqli_query($conn,"SELECT * FROM location");
                                            while($regionresult = mysqli_fetch_array($regionselect)){?>
                                
                                            <option value="<?php echo $regionresult['lokasi']; ?>"><?php echo $regionresult['lokasi']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </li>
                                        
                                        <li>YEAR</li>
                                        <li><select name="year">
                                            <option value="0">Choose Year</option>
                                            <?php 
                                            $yearselect = mysqli_query($conn,"SELECT * FROM year_table");
                                            while($yearresult = mysqli_fetch_array($yearselect)){?>
                                
                                            <option value="<?php echo $yearresult['tahun']; ?>"><?php echo $yearresult['tahun']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </li>
                                        <li>MAGNITUDO</li>
                                        <li><select name="magnitudo">
                                            <option value="0">Choose Magnitudo</option>
                                            <?php 
                                            $magnitudoselect = mysqli_query($conn,"SELECT * FROM magnitudo");
                                            while($magnitudoresult = mysqli_fetch_array($magnitudoselect)){?>
                                
                                            <option value="<?php echo $magnitudoresult['magnitudo']; ?>"><?php echo $magnitudoresult['magnitudo']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </li>
                                        <br>
                                        <li><input type="submit" name="submit" value="submit"></li>
								
				</ul>
			</div>
    </form>
			<div class="content">
                            <div id="image-map">
				<img width="500" height="100" src="petasumatra.jpg" alt="Our Locations">  
                                <?php
                                if($condition != "0")
                                {
                                    while($mapresult = mysqli_fetch_array($mapselect))
                                    {
                                        if($mapresult)
                                        {

                                            ?>

                                           <div class="pin pin-down" data-xpos="<?php echo $mapresult['x']; ?>" data-ypos="<?php echo $mapresult['y']; ?>">  
                                             <h2><?php echo $mapresult['lokasi']; ?></h2>     
                                             <ul>
                                               <li><?php echo $mapresult['magnitudo']; ?> Mw</li>
                                               <li><?php echo $mapresult['tanggal']; ?></li>
                                               <li><?php echo $mapresult['provinsi']; ?></li>

                                             </ul>
                                           </div>
                                         <?php
                                        }
                                    }
                                }
                                
                                    ?>

                                 </ul>
                            </div>
			</div>
		</div>
		<div class="clear"></div>
		
	</div>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="./script.js"></script>
    
</body>
</html>
