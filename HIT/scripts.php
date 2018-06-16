<?php
require_once ("connect.php"); 
$katid = ""; 
if(isset($_GET["katid"])) {$katid = $_GET["katid"];} 

$value = "";
if(isset($_GET["value"])) {$value = $_GET["value"];} 

$pagename_scripts = "";
if(isset($_GET["pagename"])) {$pagename_scripts = $_GET["pagename"];} 
	else {$pagename_scripts = $pagename;}

if ($pagename_scripts == "mylist") {
		$mylist_myuv_th = '<th style="width:10px;font-weight:700;font-size:12px;padding:2px;" >Mein Wert</th>';
	}
	else {	$mylist_myuv_th = '';	}
	
// Überschrift des Maintextes
if($katid=="karenz") {
	$page_title = 'Während der Karenzphase';
	}
	elseif ($katid=="" AND $pagename_scripts=="mylist") {
		$page_title = 'Meine Liste '; 	
	}
	elseif ($katid=="" AND $pagename_scripts=="list") {
		$page_title = 'Gesamte Liste'; 	
	}
	elseif ($katid != "" AND $pagename_scripts=="mylist") {
		$sql_get_kat_title = 
				'SELECT *
				 FROM kategorie
				 WHERE katid LIKE "'.$katid.'" '; 
		$result_get_kat_title = mysqli_query($connect_hit, $sql_get_kat_title);
		$row_kat_title = mysqli_fetch_assoc($result_get_kat_title);
		
		$page_title = 'Meine Liste: '.$row_kat_title['KatName'];				
	}
	elseif ($katid != "" AND $pagename_scripts=="list") {
		$sql_get_kat_title = 
				'SELECT *
				 FROM kategorie
				 WHERE katid LIKE "'.$katid.'" '; 
		$result_get_kat_title = mysqli_query($connect_hit, $sql_get_kat_title);
		$row_kat_title = mysqli_fetch_assoc($result_get_kat_title);
				
		$page_title = $row_kat_title['KatName'];
	}

// nur grüne, gelbe oder rote Wertung anzeigen
if ($pagename_scripts == "mylist") {
	SWITCH($value) {
		case "green": $extraclause_mylist = "AND eigene_wertung LIKE '0' "; break;
		case "yellow": $extraclause_mylist = "AND eigene_wertung LIKE '1' "; break;
		case "red": $extraclause_mylist = "AND eigene_wertung LIKE '2' "; break;
		default: $extraclause_mylist = ""; break;
		}
	}
	else {
		SWITCH($value) {
			case "green": $extraclause = "AND histamin_uv LIKE '0' "; break;
			case "yellow": $extraclause = "AND histamin_uv LIKE '1' "; break;
			case "red": $extraclause = "AND histamin_uv LIKE '2' "; break;
			default: $extraclause = ""; break;
			}
	}

// definie tables
$table_all = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>'
					.$mylist_myuv_th.
					'<th style="width:250px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:30px;font-size:14px;font-weight:700;" >E-Nr</th>
					<th style="width:130px;font-size:14px;font-weight:700;" >Kategorie</th>	
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:250px;font-size:14px;font-weight:700;" >Anmerkungen</th>      
				  </tr>';
				  
$table_kat = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>'
					.$mylist_myuv_th.
					'<th style="width:250px;font-size:14px;font-weight:700;" >Name</th>
					<th style="width:80px;font-size:14px;font-weight:700;" >andere Infos</th> 
					<th style="width:280px;font-size:14px;font-weight:700;" >Anmerkungen</th>           
				  </tr>';				  

$table_zusatz = '<table class="list1" style="margin:auto;">
				  <tr>	
					<th style="width:10px;font-size:11px;font-weight:700;padding:2px;" >Wert</th>'
					.$mylist_myuv_th.
					'<th style="width:290px;font-size:14px;font-weight:700;" >Name</th>
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
	
	
// --------- Get Listinfos ----------
	
