<?php
include("cnnConnectie.php");
include("algemeen.php");
//keuzelijst
$catsql = "SELECT * FROM tblcategorie ORDER BY catomschrijving";
$qrycat = $db->query($catsql);
while($rowcat = $qrycat->fetch_assoc()){
    $id = $rowcat['catID'];
    $omschrijving = $rowcat['catomschrijving'];
    $catkeuzeoutput .= "<option value='$id'>$omschrijving</option>\n";
}

//inladen van gekozen items
if(isset($_POST['cboCategorie'])){
    $gekozenID = $_POST['cboCategorie'];
    $sqlgekozenCat = "SELECT * FROM tblproducten WHERE productgroep = '$gekozenID'";
    $qrygekozencat = $db->query($sqlgekozenCat);
    while($rowgekozencat = $qrygekozencat->fetch_assoc()){
        $artnr = $rowgekozencat['artnr'];
        $product = $rowgekozencat['product'];
        $gekozenCatOutput .= "<tr><td><img src='images/picto_info1.jpg'></td><td>$product</td></tr>\n";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Greenway - meet the new meat!</title>

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
   	   <div class="col-md-8">
   	   <h1>Productlijst</h1>
   	   <form name="frmCategorie" method="post">
   	   <p><select name="cboCategorie">
   	   <option value="0">Kies een categorie</option>
       <?= $catkeuzeoutput; ?>
       </select>
       </p>
       </form>
           
<table id ="prodlijst" class='table table-hover' >	   
<?= $gekozenCatOutput; ?>
</table>
   
		   </div>
        <div class="col-md-4">
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
