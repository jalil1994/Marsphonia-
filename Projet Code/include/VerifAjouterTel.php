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
            
            if(isset($_POST['editionLimiteO']) ){
                $nbeditionLimite=$_POST['nbeditionLimite'];           
                $AjoutTel = AjoutTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $nbeditionLimite, $date, $BDD);
            } else{
                $editionLimite = 0;
                $AjoutTel = AjoutTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $BDD);
            }
            $tel = $AjoutTel;

            include("vues/v_FicheTel.php");
        } else{

            echo "Il existe deja un produit du meme nom !";

            }               
    }else{
            echo " Vous n'etes pas habilité a ajouter un smartphone."   ; 
    }
?>