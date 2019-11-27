<?php

date_default_timezone_set("Europe/Paris");
	$nowtime = time();
	@session_start();
	
	@include("./includes/db.php");
	@include("../includes/db.php");
	@include("./includes/functions.php");
	@include("../includes/functions.php");
	   
	   if(isset($_SESSION['email']))
		{
			$email = Securise($_SESSION['email']);
			$sql = mysql_query("SELECT * FROM clients WHERE email = '".$email."' LIMIT 1") or die(mysql_error());
			$row = mysql_num_rows($sql);
			$user = mysql_fetch_assoc($sql);
			
		}
	
?>