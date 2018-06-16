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

	
// SEITEN NAVIGATION vorbereiten
$nrow = 300;	
// wenn page gesetzt in Link
If (isset($_GET["page"])) { 
		$_SESSION["page"] = $_GET["page"];
		$nrow_from = ($_SESSION["page"]*$nrow)+1-$nrow ; 
		$nrow_to = ($_SESSION["page"]*$nrow);	
		}
elseif (isset($_SESSION["page"])) {  
		$nrow_from = ($_SESSION["page"]*$nrow)+1-$nrow ; 
		$nrow_to = ($_SESSION["page"]*$nrow);	
		}
else 	{$nrow_from = 1; $nrow_to = $nrow_from + $nrow-1;}


	
include_once ("bearbeiten_zusatz.php");


		 
					
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
				
				<?php echo "<span style='color:red;font-weight:bolder;'>".$aendern_eintrag.$loeschen_eintrag."</span>"; ?>
			<br>
			<h3> Bestehende Lebensmittel bearbeiten: </h3>
			<br>	
		

<?php


				$query_produkte_rows = 'SELECT *
							FROM lebensmittel
							ORDER BY name
							';				
				
				
$result_get_rows = mysqli_query($connect_hit, $query_produkte_rows);
$total_rows = mysqli_num_rows($result_get_rows);

$PAGES =($total_rows/$nrow);
 
$list_display_pages = '';
$n ="";
 while ($n < ($total_rows/$nrow)+1){ // ---- Seitenauflistung zum Auswählen und aktuelle Seite ausgewählt 	
	IF (isset($_SESSION["page"]) && $n==$_SESSION["page"]) 
			{ 	$list_display_pages .= $n.'&nbsp;';}
		else if ($n==1 && !isset($_SESSION["page"]))
			{ 	$list_display_pages .= $n.'&nbsp;';	}
		else {	
				$list_display_pages .= '<a href="./bearbeiten.php?page='.$n.'" title="Seite '.$n.'">'.$n.'</a>&nbsp;';
			} 
	$n++;
	}
	
	// ---- Vor- und Zurück-Button
	IF (isset($_SESSION["page"]) AND $_SESSION["page"] < $PAGES  AND  $_SESSION["page"] > 1 ) { 
			
			$list_btn_last = '<a href="./bearbeiten.php?page='.($_SESSION["page"]-1).'" class="w3-btn w3-white w3-border" title="Vorhergehende">&#10094; </a>';
			
			$list_btn_next = '<a href="./bearbeiten.php?page='.($_SESSION["page"]+1).'" class="w3-btn w3-white w3-border" title="Nächste"> &#10095;</a>';
			
		}
	elseif (isset($_SESSION["page"]) AND $_SESSION["page"] >= $PAGES )
		{		
				$list_btn_last = '<a href="./bearbeiten.php?page=1'.'" class="w3-btn w3-white w3-border" title="Vorhergehende">&#10094; </a>';
				$list_btn_next = ' ';
		}
	elseif ( $PAGES <= 1 )
		{		
				$list_btn_last = ' ';
				$list_btn_next = '';
		}	
	else {		$list_btn_last = ' ';
				$list_btn_next = '<a href="./bearbeiten.php?page=2" class="w3-btn w3-white w3-border" title="Nächste"> &#10095;</a>';
		}
	
		
	if ($nrow_to > $total_rows ) {$nrow_to = $total_rows; }
	
	// ---- Anzeige der	"Zeigt x - x von insgesamt X Sachen"
	$list_display_text = '    Zeigt '.$nrow_from.'-'.$nrow_to.' von insgesamt '.$total_rows.' Produkten ';		


	echo '<p style="text-align:center;" >'.$list_display_text.'</p>'.
						'<p style="text-align:center;" >'.	$list_btn_last.'  '.$list_display_pages.'  '.$list_btn_next.
						'</p>';
