<ul>
<?php
$sqlmenu = "SELECT * FROM tblmenu ORDER BY volgorde";
$qrymenu = $db->query($sqlmenu);

$output = ""; //niet vereist, maar onderdrukt warning

while($rowmenu = $qrymenu->fetch_assoc()){
    $ID = $rowmenu['menuID'];
    $menutekst = $rowmenu['menutekst'];
    $menulink = $rowmenu['menulink'];

    $output .= "<li><a href='$menulink'>$menutekst</a></li>";
}
echo $output;
?>
</ul>