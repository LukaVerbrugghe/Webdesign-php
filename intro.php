<?php
	$leerlingen = array("Lobke"=>"Oostkamp", "Simon"=>"Oostkamp", "Emma" => "Brugge", "Alexander"=>"Beernem");
	$show = "form";
	// ophalen waarden uit verstuurde formulier
	if(isset($_POST['cboLeerlingen']))
	{
		$gekozenLeerling = $_POST['cboLeerlingen'];
		$gekozenGemeente = $leerlingen[$gekozenLeerling];
		$output = "<p>$gekozenLeerling woont in $gekozenGemeente</p>";
		$show = "resultaat"; //of leeg of phillipe of wat dan ook, gwn niet form
	}

	// opbouw keuzelijst
	foreach ($leerlingen as $leerling => $gemeente) {
		$combo .= "<option";
		if($leerling == $gekozenLeerling){
			$combo .= " selected";
		}
		$combo .= ">$leerling</option>\n";
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