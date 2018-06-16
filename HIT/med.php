<?php 
require_once ("session.php"); 
?><!DOCTYPE html>
<html lang="en-US">
<head>
		<meta charset="utf-8">
		<title>Meine HIT</title>
		<meta http-equiv="expires" content="0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="HIT-Lebensmittelliste">
		<link rel="stylesheet" href="style.css"> 
</head>

<body>

<div id='wrapper'>

	<!-- TOP -->
	<div id='top'>
		<div id='toptext'> 			
			Lebensmittelliste Histaminintoleranz
		</div>
	</div>
	
	<!-- TOPNAV Linkliste -->
	<div id='topnav' >
	  <div id='topnavinner' >
		<?php  require_once ("topnav.php"); ?>
	  </div>
	</div>			
	
	<!-- SEITENNAVIGATION sidenav class="w3-sidenav w3-collapse w3-slim"-->
<?php
require_once ("connect.php"); 
	
// define Variables
$uv_color = "";
$katid = ""; if(isset($_GET["katid"])) {$katid = $_GET["katid"];}

// definie tables		  
$table_med = '<table class="list1" style="min-width:400px;max-width:900px;margin:auto;">
				  <tr>				
					<th style="font-size:14px;font-weight:700;" >Wirkstoff</th>
					<th style="width:150px;font-size:14px;font-weight:700;" >Produktnamen</th>
					<th style="font-size:14px;font-weight:700;" >Wirkstoffgruppe</th>	
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:200px;font-size:14px;font-weight:700;" >Anmerkungen</th>      
				  </tr>';			  

	
// --------- Get Listinfos ----------
	
$sql_get_infos_med = 
	'SELECT *
	 FROM medikamente
	 ORDER BY `wirkstoff` ASC'; 
	 $result_get_list_med = mysqli_query($connect_hit, $sql_get_infos_med);
	
	while($row_med = mysqli_fetch_assoc($result_get_list_med)) {
		$info = "";		
		 if (isset($row_med["liberator"]) AND $row_med["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_med["dao-blocker"]) AND $row_med["dao-blocker"] == "1") { $info .= "DAO-Blocker <br>"; }
		 if (isset($row_med["hnmt-blocker"]) AND $row_med["hnmt-blocker"] == "1") { $info .= "HNMT-Blocker <br>";}
		 
		
		$table_med.= '	<tr>
							<td style="text-align:left;font-weight:600;" > '.$row_med["wirkstoff"].' </td>
							<td> '.$row_med["produktnamen"].' </td>
							<td > '.$row_med["wirkstoffgruppe"].' </td>
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_med["notizen"].' </td>      
						</tr>';	
	}
	$table_med.= '</table>';


?>				
		
	<!-- MAIN WRAPPER "belowtopnav" -->
	<div class='w3-main' id='belowtopnav' style='padding:10px 100px;'>
		<div>
			<div id='main'>  <!-- ANFANG MAINTEXT -->
				<br>
				<h2> Unverträgliche Medikamente </h2>
				<br>
				<?php 
				if(isset($table_med)) {echo $table_med;}
				?>	
				
			</div>   <!-- ENDE MAINTEXT -->	
		</div>  <!-- ENDE MAINTEXT -->
	</div> <!-- ENDE "belowtopnav" -->
			
</div> 
<!-- JAVASCRIPT footer  -->
<!-- <script src="./scripts.js"></script>-->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
	<![endif]-->
</body>
</html>