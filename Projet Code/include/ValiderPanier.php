<?php

$BDD = connexionBDD();
if($PointsUtiliser != ""){
	$totalCommande = $infosTel[12] - ($PointsUtiliser);
} else {
	$totalCommande = $infosTel[12];
	$PointsUtiliser =0;
}
$PointsGagner= ($infosTel[12]/10);
$points = $PointsGagner - $PointsUtiliser;
$MajPointsClient = MajPointsClient($points, $_SESSION['numClient'], $BDD );

$PanierClient = VerifExistePanierClient($_SESSION['numClient'], $BDD);
$date = date("Y-m-d");

$AjoutCommande = AjoutCommande($_SESSION['numClient'], $totalCommande, $date,$PanierClient[0],  $BDD);

$detruirePanier = detruirePanier($PanierClient[0], $_SESSION['numClient'],$BDD);