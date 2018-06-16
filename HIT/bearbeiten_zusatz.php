<?php
require_once ("connect.php"); 
$sql_get_kat_list2 = 
	'SELECT *
	FROM kategorie';	
$result_get_kat_list2 = mysqli_query($connect_hit, $sql_get_kat_list2);
$kat_anzahl2 = mysqli_num_rows($result_get_kat_list2);

if (ISSET($_GET["getkat"])) {
$kat_ausgewählt = $_GET["getkat"];		}
else {$kat_ausgewählt ="1";}




$allesok_aendern_art =
$aendern_art_ok =
$loeschen_art_ok =
$neu_art_ok =
$aendern_kat_ok =
$loeschen_kat_ok =
$neu_kat_ok =
$versand_ok =
$nachnahme_ok =
$urlaub_set_ok =
$urlaub_del_ok = "";


// ........................................ARTIKEL........................................
//    Artikel ändern  
	if (ISSET($_POST["aendern_art_ok"]) AND $_POST["aendern_art_ok"] ==1 )
		{
			$allesok_aendern_art = 1;
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
				$allesok_aendern_art = 0;
				$aendern_eintrag = "<span class=\"ausgabe_fehler\">Eingaben(Name) waren fehlerhaft!</span>";
				}
				
			if ( empty($_POST["kat"]) ) {
				$allesok_aendern_art = 0;
				$aendern_eintrag = "<span class=\"ausgabe_fehler\">Eingaben(Kategorie) waren fehlerhaft!</span>";
				}
			if ( empty($_POST["histamin_uv"])  AND $_POST["histamin_uv"] != 0) {
				$allesok_aendern_art = 0;
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
		if ($allesok_aendern_art == 1)
					{
					
					$query_aendern = 'UPDATE lebensmittel
										SET 
										name = "'.$_POST["prod_name"].'", 
										`e-nummer` = "'.$e_nummer.'",  
										kat_id = "'.$_POST["kat"].'",  
										notizen = "'.$notizen.'",  
										karenz = "'.$karenz.'", 
										histamin_uv = "'.$histamin_uv.'", 
										`eigene_wertung` = "'.$eigene_wertung.'", 
										histamin = "'.$histamin.'", 
										`biogene_amine` = "'.$biogene_amine.'", 
										liberator = "'.$liberator.'", 
										blocker = "'.$blocker.'", 
										`histamin_gehalt` = "'.$histamin_gehalt.'"
										
										WHERE id LIKE "'.$_POST["prod_id"].'" ;
									';
					$eintragen_aendern = mysqli_query($connect_hit, $query_aendern);
					
					if($eintragen_aendern == true)
						{
						$aendern_eintrag = '<span class=\"ausgabe_fehler\">Produkt "'.$_POST["prod_name"].'" wurde erfolrgeich ge&auml;ndert!</span>';
						}
					else
						{
						$aendern_eintrag = '<span class=\"ausgabe_fehler\">Fehler! Produkt "'.$_POST["prod_name"].'" wurde nicht ge&auml;ndert!!</span>';
						}
					} 
		}

//   Artikel Löschen
	
	if (ISSET($_POST["loeschen_art_ok"]) AND $_POST["loeschen_art_ok"] ==1 AND ISSET($_POST["prod_id2"]) AND $_POST["prod_id2"]!= "" )
		{
			$query_loeschen = 'DELETE FROM lebensmittel
								WHERE id = "'.$_POST["prod_id2"].'";
										';
			$eintragen_loeschen = mysqli_query($connect_hit, $query_loeschen);
		
			if($eintragen_loeschen === true)
				{	$loeschen_eintrag = '<span class=\"ausgabe_fehler\">Produkt "'.$_POST["prod_name2"].'" wurde erfolrgeich gel&ouml;scht!</span>';		}
			else {	$loeschen_eintrag = '<span class=\"ausgabe_fehler\">Produkt "'.$_POST["prod_name2"].'" wurde nicht gel&ouml;scht!</span>';	  }
			
		}
	else { $loeschen_eintrag = "";  }

	
	





		
?>
