<?php

/**
 * Détruit la session active
 */
function deconnecter(){
	
	$BDD = connexionBDD();
	$PanierClient = VerifExistePanierClient($_SESSION['numClient'], $BDD);
	detruirePanier($PanierClient[0], $_SESSION['numClient'],$BDD);
	session_destroy();
}


?>