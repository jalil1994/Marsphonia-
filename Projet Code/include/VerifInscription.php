<?php

$BDD = connexionBDD();

$verifExist = VerifInscrire($_POST['Mail'],$BDD);

if($verifExist != false){
    header('Location: index.php?nav=InscriptionFailed');
} else {
    $inscription = inscrire($_POST['Nom'],$_POST['Telephone'], $_POST['Prenom'],$_POST['etatCivil'],$_POST['Mail'],$_POST['MDP'],$BDD);
    
    
    $connexion = connecter($_POST['Mail'],$_REQUEST['MDP'], $BDD);
    if($connexion != false){
        $_SESSION['numClient'] = $connexion['numClient'];
        header('Location: index.php?nav=ClientConnecter');  
    }else{
        //?
        header('Location: index.php?nav=ConnexionFailed');
    }
}
?>