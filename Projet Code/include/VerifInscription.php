<?php

$BDD = connexionBDD();

if(isset($cas)){
    $verifMDP = connecter($_POST['Mail'],$_REQUEST['MDP'], $BDD);
    if($verifMDP[0] != false){
        if(($_POST['Ville'] !="") && ($_POST['Pays'] !="") && ($_POST['Rue'] !="") && ($_POST['numero_porte'] !="") && ($_POST['Code_Postal'] !="")){
            $testAdresse = testAdresse($_SESSION['numClient'], $BDD);
            if($testAdresse){
                $MajAdresseCompte = MajAdresseCompte($_POST['Ville'], $_POST['Pays'], $_POST['Rue'], $_POST['numero_porte'], $_POST['Code_Postal'], $_SESSION['numClient'], $BDD);
                $MajInfosCompte = MajInfosCompte($_POST['Nom'], $_POST['Telephone'], $_POST['Prenom'], $_POST['etatCivil'], $_POST['Mail'], $_POST['MDP'], $_SESSION['numClient'], $BDD);
                 header('Location: index.php?nav=InfosPerso');
            } else{
                $AjoutAdresse = AjoutAdresse($_POST['Ville'], $_POST['Pays'], $_POST['Rue'], $_POST['numero_porte'], $_POST['Code_Postal'], $_SESSION['numClient'], $BDD);
                $MajInfosCompte = MajInfosCompte($_POST['Nom'], $_POST['Telephone'], $_POST['Prenom'], $_POST['etatCivil'], $_POST['Mail'], $_POST['MDP'], $_SESSION['numClient'], $BDD);
                header('Location: index.php?nav=InfosPerso');
            }
        } else {
            $MajInfosCompte = MajInfosCompte($_POST['Nom'], $_POST['Telephone'], $_POST['Prenom'], $_POST['etatCivil'], $_POST['Mail'], $_POST['MDP'], $_SESSION['numClient'], $BDD);
            header('Location: index.php?nav=InfosPerso');
        }
    } else {
        header('Location: index.php?nav=InfosPerso&amp;cas=MdpFaux');

    }
} else {
    $verifExist = VerifInscrire($_POST['Mail'],$BDD);

    if($verifExist[0] != false){
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
}
?>