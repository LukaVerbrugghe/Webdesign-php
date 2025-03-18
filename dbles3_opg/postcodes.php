<?php
    include("cnndbles3.php");
    // we maken een lijstje met de postcodes, gemeentes en deelgemeentes
    $sql = "SELECT postcode, gemeente, deelgemeente FROM tblpostcodes ORDER BY gemeente";
    // dataset
    $result = $db->query($sql) or die("ophalen data mislukt!");
    $i = 1;
    $j = 1;
    while($row = $result->fetch_assoc()){
        $postcode = $row["postcode"];
        $gemeente = $row["gemeente"];
        $deelgemeente = $row["deelgemeente"];
        if($j % 11 != 0){

            if($postcode < 9000 && $postcode >= 8000){
                $output .= "<tr class='WVL'><td>$i</td><td>$postcode</td><td>$gemeente</td><td>$deelgemeente</td></tr>\n";
            }
            else{
                $output .= "<tr><td>$i</td><td>$postcode</td><td>$gemeente</td><td>$deelgemeente</td></tr>\n";
            }   
            $i++;
            $j++;
        }
        else{
            $output .= "<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>\n";
            $j++;
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
    .WVL{
        color: red;
        font-weight: bold;
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
    form {border: #003366 1px solid;
background-color: #CCCCCC;
width: 100%;
padding: 5px;}
.binnentabel {
background-color: #FFFF99;
padding: 5px;
}
	.prijs {
text-align: right;
	padding-right: 12em;
    }
</style>
</head>

<body>
<div id="wrapper">
	<header><img src="images/banner2.jpg" width="100%"  alt=""/></header>
	<main>
    <form action="" name="frmInfo" method="post">
<table>
<tr><td>Voornaam</td><td><input name="txtVoornaam" type="text"  /></td></tr>
<tr><td>Leeftijd</td><td><input name="txtLeeftijd" type="number"  /></td></tr>
<tr><td>Keuze</td><td>
<select name="cboKeuze">
<option value="1">Keuze 1</option>    
<option value="2">Keuze 2</option>    
<option value="3">Keuze 3</option>        
</select>
    </td></tr>    
<tr><td>&nbsp;</td><td><input type="submit" name="btnVersturen" value="Verstuur" /></td></tr>    
    </table>
    <td></td>
</form>
    <table>
        <tr><td>Nummer</td><td>Postcode</td><td>Gemeente</td><td>Deelgemeente</td></tr>
        <?= $output;?>
    </table>
    </main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>