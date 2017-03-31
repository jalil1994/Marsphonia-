<?php

$BDD = connexionBDD();

    if($_SESSION['numClient'] == 4){

        $nom=$_POST['Nom'];
        $verifExistTel = verifExistTel($nom,$BDD); 
        
        if(!$verifExistTel){
            $quantite=$_POST['Stock'];
            $fonction=$_POST['Fonctions'];
            $prix=$_POST['Prix'];
            $marque=$_POST['Marque'];
            $couleur=$_POST['Couleur'];
            $ecran=$_POST['Ecran'];
            $date=$_POST['DateSortie'];
            $photo=$_POST['photoTel'];
            
            $editionLimite=$_POST['editionLimite']; 
            if($editionLimite == 'Oui'){
                $nbeditionLimite=$_POST['nbeditionLimite'];           
                $ModifierTel = ModifierTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $nbeditionLimite, $date, $photo, $BDD);
            } else{
                $editionLimite = 0;
                $ModifierTel = ModifierTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $photo, $BDD);
            }
        } else{
            echo '<script>';
            echo 'alert("Il existe deja un produit du meme nom !")';
            echo '</script>';
            
            }        



        
        
        
        
    }else{
            echo " Vous n'etes pas habilité a modifier un smartphone."   ; 
    }
            

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