if($katid == "") {  // --------- WENN KEINE Kategorie = Alles
	if ($pagename_scripts == "mylist") {									
		$sql_get_infos_all = 
			'SELECT *
			 FROM lebensmittel
			 WHERE eigene_wertung != "" '.$extraclause_mylist.'
			 ORDER BY `name` ASC' ; 
		$result_get_list_all = mysqli_query($connect_hit, $sql_get_infos_all);
		}
		else {
			$sql_get_infos_all = 
				'SELECT *
				 FROM lebensmittel
				 WHERE kat_id NOT LIKE "200" '.$extraclause.'
				 ORDER BY `name` ASC'; 
			$result_get_list_all = mysqli_query($connect_hit, $sql_get_infos_all);
		}	
	
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
			
		if ($pagename_scripts == "mylist") {
			switch($row_all["histamin_uv"]) {
				case "0": $uv_color ="class='wert_txt_green'"; break;
				case "1": $uv_color ="class='wert_txt_yellow'"; break;
				case "2": $uv_color ="class='wert_txt_red'"; break;
				default: $uv_color =""; break;				}
			
			switch($row_all["eigene_wertung"]) {
				case "0": $uv_color_mine ="class='wert_bg_green'"; break;
				case "1": $uv_color_mine ="class='wert_bg_yellow'"; break;
				case "2": $uv_color_mine ="class='wert_bg_red'";break;
				default: $uv_color_mine =""; break;				}	
				
			$table_all.= '	<tr>
								<td '.$uv_color.'> '.$row_all["histamin_uv"].' </td>
								<td '.$uv_color_mine.'> '.$row_all["eigene_wertung"].' </td>
								<td style="text-align:left;"  > '.$row_all["name"].' </td>
								<td> '.$row_all["e-nummer"].' </td>
								<td > '.$row_kat['KatName'].' </td>	
								<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
								<td style="font-size:11px;text-align:left;"> '.$row_all["notizen"].' </td>      
							</tr>'; 
			}
			else {
				switch($row_all["histamin_uv"]) {
					case "0": $uv_color ="class='wert_bg_green'"; break;
					case "1": $uv_color ="class='wert_bg_yellow'"; break;
					case "2": $uv_color ="class='wert_bg_red'"; break;
					default: $uv_color =""; break;		}
					
				$table_all.= '	<tr>
									<td '.$uv_color.'> '.$row_all["histamin_uv"].' </td>
									<td style="text-align:left;"  > '.$row_all["name"].' </td>
									<td> '.$row_all["e-nummer"].' </td>
									<td > '.$row_kat['KatName'].' </td>	
									<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
									<td style="font-size:11px;text-align:left;"> '.$row_all["notizen"].' </td>      
								</tr>'; 
			}
	}
	$table_all.= '</table>';
}
elseif ($katid == "26") { // --------- WENN Zusatzstoffe  
	if ($pagename_scripts == "mylist") {									
		$sql_get_infos_zusatz = 
			'SELECT *
			 FROM lebensmittel
			 WHERE eigene_wertung != "" AND kat_id LIKE "26" '.$extraclause_mylist.'
			 ORDER BY `name` ASC' ;  
		$result_get_list_zusatz = mysqli_query($connect_hit, $sql_get_infos_zusatz);
	}
	else {
		$sql_get_infos_zusatz = 
			'SELECT *
			 FROM lebensmittel 
			 WHERE kat_id = "26"  '.$extraclause;
		$result_get_list_zusatz = mysqli_query($connect_hit, $sql_get_infos_zusatz);
	}
		
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
		
		
		if ($pagename_scripts == "mylist") {									
				
			switch($row_zusatz["histamin_uv"]) {
				case "0": $uv_color ="class='wert_txt_green'"; break;
				case "1": $uv_color ="class='wert_txt_yellow'"; break;
				case "2": $uv_color ="class='wert_txt_red'"; break;
				default: $uv_color =""; break;			}
				
			switch($row_zusatz["eigene_wertung"]) {
				case "0": $uv_color_mine ="class='wert_bg_green'"; break;
				case "1": $uv_color_mine ="class='wert_bg_yellow'"; break;
				case "2": $uv_color_mine ="class='wert_bg_red'";break;
				default: $uv_color_mine =""; break;			}
				
			$table_zusatz.= '<tr>
								<td '.$uv_color.'> '.$row_zusatz["histamin_uv"].' </td>
								<td '.$uv_color_mine.'> '.$row_zusatz["eigene_wertung"].' </td>
								<td style="text-align:left;" > '.$row_zusatz["name"].' </td>
								<td> '.$row_zusatz["e-nummer"].' </td>
								<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
								<td style="font-size:11px;text-align:left;"> '.$row_zusatz["notizen"].' </td>      
							</tr>';  
		}
		else {
			switch($row_zusatz["histamin_uv"]) {
				case "0": $uv_color ="class='wert_bg_green'"; break;
				case "1": $uv_color ="class='wert_bg_yellow'"; break;
				case "2": $uv_color ="class='wert_bg_red'"; break;
				default: $uv_color =""; break;		}
			
			$table_zusatz.= '	
				<tr>
					<td '.$uv_color.'> '.$row_zusatz["histamin_uv"].' </td>
					<td style="text-align:left;"  > '.$row_zusatz["name"].' </td>
					<td> '.$row_zusatz["e-nummer"].' </td>
					<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
					<td style="font-size:11px;text-align:left;"> '.$row_zusatz["notizen"].' </td>      
				</tr>'; 	 
		}
		
					
	}	
	$table_zusatz.= '</table>';
}
elseif($katid == "karenz") {  // WENN Karenz AUSGEWÄHLT
	$sql_get_infos_karenz = 
	'SELECT *
	 FROM lebensmittel
	 WHERE karenz LIKE "0" '.$extraclause; 
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
			case "1": $uv_color ="class='wert_bg_yellow'"; break;
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
	if ($pagename_scripts == "mylist") {									
		$sql_get_infos_katinfo = 
			'SELECT *
			 FROM lebensmittel
			 WHERE kat_id = "'.$katid.'" AND eigene_wertung != "" '.$extraclause_mylist;
		 $result_get_list_katinfo = mysqli_query($connect_hit, $sql_get_infos_katinfo);
	}
	else {
		$sql_get_infos_katinfo = 
			'SELECT *
			 FROM lebensmittel
			 WHERE kat_id = "'.$katid.'"  '.$extraclause;
		 $result_get_list_katinfo = mysqli_query($connect_hit, $sql_get_infos_katinfo);
	}
	
	
	
	while($row_katinfo = mysqli_fetch_assoc($result_get_list_katinfo)) {
		$info = "";
		 if (isset($row_katinfo["liberator"]) AND $row_katinfo["liberator"] == "1") { $info .= "Liberator <br>";}
		 if (isset($row_katinfo["blocker"]) AND $row_katinfo["blocker"] == "1") { $info .= "DAO-Blocker <br>";}
		 if (isset($row_katinfo["biogene_amine"]) AND $row_katinfo["biogene_amine"] == "1") { $info .= "Biogene-Amine <br>";}
		 if (isset($row_katinfo["hnmt-blocker"]) AND $row_katinfo["hnmt-blocker"] == "1") { $info .= "HNMT-Blocker <br>";}
		 if (isset($row_katinfo["dao-blocker"]) AND $row_katinfo["dao-blocker"] == "1") { $info .= "DAO-Blocker <br>"; }
		 if (isset($row_katinfo["histamin"]) AND $row_katinfo["histamin"] == "1") { $info .= "Histaminhaltig <br>"; }
						
		if ($pagename_scripts == "mylist") {									
				
			switch($row_katinfo["histamin_uv"]) {
				case "0": $uv_color ="class='wert_txt_green'"; break;
				case "1": $uv_color ="class='wert_txt_yellow'"; break;
				case "2": $uv_color ="class='wert_txt_red'"; break;
				default: $uv_color =""; break;			}
			switch($row_katinfo["eigene_wertung"]) {
				case "0": $uv_color_mine ="class='wert_bg_green'"; break;
				case "1": $uv_color_mine ="class='wert_bg_yellow'"; break;
				case "2": $uv_color_mine ="class='wert_bg_red'";break;
				default: $uv_color_mine =""; break;			}
				
			$table_kat.= '	<tr>
							<td '.$uv_color.'> '.$row_katinfo["histamin_uv"].' </td>
							<td '.$uv_color_mine.'> '.$row_katinfo["eigene_wertung"].' </td>
							<td style="text-align:left;" > '.$row_katinfo["name"].' </td>
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_katinfo["notizen"].' </td>      
						</tr>'; 
		}
		else {
			switch($row_katinfo["histamin_uv"]) {
				case "0": $uv_color ="class='wert_bg_green'"; break;
				case "1": $uv_color ="class='wert_bg_yellow'"; break;
				case "2": $uv_color ="class='wert_bg_red'"; break;
				default: $uv_color =""; break;		}
			
			$table_kat.= '	<tr>
							<td '.$uv_color.'> '.$row_katinfo["histamin_uv"].' </td>
							<td style="text-align:left;"  > '.$row_katinfo["name"].' </td>
							<td style="font-size:11px;text-align:left;"> '.$info.' </td>						
							<td style="font-size:11px;text-align:left;"> '.$row_katinfo["notizen"].' </td>      
						</tr>'; 	 
		}					
	}
	$table_kat.= '</table>';
}

?>
				
				
				<h2><?php if (isset($page_title)) {echo $page_title;} ?></h2>
				<br>
				<button type="button" id="alles" onclick="load_table('','&pagename=<?php echo $pagename_scripts; ?>') " >Alle Wertungen</button> 
				<button type="button" class="wert_bg_green" id="green_button"  onclick="load_table('&value=green','&pagename=<?php echo $pagename_scripts; ?>') " >Nur Verträgliche</button> 
				<button type="button" class="wert_bg_yellow" onclick="load_table('&value=yellow','&pagename=<?php echo $pagename_scripts; ?>') " >Nur mäßig Verträglich</button> 
				<button type="button" class="wert_bg_red" onclick="load_table('&value=red','&pagename=<?php echo $pagename_scripts; ?>')" >Nur schlecht Verträgliche</button> 
				<br><br><br>
				<?php 
				if ($katid == "") {echo $table_all;}
				elseif ($katid == "26") {echo $table_zusatz;}
				elseif($katid == "karenz") {echo $table_karenz;}
				else  {echo $table_kat;}
				?>
				<br>				