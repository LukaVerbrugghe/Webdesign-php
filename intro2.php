<?php
	$leerlingen = array("Lobke Bonte_6BI"=>"BonteLobke","Simon Declerck_6BI"=>"DeclerckSimon","Emma Devolder_6BI"=>"DevolderEmma","Alexander Dossche_6BI"=>"DosscheAlexander","Daan Hautekeete_6BI"=>"HautekeeteDaan","Aaron Injon_6BI"=>"InjonAaron","Pahul Malhi_6BI"=>"MalhiPahul","Tuur Mispelaere_6BI"=>"MispelaereTuur","Stan Tanghe_6BI"=>"TangheStan","Luka Verbrugghe_6BI"=>"VerbruggheLuka", "Milo Claessens Pillen_6AD"=>"ClaessensPillenMilo","Celestin De Marez_6AD"=>"DeMarezCelestin","Senna Devolder_6AD"=>"DevolderSenna","Gilles Longueville_6AD"=>"LonguevilleGilles","Hugo Popelier_6AD"=>"PopelierHugo","Joshua Radford_6AD"=>"RadfordJoshua","Arthur Roets_6AD"=>"RoetsArthur","Julian Stoops_6AD"=>"StoopsJulian","Maxim Van Belle_6AD"=>"VanBelleMaxim","Bouke Vandenbussche_6AD"=>"VandenbusscheBouke","Sem Van Eenoge_6AD"=>"VanEenogeSem");
	$show = "form";
	// ophalen waarden uit verstuurde formulier
	if(isset($_POST['cboLeerlingen']))
	{
		$gekozenLeerling = $_POST['cboLeerlingen'];

        $delenNaam = explode(" ", $gekozenLeerling);
        $voornaam = $delenNaam[0];
        $achternaamEnKlas = $delenNaam[1];
		$delenAchternaamEnKlas = explode("_", $achternaamEnKlas);
		$achternaam = $delenAchternaamEnKlas[0];
		$klas = $delenAchternaamEnKlas[1];
		$gekozenGebruikersnaam = $leerlingen[$gekozenLeerling];
		$output = "<p>U heeft $voornaam $achternaam uit $klas gekozen.</p>\n";
		$output .= "<img src='fotosSJZ/$achternaam$voornaam.JPG' class='c$klas'>";
		$show = "resultaat"; //of leeg of phillipe of wat dan ook, gwn niet form
	}

	// opbouw keuzelijst
	foreach ($leerlingen as $leerling => $gebruikersnaam) {
        $delenNaam = explode("_", $leerling);
		$combo .= "<option value='$leerling'";
		if($leerling == $gekozenLeerling){
			$combo .= " selected";
		}
		$combo .= ">$delenNaam[0]</option>\n";
	}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP basisoefeningen</title>
<style type="text/css">
	body {
	color: #0A0A55;		
	}
	#wrapper {
	width: 1080px;
	margin-left: auto;
	margin-right: auto;
	border: solid 1px #0070C0;
	padding: 0.3em;
	}	
	main {
	min-height: 20em;
	padding: 1em;
	}
	footer {
	height: 0.5em;
	background-color: #0070C0;
	}
	.c6BI{
		border: solid 5px blue;
	}
	.c6AD{
		border: solid 5px red;
	}
</style>
</head>

<body>
<div id="wrapper">
	<header><img src="images/banner.jpg" width="100%"  alt=""/></header>
	<main>
		<?php
			// echo "De eerste leerling in de lijst is $leerlingen[0]";
			// for($i=0; $i<count($leerlingen); $i++) {
			// 	echo "<p>$leerlingen[$i]</p>";
			// }
			// echo "<p>$leerlingen[Lobke]</p>";

			// foreach ($leerlingen as $leerling => $gemeente) {
			// 	echo "<p>$leerling: $gemeente</p>";
			// }
			if($show == "form"){

				?>
		<form name="frmWoonplaats" method="post">
			<p>
				<select name="cboLeerlingen" onchange="document.frmWoonplaats.submit()">
					<option>Kies een leerling</option>
					<?php
						echo $combo;
					?>
				</select>
			</p>
		</form>
		<?php
				}
				else{
					echo $output;
				}
		
		?>
	</main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>