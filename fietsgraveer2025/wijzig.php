<?php
include("cnnfietsgraveer.php");
include("algemeen.php");

// wijzigingen toepassen in db
if(isset($_POST['btnWijzig'])){
  $id = $_POST['cboPersoon'];
  $fnaam = $_POST['txtFamilienaam'];
  $vnaam = $_POST['txtVoornaam'];
  $telefoon = $_POST['txtTelefoon'];
  $email = $_POST['txtEmail'];
  $ipadres = $_SERVER['REMOTE_ADDR'];
  $tijdreg = date("Y-m-d");

  $db->query("UPDATE tblregistratie SET fnaam='$fnaam',voornaam='$vnaam',telefoon='$telefoon',email='$email',ipadres='$ipadres',tijdreg='$tijdreg' WHERE registratieID=$id");
  $bericht = "$vnaam $fnaam gegevens gewijzigd op $tijdreg via $ipadres.";
}

// ophalen van gekozen gegevens
if(isset($_POST['cboPersoon'])){
  $gekozenID = $_POST['cboPersoon'];

  $qryoptehalengegevens = $db->query("SELECT fnaam,voornaam,telefoon,email FROM tblregistratie WHERE registratieID=$gekozenID");

  $arpersoon = $qryoptehalengegevens->fetch_assoc();
}

// keuzelijst personen
$qrykeuzelijstpersonen = $db->query("SELECT fnaam,voornaam,registratieID FROM tblregistratie ORDER BY fnaam,voornaam");

while($rowkeuzelijstpersonen=$qrykeuzelijstpersonen->fetch_assoc()){
  $fnaam = $rowkeuzelijstpersonen['fnaam'];
  $vnaam = $rowkeuzelijstpersonen['voornaam'];
  $ID = $rowkeuzelijstpersonen['registratieID'];

  
  $combopersonen .= "<option value='$ID'";
  if($ID == $gekozenID && isset($_POST['cboPersoon'])){
    $combopersonen .= " selected";
  }
  $combopersonen .= ">$fnaam $vnaam</option>\n";
}

// keuzelijst graveerplaatsen
$qrygraveerplaatsen = $db->query("SELECT graveerID,gemeente FROM tblplaatsen ORDER BY gemeente");
while($rowgraveerplaatsen=$qrygraveerplaatsen->fetch_assoc()){
  $ID = $rowgraveerplaatsen['graveerID'];
  $gemeente = $rowgraveerplaatsen['gemeente'];
  
  $combograveerplaatsen .= "<option value='$ID'";
  $combograveerplaatsen .= ">$gemeente</option>\n";
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
   	   <h1>Gegevens van geregistreerde personen wijzigen </h1>

<form id="form1" name="frmPersoon" method="post" action="">
  <p>Kies een persoon: 
    <select name="cboPersoon" onchange="document.frmPersoon.submit()">
      <option value="0">Maak je keuze!</option>
   <?= $combopersonen; ?>
      </select>
  </p>
 <?php
 if(isset($_POST['cboPersoon'])){
?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="120">Familienaam</td>
      <td><input name="txtFamilienaam" type="text" id="txtFamilienaam" value="<?= $arpersoon['fnaam'];?>"/></td>
    </tr>
    <tr>
      <td>Voornaam</td>
      <td><input name="txtVoornaam" type="text" id="txtVoornaam" value="<?= $arpersoon['voornaam'];?>"/></td>
    </tr>
    <tr>
      <td>Telefoon</td>
      <td><input name="txtTelefoon" type="text" id="txtTelefoon" value="<?= $arpersoon['telefoon'];?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="txtEmail" type="text" id="txtEmail" size="40" value="<?= $arpersoon['email'];?>"/></td>
    </tr>
    <tr>
      <td>Plaats</td>
      <td>
        <select name="cboPlaats" id="cboPlaats">
          <option value="0">Maak je keuze!</option>
          <?= $combograveerplaatsen; ?>
        </select>
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
      <input name="btnWijzig" type="submit" value="Wijzigingen registreren" /></td>
      
    </tr>
    
    <tr>
      <td colspan="2"><?= $bericht; ?></td>
      
    </tr>
  </table>
<?php } ?>
</form>
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
