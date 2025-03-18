<?php
	//getal uit de textbox halen
	$gekozenGetal = $_POST['txtGetal'];

	//alle delers van het getal vinden
	//forloop
	$delers = array();
	for ($i = 1; $i <= $gekozenGetal; $i++) {
		if ($gekozenGetal % $i == 0) {
			$delers[] = $i;
		}
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
    form {
border: solid 1px #660066;
background-color: #3CF;	
font-family: Verdana, Geneva, sans-serif;
font-size: 1.2em;
margin-bottom: 2em;
width: 100%;
}
form input {
color: #C00;	
font-size: 1.2em;
}

strong {
font-weight: 900;
color: #C00;
font-size: 1.3em;	
}
</style>
</head>

<body>
<div id="wrapper">
	<header><img src="images/banner.jpg" width="100%"  alt=""/></header>
	<main>
    <form action="" method="post">
<p><input name="txtGetal" type="number" size="2" /> is deelbaar door... 
</p>
<p><input type="submit" name="btnResultaat" value="Toon resultaat" /></p>
</form>
    <!-- Alle delers toevoegen -->
    <?php
	foreach ($delers as $deelbaarDoor) {
		echo "<p>$gekozenGetal is deelbaar door $deelbaarDoor</p>";
	}
	?>
    </main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>