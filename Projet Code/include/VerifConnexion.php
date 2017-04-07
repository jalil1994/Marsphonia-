<?php

//require("include/fct.inc.php");
//require("include/bdd.inc.php");
$BDD = connexionBDD();
$connexion = connecter($_POST['Mail'],$_REQUEST['MDP'], $BDD);


if($connexion == false){
      header('Location: index.php?nav=ConnexionFailed');
}else {
    $_SESSION['numClient'] = $connexion['numClient'];
    header('Location: index.php?nav=ClientConnecter');
}
?>