<?php

$BDD = connexionBDD();

    if($_SESSION['numClient'] == 4){

       		$nom=$_POST['Nom'];
            $quantite=$_POST['Stock'];
            $fonction=$_POST['Fonctions'];
            $prix=$_POST['Prix'];
            $marque=$_POST['Marque'];
            $couleur=$_POST['Couleur'];
            $ecran=$_POST['Ecran'];
            $date=$_POST['DateSortie'];          
            
            if($_POST['editionLimite'] == 'Oui' ){
                $nbeditionLimite=$_POST['nbeditionLimite'];           
                $ModifierTel= ModifierTel($numTel, $nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $nbeditionLimite, $date, $BDD);
            } else{
                $editionLimite = 0;
                $ModifierTel= ModifierTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $BDD);
            }
            $tel = $ModifierTel[0];
            include("vues/v_FicheTel.php");

    }else{
            echo " Vous n'etes pas habilité a ajouter un smartphone."   ; 
    }
?>