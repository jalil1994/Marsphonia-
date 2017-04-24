<?php


$BDD = connexionBDD();
$connexion = connecter($_POST['Mail'],$_REQUEST['MDP'], $BDD);


if($connexion[0] == false){
      header('Location: index.php?nav=ConnexionFailed');
}else {
    $_SESSION['numClient'] = $connexion['numClient'];
    header('Location: index.php?nav=ClientConnecter');
}
?>