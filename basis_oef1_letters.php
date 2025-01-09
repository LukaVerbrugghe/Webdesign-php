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
width: 50%;
}
form input {
font-size: 1.2em;
color: #C00;	
}
form td {
border-bottom: solid 1px #FFF;	
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
<table width="100%"  border="0">
  <tr>
    <td>Letter of teken</td>
    <td><input name="txtLetter" type="text" id="txtLetter" size="2" /></td>
  </tr>
  <tr>
    <td>in woord</td>
    <td><input name="txtWoord" type="text" id="txtWoord" maxlength="30" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnResultaat" id="btnResultaat" value="Resultaat" /></td>
  </tr>
</table>
</form>
    </main>
	<footer>&nbsp;</footer>
</div>
</body>
</html>