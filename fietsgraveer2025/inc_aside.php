<form name="frmLogin" id="frmLogin" method="post">
<?php
    if($_SESSION['login']!="ingelogd"){

        ?>
<h4>Log hier op de website in</h4>
<input type="text" name="txtVnaam" placeholder="Typ je voornaam in" class='inputsmall'>
<input type="text" name="txtFnaam" placeholder="Typ je familienaam in" class='inputsmall'>
<input type="password" name="txtWW" placeholder="Typ je wachtwoord in" class='inputsmall'>
<p><input type="submit" name="btnLogin" value="Login"></p>
<?php
}
else{
?>
<input type="submit" name="btnLogout" value="Logout <?php echo $_SESSION['vnaam']." ".$_SESSION['fnaam'];?>">	
 <?php
 }?>
<p class='alert'><?= $loginfout;?></p>
</form>

<img src='images/fietsster.jpg' class='img-fluid'>