<?php
require_once ("connect.php"); 

// define Variables
$uv_color = "";
$katid = ""; 
if(isset($_GET["katid"])) {$katid = $_GET["katid"];} 

if($katid=="karenz") {
	$page_title = 'Während der Karenzphase';
}
elseif ($katid=="") {
	$page_title = 'Gesamte Liste (ohne Zusatzstoffe) '; 	
}
elseif ($katid != "") {
	$sql_get_kat_title = 
			'SELECT *
			 FROM kategorie
			 WHERE katid LIKE "'.$katid.'" '; 
	$result_get_kat_title = mysqli_query($connect_hit, $sql_get_kat_title);
	$row_kat_title = mysqli_fetch_assoc($result_get_kat_title);
			
	$page_title = $row_kat_title['KatName'];
}

// definie tables
$table_all = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>
					<th style="width:250px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:30px;font-size:14px;font-weight:700;" >E-Nr</th>
					<th style="width:130px;font-size:14px;font-weight:700;" >Kategorie</th>	
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:250px;font-size:14px;font-weight:700;" >Anmerkungen</th>      
				  </tr>';
				  
$table_kat = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>
					<th style="width:250px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:280px;font-size:14px;font-weight:700;" >Anmerkungen</th>           
				  </tr>';				  

$table_zusatz = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>
					<th style="width:290px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:30px;font-size:14px;font-weight:700;" >E-Nr</th>
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:300px;font-size:14px;font-weight:700;" >Anmerkungen</th>      
				  </tr>';	
				  
$table_karenz = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>
					<th style="width:250px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:130px;font-size:14px;font-weight:700;" >Kategorie</th>	
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:250px;font-size:14px;font-weight:700;" >Anmerkungen</th>      
				  </tr>';				  

// --------- Kat-List für Sidenav --------- 
	
$sql_get_kat_list = 
	'SELECT *
	FROM kategorie';	
	
$result_get_kat_list = mysqli_query($connect_hit, $sql_get_kat_list);
$kat_list = '<li> <a href="./list.php" style="font-weight:900;"> <u>ALLES</u> </a> </li>';   
while($row_kat_list = mysqli_fetch_array($result_get_kat_list)) {
	$kat_list.= '<li> <a href="./list.php?katid='.$row_kat_list['KatID'].'">'.$row_kat_list['KatName'].'</a> </li>';	
	}
	
	
	
// --------- Get Listinfos ----------
	
