<?php
if($_SESSION['taal']=="nl"){
  $navoutput = "<option value='0'>Kies je taal</option>\n<option value='nl' selected>Nederlands</option>\n<option value='fr'>Frans</option>\n";
}
elseif($_SESSION['taal'] =="fr"){
  $navoutput = "<option value='0'>Kies je taal</option>\n<option value='nl'>Nederlands</option>\n<option value='fr' selected>Frans</option>\n";
}
else{
  $navoutput = "<option value='0'>Kies je taal</option>\n<option value='nl'>Nederlands</option>\n<option value='fr'>Frans</option>\n";

}
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Greenway - Meet the new meat! ***   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hoofdmenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="hoofdmenu">
    <ul class="navbar-nav mr-auto">
    <li class='nav-item active'><a class='nav-link' href='index.php'>Home<span class='sr-only'>(current)</span></a></li>
<li class='nav-item active'><a class='nav-link' href='festivals.php'>Festivals<span class='sr-only'>(current)</span></a></li>
<li class='nav-item active'><a class='nav-link' href='productlijst.php'>Productlijst<span class='sr-only'>(current)</span></a></li>
<li class='nav-item active'><a class='nav-link' href='prijsaanpassing.php'>Prijsaanpassing<span class='sr-only'>(current)</span></a></li>
  </ul>
  
<div id='rechts'>
<form name='frmTaal' method='post'>
<select name='cboTaal' onchange='document.frmTaal.submit()'>
<?php
echo $navoutput;
?>
</select>
</form>
  </div>
  </div>
</nav>