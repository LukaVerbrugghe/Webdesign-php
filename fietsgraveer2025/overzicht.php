<?php 
include("cnnFietsgraveer.php");
include("algemeen.php");

$qryoverzicht = $db->query("SELECT * FROM tblregistratie INNER JOIN tblplaatsen ON tblregistratie.plaats = tblplaatsen.graveerID ORDER BY fnaam,voornaam");

while($rowoverzicht=$qryoverzicht->fetch_assoc()){
    $fnaam = $rowoverzicht['fnaam'];
    $vnaam = $rowoverzicht['voornaam'];
    $gemeente = $rowoverzicht['gemeente'];
    $locatie = $rowoverzicht['locatie'];

    $lijst .= "<tr class='onpaar'><td>$fnaam</td><td>$vnaam</td><td>$gemeente</td><td>$locatie</td></tr>";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Brugge - Fietsstad</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/ddv.css" rel="stylesheet">    
<style type="text/css">
		
</style>
</head>
<body>
    <?php include("inc_nav.php");?>
<div class="container ddvnopad">
        <?php include("inc_banner.php");?>
</div>
    <div class="container">
 <div class="row">
   	   <div class="col-md-9">
   	   <h1>Overzicht fietsgraveeractie voorjaar 2025</h1>
<p>U kunt op &eacute;&eacute;n van volgende locaties terecht voor het graveren van je fiets. Vergeet je niet op voorhand in te schrijven. Kies daarvoor het menu <strong>Registreer</strong>.</p> 
<table id ="prodlijst" class="table">	
<tr class='onpaar'><td><strong>Naam</strong></td><td><strong>Voornaam</strong></td><td><strong>Plaats</strong></td><td><strong>Locatie</strong></td></tr>
<?= $lijst;?>
</table>
           </div>
           <div class="col-md-3">
    <h2>Brugge - fietsende stad</h2>
   <?php include("inc_aside.php");?>
  </div>
</div>
<div class="row footerback">
	<?php include("inc_footer.php");?>
</div>  

	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
