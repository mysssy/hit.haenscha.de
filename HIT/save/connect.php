<?php

// $db_server = "localhost"; 
// $db_user = "d010f70d"; 
// $db_pass = "3AKvP7CDrHoWdz6L"; 
// $db_name_hitdata = "hit"; 

/*  Homepage*/	
$db_server = "haenscha.de"; 
$db_user = "d0279ca3"; 
$db_pass = "VXVANc49LrMX4xV7"; 
$db_name_hitdata = "d0279ca3";  
  
// Connect to DB
$connect_hit = mysqli_connect('p:'.$db_server, $db_user, $db_pass, $db_name_hitdata) or exit ("Failed to connect to the Databaseerror!");
	if(!$connect_hit) 
	{
	  exit("Connectionerror: ".mysqli_connect_error());
	}	
	mysqli_set_charset($connect_hit,'utf8');
	mysqli_query($connect_hit,'SET NAMES utf8');
	
?>