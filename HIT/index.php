<?php
require_once ("session.php"); 
?>
<!DOCTYPE html>
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
				
		
	<!-- MAIN WRAPPER "belowtopnav" -->
	<div class='w3-main' id='belowtopnav' style='padding:10px 100px;'>
		<div>
			<div id='main'>  <!-- ANFANG MAINTEXT -->
				
				<div id="mainindex_top" >
					</br> 
					<h1> Willkommen	auf meiner Seite zur Histaminintoleranz</h1>
					</br>
					<p> Hier findest du Informationen rund um das Thema Histaminintoleranz.</p>
					<div id="mainlinks" > 
						<ol style="list-style-type:upper-roman;"> 
							<li> <a href="#was_ist_HIT">Allgemeine Informationen zur Histaminintoleranz</a> </li> 
							<ul>
								<li> <a href="#was_ist_HIT">Was ist Histaminintoleranz kurz HIT / HI? </a></li> 
								<li> <a href="#was_ist_histamin"> Was genau ist Histamin?	</a> </li> 
								<li> <a href="#was_ist_dao_hnmt_mao" >Was ist Diaminoxidase (DAO), N-Methyltransferase (HNMT) und Monoaminoxidase (MAO) und welche Bedeutung haben sie? </a> </li> 
								<li> <a href="#was_ist_MCAD"> Was ist die systemische Mastellaktivierugnserkrankung (MCAD)</a> </li> 							
							</ul> 
							</br>
														
							<li> <a href="#symptome"> Symptome bei Histaminintoleranz</a> </li> 
							</br>
							<li> <a href="recommendations.php"> Allgemeine Empfehlungen zum Umgang mit HIT</a> </li>  
							</br>
							<li> <a href="list.php"> Nahrungsmittelliste</a> </li>  
							<li> <a href="med.php"> Medikamentenliste</a> </li>  
							</br>
							<li> <a href="mylist.php"> Meine persönliche Nahrungsmittelliste</a> </li> 
						</ol> 
					</div>	
					</br>
					</br>
					</br>
					</br>
					<h2><a name="was_ist_HIT"> Was ist Histaminintoleranz kurz HIT / HI? </a> 	</h2>
				</div>	
	
				<div id="mainindex_left" >
					<p>Histaminintoleranz, auch Histaminose oder Histaminunverträglichkeit genannt, ist eine erworbene (sekundäre) oder angeborene (primäre)  nicht immunologische Stoffwechselstörung. 
						</br></br>
						Ursachen hierfür ist ein Missverhältnis zwischen Zufuhr und Abbau des Histamins, welches den Histaminspiegel ansteigen lässt, wenn die Summe aller Histaminquellen die Fähigkeit des Körpers, Histamin abzubauen, übersteigt. Wenn die individuelle Toleranzschwelle überschritten wird, kommt es zu einer breiten Palette von "Vergiftungssymptomen". 
						</br></br>
						Diese Symptome sind ähnlich einer Allergie, Lebensmittlervergiftung oder Erkältung.
						Aufgrund dessen das Histamin auch andere Funktionen im Körper übernimmt, haben die Symptome jedoch ein sehr viel breiteres Spektrum (siehe unten).
						</br> </br>
						Oft ist es für Betroffene fast unmöglich Zusammenhänge mit irgendwelchen auslösenden Faktoren zu erkennen und außer einer Histamin-Eliminationsdiät steht noch keine brauchbare und anerkannte Diagnosemethode zur Verfügung.
						 </br></br>
						Die Therapie besteht zum Großteil aus dem dauerhaften Meiden unverträglicher und histamin-/histidinhaltiger Lebensmittel und Medikamenten.
						Unverträgliche Lebensmittel erstrecken sich über alle Nahrungsmittelbereiche und auch die Frische der Lebensmittel ist ausschlaggebend.
						Beispiele solcher Lebensmittel sind Fisch, Wurstwaren, Trockenfleisch, lang gereifte Käsesorten, Wein, Essig, Sauerkraut, Hülsenfrüchte, Zitrusfrüchte, Koffein, Nüsse, Fertiggerichte, fertige Saucen, Gewürze und einige Lebensmittelzusatzstoffe. 
						Auch Medikamente, Stress, Anstrengung und diverse Chemikalien können Symptome auslösen oder verstärken, somit ist die Histaminintoleranz keine reine Nahrungsmittelunverträglichkeit.
					</p>
				</div>
				<div id="mainindex_right" > 
					</br>
					<ul>
						<li style="font-weight:700;text-decoration:underline;"> angeborene (primäre) Form: </li>
						Betroffene leiden ihr gesamtes Leben unter den Symptomen und soll recht selten sein. Sie ist genetisch bedingt.
						<ul>
							<li>diverse genetische Veränderungen, welche die Enzyme DAO, HNMT und MAO negativ beeinflussen.</li>
						</ul>
					</br></br>
					 
					<li style="font-weight:700;text-decoration:underline;">erworbene (sekundäre) Form: </li>
						Diese Form kommt aufgrund bestimmter Ursachen und kann auch wieder vergehen.
						Sie entsteht durch 
						<ul> 
							<li>Schädigung der Darmschleimhaut</li>
							<li>Infektionen der Darmschleimhaut (DAO-Mangel möglich)</li>
							<li>Fehlbesiedelung des Darms (Intestianle Dysbiose)</li>
							<li>Darmdurchlässigkeit (Dünndarm-Permeabilität)</li>
							<li>Zöliakie oder anderer Nahrungsmittelintoleranzen</li>
							<li>Medikamente (verringerte DAO-Aktivität oder DAO-Mangel )</li>
							<li>übermäßigen Konsum histaminreicher Lebensmittel und alkoholischer Getränke</li>
							<li>Vitamin- und Mineralstoffmangel (Mangel an Ko-Faktoren, welche die abbauenden Enzyme unterstützt und fördern)</li>
							<li>andere unklare Ursachen (Chemische Umwelteinflüsse, etc.)</li>
							<li>Systemische Mastzellaktivierungserkrankung (siehe unten) (übermäßige Freisetzung von körpereigenem Histamin; auch genetisch bedingt möglich)</li>
						</ul>
					</ul>
				</div>
				<div id="mainindex_bottom" >
					 </br>
					</br>
					<a name="was_ist_histamin"><h2> Was genau ist Histamin?	 </h2></a>
					<p> 
						Histamin ist ein körpereigenes biogenes Amin, das wichtige Funktionen im Körper erfüllt.
						Es wird zum einen durch den Abbau der Aminosäure Histidin gebildet und zum anderen auch vom Körper selbst ausgeschüttet .
						Aufgrund dessen ist nicht nur der Verzehr von histidin-/histaminhaltigen Lebensmittel problematisch sondern auch körperliche Anstrengung, Stress, Allergien und Krankheit. 
						Histamin wird überwiegend in den Mast- und Nervenzellen eingelagert (Schleimhäute und Bronchien) und wird bei Bedarf von dort aus wieder freigesetzt.
					</p>
					
					<p>Im Körper spielt Histamin eine wichtige Rolle:</p>
					<ul>
						<li>bei Abwehrreaktionen</li>
						<ul>
							<li>Entzündungsreaktionen</li>
							<li>Allergien und Immunabwehrreaktionen (Juckreiz, Schmerzen, Hautrötung, Nesselsucht)</li>
						</ul>
						
						<li>im Magen-Darm-Trakt</li>
						<ul>
							<li>Regulation der Magensäure und der Magen-Darm Bewegungen (histaminvermittelte Abwehrreaktion)</li>
						</ul>
						
						<li>im Herz-Kreislaufsystem</li>
						<ul>
							<li>Zentrale Kontrolle des Blutdrucks</li>
							<li>Beschleunigung des Herzschlags, Steigerung der Schlagkraft des Herzens und Erweiterung kleiner Blutgefäße</li>
						</ul>
						
						<li>im zentralen Nervensystem</li>
						<ul>
							<li>Regulation der Körpertemperatur</li>
							<li>Schmerzempfindung</li>
							<li>wirkt als Neurotransmitter und regelt den  Schlaf-Wach-Rhythmus sowie den Appetit </li>
							<li>Regulation der Ausschüttung von Hormonen, wie zB Adrenalin, Serotonin, Dopamin </li>
						</ul>
					</ul>		 
					</br>
					</br>
					<a name="was_ist_dao_hnmt_mao" ><h2> Was ist Diaminoxidase (DAO), N-Methyltransferase (HNMT) und Monoaminoxidase (MAO) und welche Bedeutung haben sie? </h2>  </a>
					 
					<p>
						Das sind Enzyme, welche bei dem Abbau von Histamin die Hauptrollen übernehmen. 
						Ein Mangel eines dieser Enzyme führt dazu, dass Histamin nicht mehr ausreichend abgebaut werden kann oder zu langsam abgebaut wird und dadurch das Zuviel an Histamin im Körper unangenehme Symptome verursacht (= Histaminintoleranz).	</br>
						Welches der beiden Enzyme wie stark betroffen ist, beeinflusst die Symptomatik bezüglich zeitlichem Verlauf, Intensität und Art der Symptome. 	</br>
						</br>
						DAO baut Histamin im Darm ab. HNMT dahingegen direkt in der Zelle.	</br>
						</br>
						Im Zentralnervensystem (ZNS), in der Bronchialschleimhaut, Leber und in der Haut ist die HNMT der Hauptabbauweg. 
						Bei einer Funktionsminderung der HNMT sind insbesondere das Gehirn und die Bronchien eher stark betroffen, wohingegen bei der akuten Form bei der eine Funktionsminder der DAO eher zu Magen-Darm-Beschwerden und Herz-Kreislauf-Beschwerden führt.</br>
						</br>
						<u>Man vermutet folgendes</u>: </br>
						Bei DAO-Mangel oder Aktivitätsminderung steigt das Histamin meist rapide an wird aber auch relativ schnell abgebaut, somit sind Symptome meist zeitnah und heftig, aber auch relativ schnell wieder vorbei. </br>
						</br>
						Bei HNMT-Mangel oder Aktivitätsminderung steigt das Histamin langsam aber stetig an mit jeder Mahlzeit und nimmt nur langsam wieder ab. Damit wird das "Fass zum Überlaufen gebraucht" und Symptome treten auf. Hier sind Symptome meist zeitverzögert und werden meist nicht mehr mit dem eigentlichen unverträgliche Lebensmittel oder Aktivität in Verbindung gebracht.	</br>
						</br>
						<p class="center" > <img src="./histaminabbaukurve_histamininCH.jpg"><p class="center" style="font-size:11px;";>Histaminabbaukurve von histaminintoleranz.ch </p> </img></p>
						</br>
						</br>
						Die Monoaminoxidase (MAO) ist ein Enzym, welches in zwei Varianten (MAO-A und MAO-B) im Körper vorkommt. Die MAO baut bestimmte biogene Amine ab: Unter anderem Serotonin, Noradrenalin und Dopamin (Neurotransmitter), aber auch Tyramin, welches in Käse in großen Mengen vorkommen kann.  Für den Histaminabbau ist die MAO nur dann von Bedeutung, wenn sehr große Histaminmengen anfallen.
					</p>
					</br>
					</br>
					</br>
					<a name="was_ist_MCAD"><h2>  Was ist die systemische Mastellaktivierugnserkrankung (MCAD) </h2></a> 
					 
					<p>
						Erklärung kopiert von: http://www.mastzellaktivierung.info/</br>
						</br>
						Systemische Mastzellaktivierungserkrankungen (MCAD, von engl. mast cell activation disease) fassen als Überbegriff die drei Untergruppen Mastzellaktivierungssyndrom (MCAS), systemische Mastozytose (SM) und Mastzelleukämie (MCL) zusammen, wobei nur das MCAS häufig ist (ca. 5-17%).</br>
						</br>
						MCAD können eine breite Symptomatik hervorrufen und dadurch das Wohlbefinden stark beeinträchtigen. Neuere Forschungsergebnisse deuten zudem darauf hin, dass MCAD die eigentliche Ursache für diverse Krankheiten mit bisher unbekannter Ursache sind. Hierzu gehören insbesondere chronisch-entzündliche Erkrankungen</br>
						</br>
						Krankhaft veränderte Mastzellen (ein zum Immunsystem gehörender Zelltyp), die aus einer einzelnen mutierten Vorläuferzelle im Knochenmark hervorgegangen sind, setzen vermehrt Histamin und andere Botenstoffe (Mediatoren) frei. In seltenen Fällen findet man Mutationen, die als krankheitsauslösend bekannt sind. In den meisten Fällen ist jedoch noch unbekannt, was die Daueraktivierung oder leichtere Aktivierbarkeit der Mastzellen verursacht.</br>
						</br>	 
						Es kann unterschieden werden zwischen primärer, sekundärer, idiopathischer und umweltbedingter Mastzellaktivierung:</br>
						<ol>
							<li> <u>Primär</u>: Formen von Mastozytose mit bekannter körperlicher Ursache.</li>
							<li> <u>Sekundär</u>: andere Erkrankungen mit Mastzellaktivierung, z.B. Allergien</li>
							<li> <u>Idiopathisch</u>: unbekannte Ursache. Vermutlich ebenfalls zur Mastozytose zu zählen, obwohl die derzeit geltenden WHO-Diagnosekriterien nicht erfüllt werden.</li>
							<li> <u>Umweltbedingt</u>: Aktivierung auf Grund ungünstiger äusserer, nicht körperlicher Ursachen. Auch die Mastzellen jedes gesunden Menschen lassen sich bei ausreichender Reizstärke aktivieren.</li>
						</ol>	
						</br>
						<b> Ursachen/Auslöser: </b>
						</br>
						<ul>
							<li>Chemische Auslöser</li>
								<ul>
								<li>Ernährung: diverse Lebensmittel und Zusatzstoffe: Zitrusfrüchte, Tomaten, Benzoate, Sulfit, ...</li>
								<li>Diverse Arzneimittel, Nahrungsergänzungsmittel, Stärkungsmittel: Acetylsalicylsäure, Diclofenac, Röntgenkontrastmittel, ...</li>
								<li>Chemische Reizstoffe (Chemikalienunverträglichkeit): Düfte, Duftstoffe, Insektenstiche, Luftschadstoffe, Tabakrauch, ...</li>
								</ul>
							<li>Psychische Auslöser</li>
								<ul>
								<li>Nervliche Erregung: psychischer / seelischer Stress, Emotionen, Zeitdruck, Leistungsdruck</li>
								<li>Psychische Eigenschaften und Erkrankungen: Ängstlichkeit, Angststörungen, Hypochondrie, psychosomatische Störungen</li>
								</ul>
							<li>Physikalische Auslöser</li>
								<ul>
								<li>Körperlicher Stress, mechanische Einwirkungen: körperliche Anstrengung, Druck, Reibung, Kratzen, sinkender oder schwankender Luftdruck (→Wetterfühligkeit)</li>
								<li>Strahlung, Energie, Temperatur: Kälte, Wärme, Temperaturschwankungen, Sonnenlicht</li>
								</ul>
							<li>Körperliche Auslöser</li>
								<ul>
								<li>Allergien (IgE, aber auch IgG), Kreuzreaktionen</li>
								<li>Autoimmunerkrankungen</li>
								<li>Hormone: Menstruation, Antibabypille, Hormontherapien, hormonaktive Umweltschadstoffe, Phytoöstrogene (Hopfen, Soja, ...)</li>
								<li>Nebennierenschwäche</li>
								<li>Zirkadiane Rhythmen (Tag-Nacht-Rhythmus): tageszeitliche Schwankungen des Cortisonspiegels, Schlafmangel, Schlafentzug</li>
								<li>Mediator-Abbaustörungen: Histamin-Abbaustörungen</li>
								</ul>
							<li>Pathogene Organismen, Krankheitserreger: bakterielle Infekte, Bruchstücke von Bakterienbestandteilen, Parasiten (Würmer etc.), Präparate zur "Stärkung" des Immunsystems (z.B Echinacea-Extrakt), Hyposensibilisierungstherapie für Allergiker ("Desensibilisierung")</li>
						</ul>	
						</br>
					</p>
					</br>	
					</br>
					
					<a name="symptome"><h2>  Die Symptome  </h2> </a>
					<p>					
					Die Symptome sind sehr breit gestreit und sind je nach Art der HIT, der individuellen Toleranzschwelle und anderen Faktoren unterschiedliche bei jedem Einzelnen. Daher kann man nicht von DEM typsichen Symptom sprechen.</br>
					Am Ehesten treten Symptome bei bzw. nach der Nahrungsaufnahme auftreten, mitunter sogar bis zu 72 Stunden später.</br>
					</br>
					<h3> Die häufigsten Symptome zusammengefasst:</h3> </br>
					<u>Charakteristische Symptome bei HNMT Problematik</u></br>
					<ul>
						<li>Leichte Kopfschmerzen bis hin zur Migräne (durch die gefäßerweiternde Wirkung des Histamin)</li>
						<li>Asthmaanfälle, Reizhusten, häufiges Räuspern</li>
						<li>Schlafstörungen, Müdigkeit, Erschöpfungszustände</li>
						<li>Verspannungen, verkrampfte Schultern/Nacken, Rückenschmerzen, Zähneknirschen</li>
						<li>Gelenk- und Muskelschmerzen</li>
						<li>Depressionen und Panikattacken</li>
						<li>Seekrankheit, Reisekrankheit, Schwindel</li>
						<li>Erhöhte Infekt- und Entzündungsanfälligkeit</li>
						<li>Menstruationsbeschwerden</li>
						<li>Ödeme (Schwellungen, Wasseransammlungen)</li>
						<li>Grippeähnliche Symptome, andauerndes Krankheitsgefühl, Gliederschmerzen</li>
					</ul>
					
					<u>Charakteristische Symptome bei DAO Problematik</u></br>
					<ul>
						<li>verstopfte bis laufende Nase, Niesen, Husten, Atembeschwerden</li>
						<li>Asthmaanfälle, Reizhusten, häufiges Räuspern</li>
						<li>Verdauungsprobleme wie Durchfall, Bauchschmerzen, Blähungen, Sodbrennen, Magen-Darmkrämpfe</li>
						<li>Trockene Augen, wässrige Augen, Augenbrennen</li>
						<li>Kribbeln im Mund und Händen</li>
						<li>Juckreiz, Hautausschlag, Hautrötungen</li>
						<li>Hitzegefühl, Hitzewallungen, Schweißausbrüche, Fiebergefühl</li>
						<li>Herzrasen, Herzstolpern, Herzklopfen, Blutdruckabfall</li>
						<li>Rötung des Gesichts und der Haut, Flush im Gesicht nach Weingenuss</li>
					</ul>
					Es sind diverse Symptome gleichzeitig möglich, da wie wir gelesen haben, beide Problematiken bei dem Histaminabbau gleichzeitig vorkommen können in unterschiedlicher Ausprägung, sowie eine übermäßige Histaminzufuhr über das Essen oder die Mastzellen ebenso möglich ist.</br>
					</br>
					Die Folgenden Symptome sind zusammengetragen worden von histaminunvertraeglichkeit.net und von mir teilweise von anderen Seiten ergänzt worden.</br>
					</br>
					</br>
					<h3> Magen-Darm</h3>
						<ul>
							<li>Blähungen, Bauchweh, Magenstechen, Magen- und Darmkrämpfe</li>
							<li>Häufig oder chronisch Durchfall, morgendliche Durchfälle</li>
							<li>Seltener auch Verstopfung oder abwechselnd Durchfall und Verstopfung</li>
							<li>Sodbrennen, Magenbrennen, aufstoßende Magensäure (gastroösophagaler Reflux)</li>
							<li>Entzündliche Magen- oder Darmerkrankungen, Reizdarmsyndrom</li>
							<li>Übelkeit, Erbrechen</li>
							<li>Seekrankheit, Reiseübelkeit</li>
							<li>Symptome, die einer Magen-Darm-Grippe (Gastroenteritis) ähneln</li>
						</ul>
					</br>
					<h3> Herz-Kreislaufsystem</h3>
						<ul>
							<li>Blutdruckabfall, niedriger Blutdruck (Hypotonie)</li>
							<li>Herzrhythmusstörungen („Herzstolpern“)</li>
							<li>Herzklopfen (Erhöhung der Schlagkraft des Herzens über Freisetzung von Adrenalin)</li>
							<li>Herzrasen, Erhöhung der Herzfrequenz (Tachykardie), bis hin zu Panikattacken</li>
							<li>Bluthochdruck (Hypertonie)</li>
						</ul>
					</br>
					<h3> Haut, Schleimhäute, Atemwege</h3>
						<ul>
							<li>„Dauerschnupfen“, Anschwellen der Nasenschleimhaut, laufende Nase speziell bei Einnahme von Mahlzeiten, auch unabhängig von Art und Histamingehalt der Mahlzeit, evtl. verstärkt durch Kälte/Rauch/Smog/Düfte</li>
							<li>Beim Nase Schnäuzen kann auch etwas Blut dabei sein (erhöhte Durchlässigkeit von Blutgefässen)</li>
							<li>Starkes Schwitzen, Schweissausbrüche, nächtliches Schwitzen, Schweissfüsse/-hände, Hitzewallungen</li>
							<li>Erröten des Gesichts nach Mahlzeiten, Hitzegefühl, Gesichtshaut fühlt sich leicht entzündet an, Fiebergefühl</li>
							<li>Hautunreinheiten im Gesicht, Akne, Pickel, Mitesser, Talg-Überproduktion, fettige Haut</li>
							<li>Ausschläge, Hautrötungen, Juckreiz, Ekzeme, Nesselsucht</li>
							<li>Juckreiz (z.B. juckende Kopfhaut, juckende Impfnarben)</li>
							<li>Physikalische Reize wie zum Beispiel Kratzen, Schläge oder Wärme lösen Rötung/Hautausschlag und Juckreiz aus</li>
							<li>Reibeisenhaut: Oberarme, manchmal auch Oberschenkel, Gesicht etc. sind übersät mit kleinen roten Pünktchen/Pickeln, vereinzelt verhornt oder eitrig.</li>
							<li>An den Händen brennende/schmerzende Entzündungen/Bläschen/Knötchen/Schwielen</li>
							<li>„Sonnenallergie“: Haut wird an der Sonne schnell rot, am Folgetag ist aber der „Sonnenbrand“ wieder weg.</li>
							<li>Trockene Lippen</li>
							<li>Aften: Mikroverletzungen der Mundschleimhaut werden zu kleinen gelbweissen „Löchern“/“Wunden“, die höllisch schmerzen und tage- bis monatelang nicht abheilen. Nebst der Mundschleimhaut können auch einzelne Papillen auf der Zunge schmerzen wie eine Afte.</li>
							<li>Chronischer Husten, ständiger Hustenreiz, trockener Reizhusten, Bronchitis, gereizte Bronchien</li>
							<li>Ständiges Hüsteln, besonders in Stresssituationen</li>
							<li>Auswurf: zäher Schleim zum Abhusten, häufiges Räuspern, evtl. auch Stimmbänder belegt, besonders nach üppigen Mahlzeiten</li>
							<li>Ödeme (=Schwellungen auf Grund von Flüssigkeitsansammlungen im interstitiellen Gewebe), z.B. geschwollene Augenlider, Wasser in den Beinen</li>
						</ul>
					</br>
					<h3> Nervensystem</h3>
						<ul>
							<li>Kopfschmerzen, Migräne *</li>
							<li>Müdigkeit, Energielosigkeit, Antriebslosigkeit, Erschöpfungszustände</li>
							<li>Schlaflosigkeit, Einschlaf- und Durchschlafstörungen, Traumlosigkeit</li>
							<li>Konzentrationsstörungen, Beeinträchtigung der geistigen Leistungsfähigkeit</li>
							<li>Vergesslichkeit</li>
							<li>Lärmempfindlichkeit, Suchen von Ruhe und Ereignislosigkeit</li>
							<li>Anfälligkeit für Reizüberflutung</li>
							<li>Stressanfälligkeit, verminderte Belastbarkeit, Burnout-Gefühl (Gefühl von geistiger / nervlicher Erschöpfung oder Überarbeitung)</li>
							<li>Nervosität ohne erkennbaren Grund, Unruhe,  Gefühl einer Koffein-Überdosis</li>
							<li>Muskelkrämpfe, Muskelzuckungen, Zittern, verkrampfte Kiefermuskulatur, Zähneknirschen</li>
							<li>Traurigkeit, depressive Verstimmungen, Depressionen (oft ohne erkennbaren Grund) bis hin zu Suizidgedanken</li>
							<li>Persönlichkeitsveränderungen, evtl. weitere psychische/neurologische Störungen</li>
							<li>Erhöhte Adrenalin-Ausschüttung, welche zu Aggressionsverhalten und Unruhezuständen führen kann</li>
						</ul>
					</br>
					<h3> Hormonsystem</h3>
						<ul>
							<li>Dysmenorrhoe (=Regelschmerzen, Menstruationsschmerzen), Zyklusstörungen</li>
							<li>Endometriose (funktionsfähiges Gebärmutterschleimhaut-ähnliches Gewebe wächst nicht nur in der Gebärmutterhöhle, sondern auch an anderen Stellen) </li>
							<li>Entwicklungsstörungen</li>
						</ul>
					</br>
					<h3> Entzündungsanfälligkeit, Immunsystem</h3>
						<ul>
							<li>Erhöhte Infektanfälligkeit, häufiger krank</li>
							<li>Erhöhte Entzündungsanfälligkeit, entzündliche Stellen/Bereiche</li>
							<li>Halsschmerzen, Heiserkeit, grippeähnliche Gefühle ohne Ausbruch, Gliederschmerzen</li>
							<li>Nebenhöhlenentzündungen</li>
							<li>Lymphknoten permanent geschwollen oder schmerzend</li>
							<li>Mandelentzündung, Wucherung der Rachenmandeln, evtl. operative Mandelentfernung</li>
							<li>Bindegewebsentzündung: Gewebestellen unter der Haut mit Entzündungsschmerz oder Druckempfindlichkeit</li>
							<li>Im Kopf schmerzhaftes Entzündungs-, Hitze- und Druckgefühl, chronische (nicht bakterielle) Entzündung des Gehirns</li>
							<li>Schmerzende/brennende Harnblase, Harndrang, häufiges Wasserlösen (ähnlich wie bei bakterieller Blasenentzündung), Chronische Blasenentzündung</li>
							<li>Augenbrennen, Augenbindehautentzündung, gerötete kratzende Augen, tränende Augen</li>
							<li>Schleiersehen, getrübter Blick</li>
							<li>Entzündliche rheumatische Erkrankungen, Gelenkrheuma (z.B. Fingergelenkrheuma)</li>
							<li>Weichteilrheuma: z.B. Sehnen- oder Gelenkprobleme, Rückenschmerzen: Rückenmuskulatur schmerzt ähnlich wie Zerrung/Muskelkater (Muskelrheuma, Muskelentzündungen)</li>
							<li>Zeitweise auftretende Zahnschmerzen, Zahnfleisch oder Weisheitszähne entzündet</li>
							<li>Lippenherpes, Fieberblasen oder herpesähnliche Symptome (z.B. nicht abheilende Hautrisse in den Mundwinkeln)</li>
						</ul>
					</br>
					</br>
					</br>
					<h2>Anmerkung zu Migränepatienten und Histaminintoleranz</h2>
					Bei vielen Migränepatienten ist eine reduzierte DAO-Aktivität nachweisbar und die Betroffenen berichten über eine Triggerung der Kopfschmerzen durch histaminreiche Nahrung, wie Wein oder lang gereiften Käse, und eine Besserung bis hin zur Symptomfreiheit unter einer histaminarmen Diät.</br>
					In der Schwangerschaft, die mit einer hohen plazentaren DAO-Produktion einhergeht, kann bei einigen Frauen mit nahrungsmittelabhängigen Kopfschmerzen eine Besserung beobachtet werden.</br>
				</div>
						
			</div>   <!-- ENDE MAINTEXT -->	
		</div>  <!-- ENDE MAINTEXT -->
	</div> <!-- ENDE "belowtopnav" -->
			
</div> 
</body>
</html>