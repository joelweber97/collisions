<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wildlife Collision Management Program</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
</head>
<body>
	<div class="container">
		<header class="row">
		</header>
		
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
			  	
				<div class="container-fluid">
				    <div class="navbar-header">
				    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				        	<span class="sr-only">Toggle navigation</span>
				        	<span class="icon-bar"> </span>
				        	<span class="icon-bar"> </span>
				        	<span class="icon-bar"> </span>
				      	</button>
				      	<a class="navbar-brand" href="">Wildlife Collision Management</a>
				    </div>
	
				  
				    <div class="collapse navbar-collapse" id="navbar">
				    	<ul class="nav navbar-nav navbar-right">
				        	<li><a href="index.html">Home</a></li>
				        	<li class="dropdown">
						    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Collisions
						    	<span class="caret"> </span></a>
						    	<ul class="dropdown-menu">
							      <li><a href="report_collisions.html">Report Collisions</a></li>
							      <li><a href="show_collision.php">Show Collisions</a></li>
							    </ul>
	  						</li>
				        	<li><a href="#">Information</a></li>
				        	<li><a href="contact.html">Contact</a></li>
				      	</ul>
				    </div>
			  </div>
			</nav>
		</div>
	
	
		<div id="content" class="row">
			<h2> Report a Wildlife Collision</h2>
			
			<div id="insertDiv">
			
			<?php		
			
			
				require_once("db2.php");
				

			
				$error = null;
				$message = null;
				
				$species1 = $_POST['species'];
				$species2 = $_POST['txtSpecies'];
				
				$gender = $_POST['rbGender'];
				$age = $_POST['rbAge'];
				$date = $_POST['rpDate'];
				$location = $_POST['location'];
				$latitude = $_POST['lat'];
				$longitude = $_POST['lng'];
				
				if($species1 === "Others")
					$species1 = $species2;
				
				$imgURL = null;
								
	          
				if (!empty($species1) && is_string($species1) && !empty($location)&& is_string($location) && isset($latitude) && is_numeric($latitude) && isset($longitude) && is_numeric($longitude) && isset($date))
				{ 
					
					
			?>			
				
				<p>Your information has been recorded</p>
				<dl>
					<dt>Species</dt>	
					<dd> <?php print $species1; ?></dd>

					<dt>Date</dt>
					<dd> <?php print $date; ?></dd>

					<dt>Location</dt>
					<dd><?php print $location ?></dd>
					
					<dt>Latitude</dt>
					<dd><?php print $latitude ?></dd>
					
					<dt>Longitude</dt>
					<dd><?php print $longitude ?></dd>
		
					<dt>Gender</dt>
					<dd> <?php print $gender; ?></dd>
					
					<dt>Age</dt>
					<dd> <?php print $age; ?></dd>
					

					

				</dl>
				
			<?php	
			
			
			
				
				if (($_FILES["imgFile"]["type"] == "image/gif") 
				|| ($_FILES["imgFile"]["type"] == "image/jpeg")
				|| ($_FILES["imgFile"]["type"] == "image/jpg")
				|| ($_FILES["imgFile"]["type"] == "image/pjpeg")
				|| ($_FILES["imgFile"]["type"] == "image/x-png")
				|| ($_FILES["imgFile"]["type"] == "image/png")
				&& ($_FILES["imgFile"]["size"] < 1000000)){
					
					//process an uploaded file
					
					
					if ($_FILES["imgFile"]["error"] > 0)
						print("<p>File Upload Error: " . $_FILES["imgFile"]["error"] . "<p>");
					else{
						$temp = $_FILES["imgFile"]["tmp_name"];
						$target = basename($_FILES["imgFile"]["name"]);
						$directory = "uploads"; 
						
						
						if(file_exists($directory . "/". $target)){
							$imgURL = $directory . "/" . $target;
							print("<h4>" . $target. " already exists</h4>");
						}
						else{
							
							if(move_uploaded_file($temp, $directory . "/" . $target)){
								$imgURL = $directory . "/" . $target;
								print("<p>File uploaded successfully <p>");
							
							}
							
							else{
								print("<p>Error in moving uploaded file: ". $_FILES["imgFile"]["error"]. "</p>");
							}

						}
						
					}
					
				}				
				else{
					print("<p>No Image Selected.</p>");
				}
				
				
				$reportDate = date("Y-m-d H:i:s", strtotime($date));
				
				$sql = "insert collisions(species, gender, age, report_date, location, latitude, longitude, img_url) 
				values ('$species1', '$gender', '$age', '$date', '$location', '$latitude', '$longitude', '$imgURL')";
				
				
							
				$result = mysqli_query($con, $sql);
				if($result){
					echo "<h4> Succeeded to insert a collision record. </h4>";
				}else{
					echo "<h4> Failed to insert a collision record</h4>";
					}
				
			
				}  
				else {
		
					print "<h4>Error</h4>";
					print "<p>You didn't fill out the form completely.  <a href='report_collisions.html'>Try again?</a></p>";
				}
			?>	

				</div>	
		</div>
		
		
			<footer class="text-left">
				<p>J--W--&copy;<br />
				University of Maryland<br />
				Geog657 Web Programming<br />
				</p>
			</footer>
	
	</div>


</body>
</html>
