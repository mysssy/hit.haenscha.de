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
	
	<!-- SEITENNAVIGATION sidenav class="w3-sidenav w3-collapse w3-slim"-->
				
		
	<!-- MAIN WRAPPER "belowtopnav" -->
	<div class='w3-main' id='belowtopnav' style='padding:10px 100px;'>
		<div>
			<div id='main' style="text-align:left;">  <!-- ANFANG MAINTEXT -->	
				<br>
				<h2> Allgemeine Empfehlungen für eine histaminarme Ernährung </h2>
				<ul>
					<li>Histaminhaltige Lebensmittel vermeiden - mindestens 3 Monate, besser 6 Monate</li>
					<li>Ausschließlich histaminarme Lebensmittel verwenden </li>
					<li>Histaminliberatoren vermeiden </li>
					<li> Lebensmittel so frisch wie möglich verzehren
						<ul>
							<li>Direkt aus dem Kühlschrank Nahrung essen, nicht vorher herausnehmen und warm werden lassen </li>
							<li>Mahlzeiten aus frischen unverarbeiteten oder wenig verarbeiteten Rohstoffen zubereiten </li>
							<li>Histamingehalte können sich ändern! Hängen vom Reife- und Hygienezustand des Nahrungsmittels ab. </li>
							<li>Vermeiden Sie das Warmhalten oder Aufwärmen von Fleisch- und Fischspeisen </li>
							<li>Reste rasch abkühlen lassen und frieren Sie diese ein. Immer schnell auftauen und sofort verbrauchen! </li>
						</ul>
					</li>
					<li>Einmal gebildetes Histamin kann nicht durch Kochen, Backen oder Einfrieren zerstört werden </li>
					<li>Vor einer ärztlichen Behandlung immer auf die Histamin-Unverträglichkeit hinweisen. Vor allem bei Operationen unter Narkose. </li>
					<li>Notfallset dabei haben! (sollte der Arzt verschreiben; Inhalt könnte sein Diaminoxidase, Antihistaminika, Asthmaspray, ...) </li>
					<li>Kupfer- und Zink-Haushalt im Auge behalten</li>
					<li>Lebensmittel der kritischen Gruppen immer auf mehrere Mahlzeiten am Tag verteilt und nie in größeren Mengen verzehrt werden </li>
					<li>Vorwiegend Rapsöl benutzen. Sonnenblumenöl = entzündungsfördernd, Rapsöl = Entzündungshemmend; Olivenöl = neutral. </li>
					<li>Die Verwendung von Backpulver ist ok, ggf. Weinsteinbackpulver verwenden </li>
					<li>Der Einsatz von Hefe als Backtriebmittel ist für Histaminintoleranz, anders als häufig aufgeführt, in der Regel unproblematisch. Auch wenn die verwendete Hefe selbst nicht histaminhaltig ist, während sie aktiv ist und einen Teig aufgehen lässt, kann sie Histamin produzieren. Dadurch enthalten Brot- und Backwaren, bei denen der Teig sehr luftig ist, häufig sehr viel mehr Histamin, als festere Brotsorten. </li>
					<li>Fisch, Meeresfrüchte und Fleisch sind hoch verderblich. Schon nach wenigen Minuten ohne richtige Kühlung kann der Histaminwert weit angestiegen sein. </li>
					<li>Histamingehalt steigt tendenziell mit dem Zerkleinerungsgrad von Fleisch, z.B. wird Hackfleisch rasch unverträglich. 
					Hackfleisch frisch vom Metzger herstellen lassen und sofort verbrauchen. Vorsichtig sein sollte man auch bei aufgewärmten oder lang gegarten Fleischgerichten wie Gulasch oder Rouladen. </li>
				</ul>
				<br> 	
				<br>
				<h2> NoGo List </h2>
				<ul>	
					<li>Kein Alkohol </li>
					<li>Keine Konserven oder Fertigprodukte </li>
					<li>Keine überreifen Lebensmittel (alter Käse, alkoholische Getränke, alter Fisch, ...) </li>
					<li>Kein Schweinefleisch (sollte lebenslang komplett gestrichen werden) </li>
					<li>Keine Softdrinks (wg. Zucker) </li>
					<li>Keine Hülsenfrüchten, Nüssen und Samen (Nach Karenzzeit langsames hinzufügen möglich) </li>
					<li>Kein Kaffee und Tee (Nach Karenzzeit langsames hinzufügen möglich, meist verträglich) </li>
					<li>Kein Hefeextrakt:  entsteht aus enzymatisch behandelter Hefe und enthält Glutamat. Es wird häufig verwendet in Bouillons, Saucen, Fertigmahlzeiten und Würzmischungen, um den Speisen ein kräftigeres Aroma zu verleihen. </li>
				</ul>
				<br> 	
				<br>
				<h2>Hilfreiche Sachen bei Histaminintoleranz:</h2>
				<ul>
					<li>Darmsanierung: Probiotika können zum Aufbau der Darmflora wichtig sein. Aber Vorsicht: Keine histaminbildenen Probiotika-Stämme. </li>
					<li>Heilfasten ist gut zum Beginn </li>
					<li>Heilpflanzen wie die Brennnessel zur Ausleitung nutzen </li>
					<li>Unterstützend können Vitaminen C und B-Komplex sein </li>
					<li>Verzehr von Quinoa, Reishi und Cordiceps (Heilpilze gegen Stress) </li>
					<li>naturheilkindliche Präparate gegen Histaminose sind Acerola-Kirschen, Yams-Wurzel und Maca-Kresse </li>
					<li>Da DAO kann nur gemeinsam mit ausreichend Magnesium, Zink und Kupfer ordnungsgemäß. Magnesium ist beispielsweise reichlich in Amaranth und Quinoa enthalten und Zink findet sich meist gemeinsam mit Kupfer in Trockenfrüchten, Kürbiskernen, Sonnenblumenkernen und verträglichen Hülsenfrüchten (vor dem Kochen über Nacht einweichen) </li>
					<li>ine negative Vitamin-B6-Bilanz weisen z. B. Käse, Wurst, Gelatine und Erdnüsse auf. Das bedeutet, zur Verstoffwechslung von deren Eiweiß wird mehr Vitamin B6 benötigt, als im Lebensmittel enthalten ist.  Eine positive Vitamin-B6-Bilanz findet sich hingegen beispielsweise bei Süsskartoffeln, Hirse, Lauch, Paprika und Trockenfrüchten </li>
					<li>Kefir, Joghurt oder Dickmilch(gesäuerte Milchprodukte): Gut! All diese Nahrungsmittel haben einen stabilisierenden Effekt auf das Mikrobiom des Darmes und die Barrierefunktion der Darmschleimhaut. </li>
				</ul>	 
				 
				<br> 
						
			</div>   <!-- ENDE MAINTEXT -->	
		</div>  <!-- ENDE MAINTEXT -->
	</div> <!-- ENDE "belowtopnav" -->
			
</div> 
</body>
</html>