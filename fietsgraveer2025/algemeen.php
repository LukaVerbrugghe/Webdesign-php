<?php
session_start();

// in- en uitloggen
// uitloggen
if(isset($_POST['btnLogout'])){
    $_SESSION['login'] = "";
    $_SESSION['vnaam'] = "";
    $_SESSION['fnaam'] = "";
    $_SESSION['regid'] = "";
}

// inloggen
if($_POST['btnLogin']=="Login"){ //mag ook isset zijn
    $vnaam = $_POST['txtVnaam'];
    $fnaam = $_POST['txtFnaam'];
    $ww = $_POST['txtWW'];
    $sqllogin = "SELECT * FROM tblregistratie WHERE voornaam='$vnaam' AND fnaam='$fnaam'";

    $resultlogin = $db->query($sqllogin);
    $rowlogin = $resultlogin->fetch_assoc();
    if($resultlogin->num_rows==0){
        // er zijn geen gebruikers met deze voor- en achternaam
        $loginfout = "Gebruiker onbekend";
    }
    else{
        // de gebruiker bestaat --> wachtwoord controleren
        if($rowlogin['wachtwoord']==$ww){
            //het wachtwoord is correct en de gebruiker mag ingelogd worden
            $loginfout = "Gebruiker wordt ingelogd";
            $_SESSION['login'] = "ingelogd";
            $_SESSION['vnaam'] = "$vnaam";
            $_SESSION['fnaam'] = "$fnaam";
            $_SESSION['regid'] = $rowlogin['registratieID'];
        }
        else{
            //het wachtwoord is niet correct
            $loginfout = "Wachtwoord onjuist";
        }
    }
}

?>
