<?php

function connexionBDD(){
            try
        {
                $bdd = new PDO('mysql:host=localhost;dbname=marsphonia;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        return $bdd;
}

function connecter($mail,$mdp, $BDD){
        $reponse = $BDD->query("select numClient from client where emailClient='$mail' and motdepasse='$mdp'");
        $donnees = $reponse->fetch();             
        return $donnees;
}

function VerifInscrire($mail, $BDD){
        $reponse = $BDD->query("select numClient from client where emailClient='$mail'");
        $donnees = $reponse->fetch();             
        return $donnees;
}

function verifExistTel($nom, $BDD){
        $reponse = $BDD->query("select numProduit from Produit where nomProduit='$nom'");
        $donnees = $reponse->fetch();             
        return $donnees;
}

function AjoutTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $photo, $BDD){
    
        //recup nbmaxproduit+1
        $rep = $BDD->query("select MAX(numProduit) from Produit");
        $don = $rep->fetch();  
        $numProduit = $don[0]++;
        
        // gestion de l image
        $testImg = $BDD->query("INSERT INTO `images` (`idImage`,`idProduit`, `LienImage`) 
            VALUES ('$numProduit', '$numProduit', '$photo')");
        $repTestImg = $testImg->fetch();
        
        //ajout du produit
        $reponse = $BDD->query("INSERT INTO `produit` (`nomProduit`,`numProduit`, `NombredeVente`, `promo`, `Couleur`, `Marque`, `Ecran`, `editionLimite`, `prixduproduit`, `datesortie`, `quantite`, `foncTexte`) 
            VALUES ('$nom', '$numProduit', '0', NULL, '$couleur', '$marque', '$ecran', '$editionLimite', '$prix', '$date', '$quantite', '$fonction')");
        $donnees = $reponse->fetch();             
        return $donnees;
        
}

function ModifierTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $photo, $BDD){
    
        //recup nbmaxproduit+1
        $rep = $BDD->query("select MAX(numProduit) from Produit");
        $don = $rep->fetch();  
        $numProduit = $don[0]++;
        // gestion de l image
        $rep2 = $BDD->query("select MAX(numProduit) from Produit");
        $don2 = $rep2->fetch();  
        $numImg = $don2[0]++;
        $testImg = $BDD->query("UPDATE `images` SET idImage='$idImage',idProduit='$idProduit', LienImage='$LienImage' 
            WHERE idImage = $idImage");
         mysql_query($testImg) or die(mysql_error());

        $repTestImg = $testImg->fetch();
        
        //Modification du produit
        $reponse = $BDD->query("UPDATE `produit` SET nomProduit='$nom',numProduit='$numProduit', numImg='$numImg', 
            Idcouleur='$couleur', Idmarque='$marque', Idecran='$ecran', editionLimite='$editionLimite', prixduproduit='$prix',
             datesortie='$date', quantite='$quantite', foncTexte='$fonction' WHERE numProduit = $numProduit  ");
        mysql_query($reponse) or die(mysql_error());
        
        $donnees = $reponse->fetch();             
        return $donnees;
}

function inscrire($Nom,$Tel, $Prenom, $EtatCivil, $Mail, $MDP, $BDD){
        $req = $BDD->query("Select MAX(numClient) From client");
        $nbMaxClients = $req->fetch();
        $nbMaxClients[0]++;
        
        if($EtatCivil == 'Homme'){
            $EtatCivil = 1;
        }else{
            $EtatCivil = 0;
        }
        
        $reponse = $BDD->query("INSERT INTO `client` (`emailClient`, `numClient`, `motdepasse`, `nomClient`, `prenomClient`, `etatCivile`, `num_Tel`, `Points`, `IdPanier`) VALUES
            ('$Mail', '$nbMaxClients[0]', '$MDP', '$Nom', '$Prenom', '$EtatCivil', '$Tel', '0', NULL)");
        $donnees = $reponse->fetch();
        return $donnees;
}

function nbTel($BDD){
    $reponse = $BDD->query("select count(numProduit) from produit;");
    $donnees = $reponse->fetch();             
    return $donnees;
}

function Tels($BDD){
    $nbTel = nbTel($BDD);
    
    for($i=0; $i<$nbTel[0]; $i++){
        if($i==0){
            $reponse = $BDD->query("select numProduit, nomProduit,Nombredevente, promo,  Couleur, Marque, Ecran, editionLimite, prixduproduit, datesortie, quantite, foncTexte from produit LIMIT 0,1;");
            $infosTel[$i] = $reponse->fetch();  
        } else {
            $reponse = $BDD->query("select numProduit, nomProduit,Nombredevente, promo,  Couleur, Marque, Ecran, editionLimite, prixduproduit, datesortie, quantite, foncTexte from produit LIMIT $i,$i;");
            $infosTel[$i] = $reponse->fetch();
        }
    }                
    return $infosTel;
}

function RecupInfoTel($num, $BDD){
        $reponse = $BDD->query("select nomProduit, Couleur, Marque, Ecran, editionLimite, prixduproduit, datesortie, quantite, foncTexte, lienImage, numProduit from Produit join images on(numProduit = idProduit)where numProduit='$num';");
        $donnees = $reponse->fetch();             
        return $donnees;
}

function SupprimerTel($numTel, $BDD){
        $lien = $BDD->query("Select lienImage from images where idProduit = $numTel");
        $lienImg = $lien->fetch();
        $rep = $BDD->query("DELETE FROM `marsphonia`.`images` WHERE `images`.`idProduit` = $numTel;");
        $donneesImg = $rep->fetch();
        $supprImg = unlink($lienImg[0]);
        $reponse = $BDD->query("DELETE FROM `marsphonia`.`produit` WHERE `produit`.`numProduit` = $numTel;");
        $donneesTel = $reponse->fetch();
        $suppressionProduit[0] = $donneesImg;
        $suppressionProduit[1] = $supprImg;
        $suppressionProduit[2] = $donneesTel;

        return $suppressionProduit;
}