<?php 
require_once ("session.php"); 
require_once ("connect.php"); 
$kat_auswahl = $aendern_eintrag= "";

IF ( !ISSET($_SESSION["userid"])  ) {
	header ("Location: ./index.php") ; 
	}

	
$sql_get_kat_list = 
	'SELECT *
	FROM kategorie';	
$result_get_kat_list = mysqli_query($connect_hit, $sql_get_kat_list);
$kat_anzahl = mysqli_num_rows($result_get_kat_list);
while($row_kat_list = mysqli_fetch_array($result_get_kat_list)) {
	
	$kat_auswahl .= "<option value=\"".$row_kat_list[0]."\">".$row_kat_list[1]."</option> ";
	}	
	

if (ISSET($_POST["neu_art_ok"]) AND $_POST["neu_art_ok"] ==1 )	{
	
	
			$allesok_eintragen_art = 1;
			/*
			prod_name
			prod_e-nr
			kat
			notizen
			karenz
			histamin_uv
			eigene_wertung
			histamin
			biogene_amine
			liberator
			blocker
			histamin_gehalt
			*/
            
			if ( empty($_POST["prod_name"]) ) {
				$allesok_eintragen_art = 0;
				$aendern_eintrag = "<span class=\"ausgabe_fehler\">Eingaben(Name) waren fehlerhaft!</span>";
				}
				
			if ( empty($_POST["kat"]) ) {
				$allesok_eintragen_art = 0;
				$aendern_eintrag = "<span class=\"ausgabe_fehler\">Eingaben(Kategorie) waren fehlerhaft!</span>";
				}
			if ( empty($_POST["histamin_uv"])  AND $_POST["histamin_uv"] != 0) {
				$allesok_eintragen_art = 0;
				$aendern_eintrag = "<span class=\"ausgabe_fehler\">Eingaben(Wertung UV) waren fehlerhaft!</span>";
				}
			
			
			if ( empty($_POST["prod_e-nr"]) ) {	$e_nummer = "";	}	
				else { $e_nummer = $_POST["prod_e-nr"];}
				
			if ( empty($_POST["notizen"]) ) {	$notizen = "";	}	
				else { $notizen = $_POST["notizen"];}
			
			if ( empty($_POST["karenz"]) AND $_POST["karenz"] != 0 ) {	$karenz = "";	}	
				else { $karenz = $_POST["karenz"];}

			if ( empty($_POST["histamin_uv"])  AND $_POST["histamin_uv"] != 0  ) {	$histamin_uv = "";	}	
				else { $histamin_uv = $_POST["histamin_uv"];}
				
			if ( empty($_POST["eigene_wertung"])  AND $_POST["eigene_wertung"] != 0 ) {	$eigene_wertung = "";	}	
				else { $eigene_wertung = $_POST["eigene_wertung"];}
				
			if ( empty($_POST["histamin"]) ) {	$histamin = "";	}	
				else { $histamin = $_POST["histamin"];}	

			if ( empty($_POST["biogene_amine"]) ) {	$biogene_amine = "";	}	
				else { $biogene_amine = $_POST["biogene_amine"];}		

			if ( empty($_POST["liberator"]) ) {	$liberator = "";	}	
				else { $liberator = $_POST["liberator"];}		

			if ( empty($_POST["blocker"]) ) {	$blocker = "";	}	
				else { $blocker = $_POST["blocker"];}		

			if ( empty($_POST["histamin_gehalt"]) ) {	$histamin_gehalt = "";	}	
				else { $histamin_gehalt = $_POST["histamin_gehalt"];}						
				
										// notizen = "'.$_POST["notizen"].'",  
										// karenz = "'.$_POST["karenz"].'", 
										// histamin_uv = "'.$_POST["histamin_uv"].'", 
										// eigene_wertung = "'.$_POST["eigene_wertung"].'", 
										// histamin = "'.$_POST["histamin"].'", 
										// biogene_amine = "'.$_POST["biogene_amine"].'", 
										// liberator = "'.$_POST["liberator"].'", 
										// blocker = "'.$_POST["blocker"].'", 
										// KatNr_FK = "'.$_POST["histamin_gehalt"].'", 
				
		//wenn alles ok	
		if ($allesok_eintragen_art == 1)
					{
					
					$query_aendern = 'INSERT INTO lebensmittel (name,`e-nummer`, kat_id, notizen, karenz, histamin_uv, `eigene_wertung`, histamin, `biogene_amine`, liberator, blocker, `histamin_gehalt`) VALUES (
										"'.$_POST["prod_name"].'", 
										"'.$e_nummer.'",  
										"'.$_POST["kat"].'",  
										"'.$notizen.'",  
										"'.$karenz.'", 
										"'.$histamin_uv.'", 
										"'.$eigene_wertung.'", 
										"'.$histamin.'", 
										"'.$biogene_amine.'", 
										"'.$liberator.'", 
										"'.$blocker.'", 
										"'.$histamin_gehalt.'"
										);
									';
					$eintragen_aendern = mysqli_query($connect_hit, $query_aendern);
					
					if($eintragen_aendern == true)
						{
						$aendern_eintrag = '<span class=\"ausgabe_fehler\">Produkt "'.$_POST["prod_name"].'" wurde erfolrgeich eingetragen!</span>';
						}
					else
						{
						$aendern_eintrag = '<span class=\"ausgabe_fehler\">Fehler! Produkt "'.$_POST["prod_name"].'" wurde nicht eingetragen!!</span>';
						}
					} 
	
	
	
}
	
					
?><!DOCTYPE html>
<html lang="en-US">
<head>
		<meta charset="utf-8">
		<title>Meine HIT</title>
		<meta http-equiv="expires" content="0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="HIT-Lebensmittelliste">
		<link rel="stylesheet" href="style.css"> 
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script>	
	function load_table(kat) {
				$("#main_tab_text").load("bearbeiten_zusatz.php"+kat);
			}
 </script>
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
				
		
	<!-- MAIN WRAPPER "belowtopnav" -->
	<div class='w3-main' id='belowtopnav' style='padding:10px 100px;'>
		<div>
			<div id='main'>  <!-- ANFANG MAINTEXT -->
				
			<?php echo "<span style='color:red;font-weight:bolder;'>".$aendern_eintrag."</span>"; ?>	
				
			<h3> Neues Lebensmittel eintragen: </h3>
			<br>
				<table id="produkte_privat" >
					<form name="neu_art" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >	
						<tr>
							<td>	Name </td>
							<td>	<input type="text" size="35" name="prod_name" > 	</td>
						</tr>
						<tr>						
							<td>	E-nummer </td>
							<td>	<input type="text" size="10" name="prod_e-nr" > 	</td>
						</tr>
						<tr>					
							<td>	Kategorie 	</td>
							<td>    <select size="1" name="kat" style="width: 140px"> <?php echo $kat_auswahl; ?> </select>				</td>
						</tr>
						<tr>					
							<td>	Notizen 	</td>
							<td>	<textarea name="notizen" rows="1" cols="35"> </textarea> 	</td>
						</tr>
						<tr>					
							<td>	Karenzphase	</td>
							<td>
									<select size="1" name="karenz" style="width: 40px">
										<option value=""> --- </option>
										<option value="0"> 0 </option>
										<option value="1"> 1 </option>
										<option value="2"> 2 </option>
									</select>
							</td>
						</tr>
						<tr>					
							<td>	Wertung UV	</td>
							<td>
									<select size="1" name="histamin_uv" style="width: 40px">
										<option value=""> --- </option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
							</td>
						</tr>
						<tr>					
							<td>	Meine Wertung UV	</td>
							<td>
									<select size="1" name="eigene_wertung" style="width: 40px">
										<option value=""> --- </option>
										<option value="0"> 0 </option>
										<option value="1"> 1 </option>
										<option value="2"> 2 </option>
									</select>
							</td>
						</tr>
						<tr>					
							<td>	Histaminhaltig 	</td>
							<td>  <input type="checkbox" name="histamin" value="1"> </td>
						</tr>
						<tr>					
							<td>	Enthält Biogene Amine	</td>
							<td>  <input type="checkbox" name="biogene_amine" value="1"> </td>
						</tr>
						<tr>					
							<td>	Ist ein Liberator	</td>
							<td>  <input type="checkbox" name="liberator" value="1"> </td>
						</tr>
						<tr>					
							<td>	Ist ein Blocker	</td>
							<td>  <input type="checkbox" name="blocker" value="1"> </td>
						</tr>
						<tr>					
							<td>	Histamin-Gehalt	</td>
							<td>  <input type="text" size="35" name="histamin_gehalt" > </td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;">	
								<input type="hidden" name="neu_art_ok" value="1" > 	
								<input class="neu_button" type="image" src="./images/neu.png" title="Neu" name="neu_art" value="Neu">	
							</td>
						</tr>
					</form> 	
				</table>
				
				
			<br>
			<br>	
			</div>   <!-- ENDE MAINTEXT -->	
		</div>  <!-- ENDE MAINTEXT -->
	</div> <!-- ENDE "belowtopnav" -->
			
</div> 


<script type="text/javascript" src="javascript.js"></script> 
</body>
</html>