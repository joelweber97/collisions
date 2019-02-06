<?php
	
	
	require_once('phpMailer/PHPMailerAutoload.php');
	
	function sendEmail ($fromEmail, $fromName, $subject, $message){
		$mailer = new PHPMailer();
		$mailer -> isSMTP();
		$mailer -> SMTPAuth = TRUE;
		$mailer -> Host = "ssl://smtp.gmail.com:465";
		$mailer -> Username = "geogumd@gmail.com";
		$mailer->Password="gis@umd2016";
		
		$mailer->From=$fromEmail;
		$mailer->FromName=$fromName . " (" . $fromEmail . " )";
		
		$mailer->Subject = $subject;
		$mailer->Body = $message;
		
		$mailer->addAddress("jweber12@umd.edu", "Joel Weber");
		
		
		if(!$mailer->send()){
			$h = "Mailer Error " . $mailer->ErrorInfo;
			$m = "Mailer Error was not sent";
			print "<h1>$h</h1>";
			print "<pre>$m</pre>";
		}else{
			print "<h1>Mail Sent</h1>";
			print "<p>Thank you. Message has been sent successfully.</p>";
		}
}

	

?>

<!DOCTYPE html>
<html lang="en">
	<head>
 		<title>Contact</title>
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
							<a class="navbar-brand" href="#"> Wildlife Collision Management</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.html">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Collisions <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="report_collisions.html">Report Collisions</a></li>
											<li><a href="show_collision.php">Show Collisions</a></li>
										</ul>
								</li>
								<li><a href="#">Information</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<div id="content">
				<?php
		$fromEmail = $_POST['senderEmail'];
		$fromName = $_POST['senderName'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		
		if(!empty($fromEmail) && !empty($message)){
			sendEmail($fromEmail, $fromName, $subject, $message);
		}else{
			
			print "<h1>Error</h1>";
			print "<p>You must specify your mail address and message.</p>";
			
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
