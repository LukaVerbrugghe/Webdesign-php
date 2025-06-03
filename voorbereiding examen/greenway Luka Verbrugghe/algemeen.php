<?php
session_start();

/*code voor taalkeuze - Opdracht 1*/
if(isset($_POST['cboTaal'])){
    //er is een taal gekozen
    $_SESSION['taal'] = $_POST['cboTaal'];
}
if(!isset($_SESSION['taal'])){
    //geen taal gekozen --> nl
    $_SESSION['taal'] = "nl";
}







?>