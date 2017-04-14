<?php

$BDD = connexionBDD();

if( isset($_SESSION['numClient'])){
   $verifExist = VerifExistePanierClient($_SESSION['numClient'], $BDD);
   
    if($verifExist == 0){
        $CreerPanierClient = CreerPanierClient($_SESSION['numClient'], $BDD);
        $CreerLignePanierClient = CreerLignePanierClient($numTel,$_SESSION['numClient'], $BDD);
        header('Location: index.php?nav=Panier');
    } else {
       $CreerLignePanierClient = CreerLignePanierClient($numTel,$_SESSION['numClient'], $BDD);
        header('Location: index.php?nav=Panier');
    }   
}else{
    include('vues/v_Panier.php');
}


?>