?>
						
	<table id="produkte_privat" >
				<tr>
					<td>	Name </td>
					<td>	E-nummer </td>
					<td>	Kategorie 	</td>
					<td>	Notizen 	</td>
					<td>	Karenz		</td>
					<td>	Wertung UV	</td>
					<td>	eigene Wertung	</td>
					<td>	Histamin 	</td>
					<td>	Biogene Amine	</td>
					<td>	Liberator	</td>
					<td>	Blocker	</td>
					<td>	Histamin-Gehalt	</td>
				</tr>
			
			<?php
		 // $kat_ausgewählt = 20;
		 // $_REQUEST['yourOS']  
   // //-- Get platform information and store in yourOS.
   // var yourOS="unknown";
   
		 $zusatzsuche = "";
			
				// alle Produktzeilen aufrufen
				$query_produkte = 'SELECT *
							FROM lebensmittel
							 '.$zusatzsuche.'
							ORDER BY name
							';				
				$query_produkte .= 'LIMIT '.$nrow.' OFFSET '.($nrow_to-$nrow);
				$result_produkte = mysqli_query($connect_hit, $query_produkte);
				$produkt_anzahl = mysqli_num_rows($result_produkte);
						
						
				// alle Kategoriezeilen aufrufen
					$query_kat2 = "SELECT *
								FROM kategorie
								ORDER BY KatID
								";
					$result_kat2 = mysqli_query($connect_hit, $query_kat2);				
									$l = 0;
					while ($l< $kat_anzahl2)
						{
						$kategorie2 = mysqli_fetch_row($result_kat2);
						$kat[$l][1] = $kategorie2[0];
						$kat[$l][2] = $kategorie2[1];
						$l++;
						}
				
								
				// Produkte einer Kategorie einzeln wiedergeben
				$j=0;
				while ( $j < $produkt_anzahl)
					{ 
						$karenz_none_selected = $karenz_0_selected = $karenz_1_selected = $karenz_2_selected = 
						$uv_none_selected = $uv_0_selected = $uv_1_selected = $uv_2_selected = 
						$eigene_uv_none_selected = $eigene_uv_0_selected = $eigene_uv_1_selected = $eigene_uv_2_selected =
						$histamin_checked = $biogene_amine_checked = $liberator_checked = $blocker_checked = "";
						$j++;
						$produkte = mysqli_fetch_assoc($result_produkte);
						// $kg_selected =$dose_selected=$flasche_selected = $glas_selected = $packung_selected = $stk_selected= "";
						SWITCH ($produkte["karenz"]) {
										case "": $karenz_none_selected = "selected";break;							
										case 0: $karenz_0_selected = "selected";break;
										case 1: $karenz_1_selected = "selected";break;
										case 2: $karenz_2_selected = "selected";break;
										default: $karenz_none_selected = "selected";break;
						}
						SWITCH ($produkte["histamin_uv"]) {
										case "": $uv_none_selected = "selected";break;							
										case 0: $uv_0_selected = "selected";break;
										case 1: $uv_1_selected = "selected";break;
										case 2: $uv_2_selected = "selected";break;
										default: $uv_none_selected = "selected";break;
						}
						SWITCH ($produkte["eigene_wertung"]) {
										case "": $eigene_uv_none_selected = "selected";break;							
										case 0: $eigene_uv_0_selected = "selected";break;
										case 1: $eigene_uv_1_selected = "selected";break;
										case 2: $eigene_uv_2_selected = "selected";break;
										default: $eigene_uv_none_selected = "selected";break;
						}						
						
						if ($produkte["histamin"] == 1) { $histamin_checked = "checked";}
						if ($produkte["biogene_amine"] == 1) { $biogene_amine_checked = "checked";}
						if ($produkte["liberator"] == 1) { $liberator_checked = "checked";}
						if ($produkte["blocker"] == 1) { $blocker_checked = "checked";}
						
						
						
						
						
						echo " 
						
						<form name=\"aendern_kat\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"   >
						
						<tr>
						
						<input type=\"hidden\" name=\"prod_id\" value=\"".$produkte["id"]."\" >
							<td>	<input type=\"text\" size=\"30\"  name=\"prod_name\" value=\"".$produkte["name"]."\" > 	</td>
							<td>	<input type=\"text\" size=\"5\"  name=\"prod_e-nr\" value=\"".$produkte["e-nummer"]."\" > 	</td>
							<td>  <select size=\"1\" name=\"kat\" style=\"width: 140px\">";
									$p = 0;
									while ($p < $kat_anzahl2) 
										{
										if ($produkte["kat_id"] == $kat[$p][1] )
											{ echo "<option selected value='".$kat[$p][1]."'>".$kat[$p][2]."</option> "; } 
											else { echo "<option value='".$kat[$p][1]."'>".$kat[$p][2]."</option> "; }
										$p++;
										}
							echo "	</select>				
							</td>
							<td>	<textarea  cols=\"25\" rows=\"1\"   name=\"notizen\"  wrap=\"hard\">".$produkte["notizen"]."</textarea>	</td>
							<td>	
								<select name='karenz' style='width: 40px' class='".$produkte["karenz"]."'	>
										<option ".$karenz_none_selected." value=''>---</option>
										<option ".$karenz_0_selected." value='0'> 0 </option>
										<option ".$karenz_1_selected."  value='1'> 1 </option>
										<option ".$karenz_2_selected."  value='2'> 2 </option>
								</select> 
							</td>
							<td>	
								<select name='histamin_uv' style='width: 40px' class='".$produkte["histamin_uv"]."'	>
										<option ".$uv_none_selected." value=''>---</option>
										<option ".$uv_0_selected." value='0'> 0 </option>
										<option ".$uv_1_selected."  value='1'> 1 </option>
										<option ".$uv_2_selected."  value='2'> 2 </option>
								</select> 
							</td>
							<td>	
								<select name='eigene_wertung' style='width: 40px' class='".$produkte["eigene_wertung"]."'	>
										<option ".$eigene_uv_none_selected." value=''>---</option>
										<option ".$eigene_uv_0_selected." value='0'> 0 </option>
										<option ".$eigene_uv_1_selected."  value='1'> 1 </option>
										<option ".$eigene_uv_2_selected."  value='2'> 2 </option>
								</select> 
							</td>
							<td> <input type=\"checkbox\"  name=\"histamin\" value=\"1\" ".$histamin_checked."> 	</td>
							
							<td> <input type=\"checkbox\" name=\"biogene_amine\" value=\"1\" ".$biogene_amine_checked." > 	</td>
							<td> <input type=\"checkbox\"name=\"liberator\" value=\"1\" ".$liberator_checked." > 	</td>
							<td> <input type=\"checkbox\"name=\"blocker\" value=\"1\" ".$blocker_checked." > 	</td>
							<td> <input type=\"text\" size=\"4\"  name=\"histamin_gehalt\" value=\"".$produkte["histamin_gehalt"]."\" > 	</td>
							<td>
								<input class=\"aender_button\" type=\"image\" src=\"./images/aendern.png\" title=\"&Auml;ndern\" name=\"aendern_art\" value=\"&Auml;ndern\">
								<input type=\"hidden\" name=\"aendern_art_ok\" value=\"1\" > 
							</form>
							</td> 
							
							<td>
								<form name=\"loeschen_art\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" >	
									<input type=\"hidden\" name=\"prod_id2\" value=\"".$produkte["id"]."\" >
									<input type=\"hidden\" name=\"prod_name2\" value=\"".$produkte["name"]."\" > 
									<input type=\"hidden\" name=\"loeschen_art_ok\" value=\"1\" > 
									<input class=\"loeschen_button\" type=\"image\" src=\"./images/del.png\" title=\"L&ouml;schen\" name=\"loeschen_art\" value=\"L&ouml;schen\">
								</form> 
							</td>
						</tr>
						";
					}					?> 							
					 
				</table>		
		<!-- Button to open the modal login form -->
			

			
						
			</div>   <!-- ENDE MAINTEXT -->	
		</div>  <!-- ENDE MAINTEXT -->
	</div> <!-- ENDE "belowtopnav" -->
			
</div> 


<script type="text/javascript" src="javascript.js"></script> 
</body>
</html>