<!DOCTYPE html>
<html lang="en">
	<head>
 		<title>Wildlife Collision Management Program</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="custom.css">	
	</head>
	<body>
		<div class="container">
	<!-- Division for image background-->		
			<header class="row">	
			</header>
	<!-- Division for navigation bar-->
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href=#> Wildlife Collision Management</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar">
				    	<ul class="nav navbar-nav navbar-right">
				        	<li><a href="index.html">Home</a></li>
				        	<li class="dropdown">
						    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Collisions
						    	<span class="caret"></span></a>
						    	<ul class="dropdown-menu">
							      <li><a href="report_collisions.html">Report Collisions</a></li>
							      <li><a href="show_collision.php">Show Collisions</a></li>
							    </ul>
	  						</li>
				        	<li><a href="information.html">Information</a></li>
				        	<li><a href="contact.html">Contact</a></li>
				      	</ul>
				    </div><!-- end navbar-collapse -->
					</div>
				</nav>
			</div>
			<div id="content" class="row">
				<h2 class="show">Show Wildlife Collisions</h2>
				<div id="showDiv" class="table-responsive">
					
					<?php
					require_once("db2.php");
					
					$sql = "select * from collisions";
					$result = mysqli_query($con, $sql);
					
					if(!$result){
						die("Invalid query: " . mysqli_error($con));
						
					}
					
					?>
					
					<table class="table table-hover">
						<thead class="bg-primary">
							<tr>
								<th>ID</th>
								<th>Report Date</th>
								<th>Species</th>
								<th>Gender</th>
								<th>Age</th>
								<th>Location</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Picture</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row = mysqli_fetch_array($result)){
									$i=1;
									
									
									
									echo "<tr>";
									echo "<td>". $row["id"]."</td>";
									echo "<td>". $row["report_date"]."</td>";
									echo "<td>". $row["species"]."</td>";
									echo "<td>". $row["gender"]."</td>";
									echo "<td>". $row["age"]."</td>";
									echo "<td>". $row["location"]."</td>";
									echo "<td>". $row["latitude"]."</td>";
									echo "<td>". $row["longitude"]."</td>";
									echo "<td><img alt='img' width=50 height=50 src='" . $row["img_url"]. "'/></td>";
									echo "</tr>";
									
									if($color=$i%4){
										
									}
									$i++;
									
																		
								
							}
									
								?>
						</tbody>
					</table>
					
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