if($katid == "") {  // --------- WENN KEINE Kategorie = Alles
	$sql_get_infos_all = 
	'SELECT *
	 FROM lebensmittel
	 WHERE kat_id NOT LIKE "26"
	 ORDER BY `name` ASC'; 
	$result_get_list_all = mysqli_query($connect_hit, $sql_get_infos_all);
	
	while($row_all = mysqli_fetch_assoc($result_get_list_all)) {
		$info = "";
		 if (isset($row_all["biogene_amine"]) AND $row_all["biogene_amine"] == "1") { $info .= "Biogene-Amine <br>";}
		 if (isset($row_all["liberator"]) AND $row_all["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_all["blocker"]) AND $row_all["blocker"] == "1") { $info .= "DAO-Blocker <br>";}
		 if (isset($row_all["histamin"]) AND $row_all["histamin"] == "1") { $info .= "Histaminhaltig <br>"; }
		
		$sql_get_kategorie = 
			'SELECT *
			 FROM kategorie
			 WHERE katid LIKE "'.$row_all["kat_id"].'" '; 
			$result_get_kategorie = mysqli_query($connect_hit, $sql_get_kategorie);
			$row_kat = mysqli_fetch_assoc($result_get_kategorie);
			
		switch($row_all["histamin_uv"]) {
			case "0": $uv_color ="class='wert_bg_green'"; break;
			case "1": $uv_color ="class='wert_bg_orange'"; break;
			case "2": $uv_color ="class='wert_bg_red'"; break;
			default: $uv_color =""; break;
		}
		
		 $table_all.= '	<tr>
							<td '.$uv_color.'> '.$row_all["histamin_uv"].' </td>
							<td style="text-align:left;"  > '.$row_all["name"].' </td>
							<td> '.$row_all["e-nummer"].' </td>
							<td > '.$row_kat['KatName'].' </td>	
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_all["notizen"].' </td>      
						</tr>'; 
	}
	$table_all.= '</table>';
}
elseif ($katid == "26") { // --------- WENN Zusatzstoffe  
	$sql_get_infos_zusatz = 
	'SELECT *
	 FROM lebensmittel
	 WHERE kat_id = "26" ';
	 $result_get_list_zusatz = mysqli_query($connect_hit, $sql_get_infos_zusatz);
	
	while($row_zusatz = mysqli_fetch_assoc($result_get_list_zusatz)) {
		$info = "";
		 if (isset($row_zusatz["liberator"]) AND $row_zusatz["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_zusatz["blocker"]) AND $row_zusatz["blocker"] == "1") { $info .= "DAO-Blocker <br>";}
		 if (isset($row_zusatz["biogene_amine"]) AND $row_zusatz["biogene_amine"] == "1") { $info .= "Biogene-Amine <br>";}
		 if (isset($row_zusatz["histamin"]) AND $row_zusatz["histamin"] == "1") { $info .= "Histaminhaltig <br>"; }
		
		$sql_get_kategorie = 
			'SELECT *
			 FROM kategorie
			 WHERE katid LIKE "'.$row_zusatz["kat_id"].'" '; 
			$result_get_kategorie = mysqli_query($connect_hit, $sql_get_kategorie);
			$row_kat = mysqli_fetch_assoc($result_get_kategorie);
			
		switch($row_zusatz["histamin_uv"]) {
			case "0": $uv_color ="class='wert_bg_green'"; break;
			case "1": $uv_color ="class='wert_bg_orange'"; break;
			case "2": $uv_color ="class='wert_bg_red'"; break;
			default: $uv_color =""; break;
		}
		
		 $table_zusatz.= '	<tr>
							<td '.$uv_color.'> '.$row_zusatz["histamin_uv"].' </td>
							<td style="text-align:left;"  > '.$row_zusatz["name"].' </td>
							<td> '.$row_zusatz["e-nummer"].' </td>
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_zusatz["notizen"].' </td>      
						</tr>'; 						
	}	
	$table_zusatz.= '</table>';
}
elseif($katid == "karenz") {  // WENN Karenz AUSGEWÄHLT
	$sql_get_infos_karenz = 
	'SELECT *
	 FROM lebensmittel
	 WHERE karenz LIKE "0" ' ; 
	$result_get_list_karenz = mysqli_query($connect_hit, $sql_get_infos_karenz);
	
	while($row_karenz = mysqli_fetch_assoc($result_get_list_karenz)) {
		$info = "";
		 if (isset($row_karenz["biogene_amine"]) AND $row_karenz["biogene_amine"] == "1") { $info .= "Biogene-Amine <br>";}
		 if (isset($row_karenz["liberator"]) AND $row_karenz["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_karenz["blocker"]) AND $row_karenz["blocker"] == "1") { $info .= "DAO-Blocker <br>";}
		 if (isset($row_karenz["histamin"]) AND $row_karenz["histamin"] == "1") { $info .= "Histaminhaltig <br>"; }
		
		$sql_get_kategorie = 
			'SELECT *
			 FROM kategorie
			 WHERE katid LIKE "'.$row_karenz["kat_id"].'" '; 
			$result_get_kategorie = mysqli_query($connect_hit, $sql_get_kategorie);
			$row_kat = mysqli_fetch_assoc($result_get_kategorie);
			
		switch($row_karenz["histamin_uv"]) {
			case "0": $uv_color ="class='wert_bg_green'"; break;
			case "1": $uv_color ="class='wert_bg_orange'"; break;
			case "2": $uv_color ="class='wert_bg_red'"; break;
			default: $uv_color =""; break;
		}
		
		 $table_karenz.= '	<tr>
							<td '.$uv_color.'> '.$row_karenz["histamin_uv"].' </td>
							<td style="text-align:left;"  > '.$row_karenz["name"].' </td>
							<td > '.$row_kat['KatName'].' </td>	
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_karenz["notizen"].' </td>      
						</tr>'; 	  
	 }
	$table_karenz.= '</table>';
}
else { // WENN Kategorie gewählt
	$sql_get_infos_katinfo = 
	'SELECT *
	 FROM lebensmittel
	 WHERE kat_id = "'.$katid.'" ';
	 $result_get_list_katinfo = mysqli_query($connect_hit, $sql_get_infos_katinfo);
	
	while($row_katinfo = mysqli_fetch_assoc($result_get_list_katinfo)) {
		$info = "";
		 if (isset($row_katinfo["liberator"]) AND $row_katinfo["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_katinfo["blocker"]) AND $row_katinfo["blocker"] == "1") { $info .= "DAO-Blocker <br>";}
		 if (isset($row_katinfo["biogene_amine"]) AND $row_katinfo["biogene_amine"] == "1") { $info .= "Biogene-Amine <br>";}
		 if (isset($row_katinfo["hnmt-blocker"]) AND $row_katinfo["hnmt-blocker"] == "1") { $info .= "HNMT-Blocker <br>";}
		 if (isset($row_katinfo["dao-blocker"]) AND $row_katinfo["dao-blocker"] == "1") { $info .= "DAO-Blocker <br>"; }
		 if (isset($row_katinfo["histamin"]) AND $row_katinfo["histamin"] == "1") { $info .= "Histaminhaltig <br>"; }
		
	
			
		switch($row_katinfo["histamin_uv"]) {
			case "0": $uv_color ="class='wert_bg_green'"; break;
			case "1": $uv_color ="class='wert_bg_orange'"; break;
			case "2": $uv_color ="class='wert_bg_red'"; break;
			default: $uv_color =""; break;
		}
		
		$table_kat.= '	<tr>
							<td '.$uv_color.'> '.$row_katinfo["histamin_uv"].' </td>
							<td style="text-align:left;"  > '.$row_katinfo["name"].' </td>
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_katinfo["notizen"].' </td>      
						</tr>'; 
	}
	$table_kat.= '</table>';
}

?><!DOCTYPE html>
<html lang="en-US">
<head>
		<meta charset="utf-8">
		<title>Meine HIT</title>
		<meta http-equiv="expires" content="0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="HIT-Lebensmittelliste">
		<!-- 		<link rel="icon" href="images/favico.ico" type="image/x-icon">		-->
		<link rel="stylesheet" href="./style.css"> 
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

	<!-- SEITENNAVIGATION -->
		<div id="sidenav" >
			<div id="sidenavinner">
				<h3 class="left" style="white-space: nowrap;"> <a href="./list.php?katid=karenz" style="margin:0;padding:0;" >In Karenzzeit</a> </h3>
				<h3 class="left" style="white-space: nowrap;"> Nach Kategorien </h3>
					<ul>
						<?php echo $kat_list; ?>
					</ul>
			</div>
		</div>						
		
	<!-- MAIN WRAPPER "belowtopnav" -->
	<div class='w3-main' id='belowtopnav' style='margin-left:220px;'>
		<div>
			<div id='main' >  <!-- ANFANG MAINTEXT -->
				<br>
				<h2><?php if (isset($page_title)) {echo $page_title;} ?></h2>
				<br>
				<?php 
				if ($katid == "") {echo $table_all;}
				elseif ($katid == "26") {echo $table_zusatz;}
				elseif($katid == "karenz") {echo $table_karenz;}
				else  {echo $table_kat;}
				?>
				
				
				
				<br>
				<br>
				<br>
				<h2 style="color:#c5c1a9;">LEGENDE</h2>
				
				<p > Je nach Ausprägung, Tagesform und Ausführung der Histaminintoleranz 
				<br>können die persönlichen Grenzen unterschiedlich sein, <br>
				so dass jeder seine Grenzen austesten sollte.
				</p>
				<table class="list2" style="margin:auto;">
					<tr>
					 <td colspan="2"> Wert(-ung) für die Verträglichkeit</td>
					</tr>
					<tr>
					 <td style='background-color:#4caf00;font-weight:500;padding: 0px 3px;'> 0 </td>
					 <td style="text-align:left;" > gut verträglich! <br> Bei normaler Verzehrmenge sollten keine Symptome auftauchen.</td>
					</tr>
					<tr>
					 <td style='background-color:#e6e600;font-weight:500;'> 1 </td>
					 <td style="text-align:left;" > manchmal verträglich - Verträglichkeit kann variieren und muss ausgetestet werden. Kleinere Mengen eher ok. </td>
					</tr>
					<tr>
					 <!-- <td style='background-color:#e67300;color:#ffffff;font-weight:500;'> 2 </td> -->
					 <td style='background-color:#990000;color:#ffffff;font-weight:500;'> 2 </td>
					 <td style="text-align:left;" > schlecht unverträglich!  <br> Deutliche Symptome!  Verzehrsmengen unabhängig!</td>
					</tr>
					<tr>
					 <td>?</td>
					 <td style="text-align:left;" > Widersprüchliche oder kaum Informationen zur Verträglichkeit </td>
					</tr>
				</table>
				<br>
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