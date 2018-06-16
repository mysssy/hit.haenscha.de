<?php
require_once ("connect.php"); 

// define Variables
$uv_color = "";
$katid = ""; 
if(isset($_GET["katid"])) {$katid = $_GET["katid"];} 


// --------- Kat-List für Sidenav --------- 

$pagename= basename($_SERVER['SCRIPT_NAME'], ".php") ;
$sql_get_kat_list = 
	'SELECT *
	FROM kategorie';	
	
$result_get_kat_list = mysqli_query($connect_hit, $sql_get_kat_list);
$kat_list = '<li> <a href="./'.$pagename.'.php" style="font-weight:900;"> <u>ALLES</u> </a> </li>';   
while($row_kat_list = mysqli_fetch_array($result_get_kat_list)) {
	$kat_list.= '<li> <a href="./'.$pagename.'.php?katid='.$row_kat_list['KatID'].'">'.$row_kat_list['KatName'].'</a> </li>';	
	}
	
	
?>