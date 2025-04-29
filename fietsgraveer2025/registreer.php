<?php
include("cnnfietsgraveer.php");
include("algemeen.php");

//registratie en bevestiging
if(isset($_POST['btnRegistreer'])){
  // data uit het forumulier ophalen
  $fnaam = addslashes($_POST['txtFamilienaam']); //de functie addslashes zorgt ervoor dat bv d'hont geen errors geeft
  $vnaam = addslashes($_POST['txtVoornaam']);
  $telefoon = $_POST['txtTelefoon'];
  $email = $_POST['txtEmail'];
  $gekozenplaats = $_POST['optPlaats']; //nog vragen
  $ipadres = $_SERVER['REMOTE_ADDR']; //dit wordt gebruikt om het ip adres op te halen

  // wachtwoord genereren
  $wwtekens = array(
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '}', '[', ']', '|', '\\', ':', ';', '"', "'", '<', '>', ',', '.', '?', '/', '~', '`'
); //deze lijst bevat geen o, want dat lijkt op een 0 (eigenlijk moeten de cijfers en hoofdletters hier ook bij, maar dat is nogal veel werk)
  $getal = $wwtekens[mt_rand(0,10)];

  // !!! Wachtwoord genereren is nog niet klaar !!!

  // gegevens toevoegen aan databaank
  $sql = "INSERT INTO tblregistratie (fnaam,voornaam,telefoon,email,plaats,ipadres) VALUES ('$fnaam','$vnaam','$telefoon','$email',$gekozenplaats,'$ipadres')";

  $db->query($sql);


  // bevestiging registratie
  $bevestinging = "De volgende gegevnes werden geregistreerd:<br>";
  $bevestinging .= "Naam: <strong>$vnaam $fnaam</strong>";
  $bevestinging .= "Telefoon: <strong>$telefoon</strong>";
  $bevestinging .= "Email: <strong>$email</strong>";

  $sqlgekozenplaats = "SELECT * FROM tblplaatsen WHERE graveerID=$gekozenplaats"; //we zitten $gekozenplaats niet tussen quotes omdat het veld numeriek is
  $resultgekozenplaats = $db->query($sqlgekozenplaats);
  
  $rowgekozenplaats = $resultgekozenplaats->fetch_assoc();
  $gekozengemeente = $rowgekozenplaats['gemeente'];
  $gekozenlocatie = $rowgekozenplaats['locatie'];
  $gekozenadres = $rowgekozenplaats['adres'];
  $bevestinging .= "Locatie: <strong>$locatie $gekozengemeente: $gekozenadres</strong>";

  $nederlandseMaanden = [
    1 => 'januari',
    2 => 'februari',
    3 => 'maart',
    4 => 'april',
    5 => 'mei',
    6 => 'juni',
    7 => 'juli',
    8 => 'augustus',
    9 => 'september',
    10 => 'oktober',
    11 => 'november',
    12 => 'december'
];
}

// Ophalen van de verschillende graveerplaatsen
$sqlgraveerplaatsen = "SELECT graveerID,gemeente FROM tblplaatsen ORDER BY gemeente";
$resultgraveerplaatsen = $db->query($sqlgraveerplaatsen);
$graveerplaatsenoutput = "";

$teller = 1;
while($rowgraveerplaatsen = $resultgraveerplaatsen->fetch_assoc()){
  $graveerID = $rowgraveerplaatsen['graveerID'];
  $gemeente = $rowgraveerplaatsen['gemeente'];
  $graveerplaatsenoutput .= "<td><input type='radio' name='optPlaats' value='$graveerID'>$gemeente</td>\n";
  if($teller%5==0){
    $graveerplaatsenoutput .= "</tr>\n<tr>";
  }
  $teller++;
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
   	   <h1>Registreer je fietsgravure</h1>

<form id="form1" name="form1" method="post" action="">
  <fieldset><legend>Persoonlijke gegevens</legend>
    <table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Familienaam</td>
        <td><input name="txtFamilienaam" type="text" required /></td>
        <td>Voornaam</td>
        <td><input name="txtVoornaam" type="text" required  /></td>
        </tr>
      <tr>
        <td>Telefoon</td>
        <td><input name="txtTelefoon" type="text"   /></td>
        <td>E-mailadres</td>
        <td><input name="txtEmail" type="text"   /></td>
        </tr>
  </table>
    
  </fieldset><br />
  <fieldset><legend>Kies je graveerplaats</legend>
  <table width="800" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <!-- Hier komen de graveerplaatsen -->

       <?php
      echo $graveerplaatsenoutput;
      ?>
  </tr>
  </table>
  </fieldset>
<p class="bericht"></p>
  <input name="btnRegistreer"  type="submit" id="btnRegistreer" value="Registreer je fietsgravure" />
</form>
<p>&nbsp;</p>
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
