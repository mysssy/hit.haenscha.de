<?php
require_once ("session.php");  
require_once ("connect.php"); 
require_once ("topphp.php"); 

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
		<script type="text/javascript" src="piwik.js"></script>
</head>

<body>
	<script>			
		function load_table(kat,pagename) {
				$("#dynamic_table").load("scripts.php<?php echo "?katid=".$katid; ?>"+kat+pagename);
			}
    </script>
	
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
				<div id='dynamic_table' >
					<?php	include "scripts.php";	?>				
				</div>
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
					 <td style='background-color:#990000;color:#ffffff;font-weight:500;'> 2 </td>
					 <td style="text-align:left;" > schlecht unverträglich!  <br> Deutliche Symptome!  Verzehrsmengen unabhängig!</td>
					</tr>
					<tr>
					 <td>?</td>
					 <td style="text-align:left;" > Widersprüchliche oder kaum Informationen zur Verträglichkeit </td>
					</tr>
				</table>
				<br>
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