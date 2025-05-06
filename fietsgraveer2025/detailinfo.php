<?php
include("cnnfietsgraveer.php");
include("algemeen.php");
$plaatsen = ""; //is eigenlijk niet nodig maar anders krijg je een waarschuwing
// Lijst plaatsen aan de linkerkant van de pagina
$qryplaatsen = $db->query("SELECT * FROM tblplaatsen ORDER BY gemeente");
while($rowplaatsen = $qryplaatsen->fetch_assoc()){
  $gemeente = $rowplaatsen['gemeente'];
  $locatie = $rowplaatsen['locatie'];
  $id = $rowplaatsen['graveerID'];

  $plaatsen .= "<tr><td>$gemeente</td><td>$locatie</td><td><a href=?id=$id><img src='images/picto_detail.jpg'></a></td></tr>\n"; #let eens op de parameter die wordt meegegeven
}


// detailinfo ophalen
if(!empty($_GET['id'])){
  $gekozenid = $_GET['id'];

  $qrydetailplaatsen = $db->query("SELECT * FROM tblplaatsen WHERE graveerID=$gekozenid");
  $rowdetailplaatsen = $qrydetailplaatsen->fetch_assoc();

  $gemeente = $rowdetailplaatsen['gemeente'];
  $locatie = $rowdetailplaatsen['locatie'];
  $adres = $rowdetailplaatsen['adres'];
  $datum = $rowdetailplaatsen['datum'];
  $uur = $rowdetailplaatsen['uur'];

  $details = "<p><strong>Detailinfo $gemeente</strong></p>
	<table class='table'>
  <tr >
  <td width ='100' class='onderrand'>Gemeente</td>
  <td width ='200' class='onderrand'>$gemeente</td>
  </tr>
  <tr>
  <td class='onderrand'>Locatie</td>
    <td class='onderrand'>$locatie</td>
    </tr>
    <tr>
    <td class='onderrand'>Adres</td>
    <td class='onderrand'>$adres</td>
    </tr>
  <tr>
  <td class='onderrand'>Datum</td>
  <td class='onderrand'>$datum</td>
  </tr>
  <tr>
  <td class='onderrand'>Uur</td>
  <td class='onderrand'>$uur</td>
  </tr>
  </table>";
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
 <div class="col-md-12">   	   
 <h1>Overzicht en detailinformatie waar u terecht kunt. </h1>    
 <p>U kunt op &eacute;&eacute;n van volgende locaties terecht voor het graveren van je fiets. Klik op <img src='images/picto_detail.jpg'> voor detailinformatie. </p>    
</div>
</div>
<div class="row">
<div class="col-md-5">
<table class='table'>
<tr class='onpaar'><td><strong>Gemeente</strong></td><td><strong>Locatie</strong></td><td>&nbsp;</td></tr>
<?php
  echo $plaatsen;
?>
</table>
</div>	
<div class="col-md-4">

<?php
  echo $details;
?>

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
