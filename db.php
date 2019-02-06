<?php
$hostname="192.185.4.126";
$username="joelwebe_jw";
$passwd="Busy^BEE5";
$dbname="joelwebe_collisions_db";


$con = mysqli_connect($hostname, $username, $passwd, $dbname);
if(!$con)
	die("Database connection error". mysqli_connect_errno());


?>

