<?php

$BDD = connexionBDD();

if( isset($_SESSION['numClient'])){
   $verifExist = VerifExistewishlistClient($_SESSION['numClient'], $BDD);
   
    if($verifExist == '0'){
    	$CreerwishlistClient = CreerwishlistClient($_SESSION['numClient'], $BDD);
    	$CreerLignewishlistClient = CreerLignewishlistClient($numTel,$_SESSION['numClient'], $BDD);
        header('Location: index.php?nav=Wishlist');
    } else {
    	$CreerLignewishlistClient = CreerLignewishlistClient($numTel,$_SESSION['numClient'], $BDD);
    	header('Location: index.php?nav=Wishlist');
    }   
}else{
    include('vues/v_Wishlist.php');
}


?>