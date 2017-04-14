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
        
        $reponse = $BDD->query("INSERT INTO `client` (`emailClient`, `numClient`, `motdepasse`, `nomClient`, `prenomClient`, `etatCivile`, `num_Tel`, `Points`) VALUES
            ('$Mail', '$nbMaxClients[0]', '$MDP', '$Nom', '$Prenom', '$EtatCivil', '$Tel', '0');");
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
        $reponse = $BDD->query("select nomProduit, Couleur, Marque, Ecran, editionLimite, prixduproduit, datesortie, quantite, foncTexte, lienImage, numProduit, promo from Produit join images on(numProduit = idProduit)where numProduit='$num';");
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

function TelPlusVendus($BDD){
        for($i=0; $i<3; $i++){
            if($i == 0){
                $reponse = $BDD->query("Select numProduit From produit order by NombredeVente DESC LIMIT 0, 1;");
                $donnees[$i] = $reponse->fetch();  
            } else {
            $reponse = $BDD->query("Select numProduit From produit order by NombredeVente DESC LIMIT $i, $i;");
            $donnees[$i] = $reponse->fetch(); 
            }
        }
        return $donnees;
}

function TelMoinsChers($BDD){
        for($i=0; $i<6; $i++){
            if($i == 0){
                $reponse = $BDD->query("Select numProduit From produit order by prixduproduit ASC LIMIT 0, 1;");
                $donnees[$i] = $reponse->fetch();  
            } else {
            $reponse = $BDD->query("Select numProduit From produit order by prixduproduit ASC LIMIT $i, $i;");
            $donnees[$i] = $reponse->fetch(); 
            }
        }
        return $donnees;
}

function TelPromo($BDD){
        $reponse = $BDD->query("Select count(numProduit) From produit where promo <>0;");
        $nbTelPromos = $reponse->fetch();
        for($i=0; $i<$nbTelPromos[0]; $i++){
            if($i == 0){
                $reponse = $BDD->query("Select numProduit From produit where promo <>0 order by promo DESC LIMIT 0, 1;");
                $donnees[$i] = $reponse->fetch();  
            } else {
                $reponse = $BDD->query("Select numProduit From produit where promo <>0 order by promo DESC LIMIT $i, $i;");
                $donnees[$i] = $reponse->fetch();  
            }
        }
        return $donnees;
}

function AjoutPromo($numTel,$promo ,$BDD){
    
    if($promo==0){
        $reponse = $BDD->query("Select prixduproduit, promo from produit where numProduit = '$numTel' ;");
        $prixReduit = $reponse->fetch();
        $coef = 1 - ($prixReduit[1] /100);
        $prixBase = $prixReduit[0] / $coef;
        $reponse = $BDD->query("UPDATE `produit` SET promo='$promo',prixduproduit='$prixBase'  where numProduit = '$numTel' ;");
        $donnees = $reponse->fetch();
    } else {
        $reponse = $BDD->query("Select prixduproduit from produit where `numProduit` = '$numTel' ;");
        $prixBase = $reponse->fetch();
        
        $reduction = ($prixBase[0] * $promo) /100;
        $prixReduit = $prixBase[0] - $reduction;
        
        $reponse = $BDD->query("UPDATE `produit` SET promo='$promo', prixduproduit='$prixReduit'  where numProduit = '$numTel' ;");
        $donnees = $reponse->fetch();
    }
        return $donnees;
}

function DerniersTel($BDD){
        for($i=0; $i<6; $i++){
            if($i == 0){
                $reponse = $BDD->query("Select numProduit From produit order by datesortie desc LIMIT 0, 1;");
                $donnees[$i] = $reponse->fetch();  
            } else {
            $reponse = $BDD->query("Select numProduit From produit order by datesortie desc LIMIT $i, $i;");
            $donnees[$i] = $reponse->fetch(); 
            }
        }
        return $donnees;
}

function VerifExistePanierClient($numClient, $BDD){
        $reponse = $BDD->query("Select IdPanier From panier where numclient='$numClient';");
        $donnees = $reponse->fetch();
        return $donnees;
}


function CreerPanierClient($numClient, $BDD){
        $req = $BDD->query("Select MAX(IdPanier) From panier");
        $numPanier = $req->fetch();
        $numPanier[0]++;
        
        $reponse = $BDD->query("INSERT INTO `panier` (`IdPanier`, `numclient`) VALUES
            ('$numPanier[0]', '$numClient')");
        $donnees = $reponse->fetch();
}

function CreerLignePanierClient($numTel,$numClient, $BDD){
        $req = $BDD->query("Select MAX(IdLignePanier) From lignepanier");
        $numLignePanier = $req->fetch();
        $numLignePanier[0]++;

        $req = $BDD->query("Select IdPanier From panier where numClient='$numClient';");
        $IdPanier = $req->fetch();
        
        $reponse = $BDD->query("INSERT INTO `lignepanier` (`IdLignePanier`, `IdProduit`, `IdPanier`,`numCommande`,  `quantite`) VALUES
            ('$numLignePanier[0]', '$numTel', '$IdPanier[0]','NULL', '1');");
        $donnees = $reponse->fetch();        
        
        return $donnees;
}

function TelsClient($numClient, $BDD){
    $TelClient = TelClient($numClient, $BDD);
    
    for($i=0; $i<$TelClient[1][0]; $i++){
        if($i==0){
            $reponse = $BDD->query("select IdProduit, quantite from lignepanier where idPanier='$TelClient[0]' LIMIT 0, 1;");
            $infosTel[$i] = $reponse->fetch();  
        } else {
            $reponse = $BDD->query("select IdProduit, quantite from lignepanier where idPanier='$TelClient[0]' LIMIT $i,$i;");
            $infosTel[$i] = $reponse->fetch();
        }
    }
    if(isset($infosTel)){
        return $infosTel;
    }else{
        return 1;
    }
}

function TelClient($numClient, $BDD){
    $reponse = $BDD->query("select idPanier from panier where numclient='$numClient';");
    $donnees = $reponse->fetch();  
    
    $reponse = $BDD->query("select count(IdProduit) from lignepanier where IdPanier='$donnees[0]';");
    $donnees[1] = $reponse->fetch();    
    return $donnees;
}

function pointsClient($numClient, $BDD){
    $reponse = $BDD->query("select Points from client where numclient='$numClient';");
    $donnees = $reponse->fetch();  ;    
    return $donnees;
}


function MajQte($quantite, $numTel, $numClient, $BDD ){
    $reponse = $BDD->query("select quantite from produit where numProduit='$numTel';");
    $stock = $reponse->fetch(); 
    
    if($stock[0]>=$quantite){
        $reponse = $BDD->query("select idPanier from panier where numclient='$numClient';");
        $numPanier = $reponse->fetch();  
    
        $reponse = $BDD->query("UPDATE `lignepanier` SET quantite='$quantite' where IdProduit='$numTel' AND IdPanier='$numPanier[0]';");
        $donnees = $reponse->fetch();
    
        return $donnees;
    } else {
        return $stock[0];
    }
}

function supprTelClient($numTel, $numClient, $BDD){
        $reponse = $BDD->query("select idPanier from panier where numclient='$numClient';");
        $numPanier = $reponse->fetch(); 
        
    $reponse = $BDD->query("DELETE from lignepanier where IdProduit='$numTel' AND IdPanier='$numPanier[0]';");
    $donnees = $reponse->fetch();  
    return $donnees;
}

function MajPointsClient($Points, $numClient, $BDD ){
    $pointsClient = pointsClient($numClient, $BDD);
    $NouveauxPoints = $pointsClient[0] + $Points;
        
    $reponse = $BDD->query("UPDATE `client` SET Points='$NouveauxPoints' where numclient='$numClient';");
    $donnees = $reponse->fetch(); 
  
    return $donnees;
}

function AjoutCommande($numClient, $totalCommande, $date, $PanierClient,  $BDD){
        $req = $BDD->query("Select MAX(idCommande) From commande");
        $numCommande = $req->fetch();
        $numCommande[0]++;   
        
        $req = $BDD->query("Select IdLignePanier from lignepanier where IdPanier='$PanierClient' and numCommande='NULL';");
        $IdLignePanier = $req->fetch();
 
        $req = $BDD->query("UPDATE `lignepanier` SET numCommande='$numCommande[0]' where IdLignePanier='$IdLignePanier[0]';");
        $reponse = $req->fetch();
        
    $reponse = $BDD->query("INSERT INTO `commande` (`idCommande`, `confirmationPaiement`, `prix_total`, `dateCommande`, `IdClient`) VALUES
            ('$numCommande[0]', '0', '$totalCommande','$date', '$numClient');");
    $donnees = $reponse->fetch(); 
    $donnees[1]=$numCommande[0];
    return $donnees;
}

function MajFacture($commande,  $BDD){
        $req = $BDD->query("Select MAX(numfacture) From facture");
        $numfacture = $req->fetch();
        $numfacture[0]++;    
        
    $reponse = $BDD->query("INSERT INTO `facture` (`numFacture`, `idCommande`) VALUES
            ('$numfacture[0]', '$commande')");
    $donnees = $reponse->fetch(); 
    return $donnees;
}
