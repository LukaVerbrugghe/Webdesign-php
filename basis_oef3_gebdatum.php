<?php
  //php code
  $maanden = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"];

  $naam = $_POST['txtNaam'];
  $geboortedag = $_POST['dagDropdown'];
  $geboortemaand = $_POST['maandDropdown'];
  $geboortejaar = $_POST['jaarDropdown'];


  $maandNummer = array_search($geboortemaand, $maanden) + 1;
  if($geboortedag<10){
    $geboortedagTweeNummers = "0".$geboortedag;
  }
  if($maandNummer<10){
    $maandNummer = "0".$maandNummer;
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
    <form action="" method="post" name="frmgebdat">
<table width="100%"  border="0">
  <tr>
    <td width="30%">Mijn naam</td>
    <td><input name="txtNaam" type="text" /></td>
  </tr>
  <tr>
    <td width="30%">Mijn geboortedatum</td>
    <td><table border="0">
  <tr>
    <td>Dag</td>
    <td>Maand</td>
    <td>Jaar</td>
  </tr>
  <tr>
    <td>
      <!-- Dag -->
       <select name="dagDropdown">
        <?php
        for($i = 1; $i<=31; $i++){
          echo "<option>$i</option>";
        }
        ?>
       </select>
    </td>
    <td>
      <select name="maandDropdown">
        <?php
          foreach ($maanden as $maand) {
              echo "<option>$maand</option>";
          }
        ?>
      </select>
    </td>
    <td>
      <select name="jaarDropdown">
        <?php
          for($i = 1950; $i<=2025; $i++){
            echo "<option>$i</option>";
          }
        ?>
      </select>
    </td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td width="30%"></td>
    <td><input type="submit" name="btnResultaat" value="Resultaat" /></td>
  </tr>
</table>



</form>

<?php
  echo "<p>$naam is geboren op $geboortedag $geboortemaand $geboortejaar.</p>";
  echo "<p>Notatie NBN: $geboortejaar-$maandNummer-$geboortedagTweeNummers</p>"
?>
    
    </main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>