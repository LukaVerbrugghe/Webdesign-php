<?php
include("cnnConnection.php");
include("algemeen.php");

//jarige klanten ophalen
$sqljarig = "SELECT Familienaam, Voornaam, Geboortedatum FROM tblklanten";
$qryjarig = $db->query($sqljarig);

while($rowjarig = $qryjarig->fetch_assoc()){
    $Geboortedatum = strtotime($rowjarig['Geboortedatum']);
    if(date('d',$Geboortedatum == date('d')) and date('m', $Geboortedatum) == date("m")){
        //gebruiker is jarig
        $vnaam = $rowjarig['Voornaam'];
        $fnaam = $rowjarig["Familienaam"];
        $leeftijd = date("Y") - date("Y", $Geboortedatum);
        $output .= "<tr><td class='horlijn'>$vnaam $fnaam</td><td class='horlijn>$leeftijd jaar</td></tr>\n";
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Zalando</title>
<link href="opmaak.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
	<div id="banner"><?php include("banner.php");?></div>
    <div id="login">
    <?php include("login.php");?>
    </div>
    <div id="menu"><?php include("menu.php");?></div>
    <div id="content">
<table>
<tr><td class='horlijn'></td><td class='horlijn'></td></tr>
<?php
echo $output;
?></table>
<p>Er zijn geen jarige klanten vandaag!</p>   
	</div>
    <footer><?php include("footer.php");?></footer>
</div>
</body>
</html>