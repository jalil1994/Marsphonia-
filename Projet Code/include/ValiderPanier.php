<?php

$BDD = connexionBDD();

$infosTel = $_SESSION['infosTel'];
$totalCommande = $infosTel[12] - ($PointsUtiliser/10);
$PointsGagner= ($infosTel[12]/10);
$points = $PointsGagner - $PointsUtiliser;
$MajPointsClient = MajPointsClient($points, $_SESSION['numClient'], $BDD );

$PanierClient = VerifExistePanierClient($_SESSION['numClient'], $BDD);
$date = date("Y-m-d");

$AjoutCommande = AjoutCommande($_SESSION['numClient'], $totalCommande, $date,$PanierClient[0],  $BDD);
$MajFacture = MajFacture( $AjoutCommande[1], $BDD);

