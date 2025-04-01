<?php
include("cnndbles3.php");
// punten ophalen
// wrm boven keuzelijst? --> id van gekozen kandidaat nodig om te weten welke kandidaat in de keuzelijst behouden moet blijven
// niet wnr we de pagina voor de eerste keer laden
if (isset($_POST['cboKandidaat'])){
  $bonus = 0;
  $tekort = 0;
  $gekozenland = $_POST['cboKandidaat'];
  
  $sql = "SELECT * FROM tblrazresults WHERE exkand=$gekozenland";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();

  for ($i=1; $i < 8; $i++) { 
    // valt niet zo veel over te zeggen volgens meneer (de lus he)
    // h1 h2 h3 h4 h5 h6 h7, maar 'efficient'
    ${h$i} = $row['h'.$i];

    // tekortpunten berekenen
    if(${'h'.$i}<50){
      $minpunten+= (50 - ${'h'.$i});
    }
    $totaal += ${'h'.$i};
  }
  $score = $totaal/7;

  if($score>=50){
    $bonus = floor($score/10);
  }
  if($minpunten>$bonus){
    $resultaat = "niet geslaagd";
  }
  else{
    $resultaat = "geslaagd"
  }
}


// invullen van de keuzelijst
$sqlcombo = "SELECT * FROM tblrazkandidaten ORDER BY fnaam,voornaam";
$resultcombo = $db->query($sqlcombo);
while($rowcombo = $resultcombo->fetch_assoc()){
  $id = $rowcombo['idkand'];
  $vnaam = $rowcombo['voornaam'];
  $fnaam = $rowcombo['fnaam'];

  $combo .="<option value='$id'>$fnaam $vnaam</option>\n";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Redder aan Zee</title>
<style type="text/css">
	body {
	color: #0A0A55;		
    font-family: Arial, sans-serif; 
    font-size: 1.2em;
	}
	#wrapper {
  width: 1180px;
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
    .rand,select,  { border: solid 1px #990000;}
    select {font-size: 1.3em;}
    #scores td  { border: solid 1px #990000;
  padding: 2px;
  margin: 5px;
  }
  .pos {text-align: center;
  font-size: 20pt;
  font-weight:600;
  }
  .neg {text-align: center;
  font-size: 20pt;
  font-weight:600;
  color: #FFFFFF;
  background-color: #FF0000;
  }
  .ruimte {
  height: 3px;
  background-color: #FFFFFF;
  }
</style>
</head>

<body>
<div id="wrapper">
	<header><img src="images/banner.jpg" width="100%"  alt=""/></header>
	<main>
    <table width= "80%" border="0" align="center" cellpadding="0" cellspacing="0" class="rand">
  <tr>
    <td><form id="form1" name="frmNaamlijst" method="post" action="">
  <select name="cboKandidaat" onchange="document.frmNaamLijst.submit()">
    <option value='0'>Kies een kandidaat</option>
    <?= $combo;?>
</form></td>
  </tr>
  

 
      <tr><td>&nbsp;</td></tr>
    <tr>
    <td><table id="scores" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>

      </tr>
    
      <tr>
        <td>Scores</td>
     </tr>
    </table></td>
  </tr>
  <tr><td class="ruimte"></td></tr>
 <tr><td class='$opmaak'>OORDEEL</td></tr>
	
</table>
    
    </main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>