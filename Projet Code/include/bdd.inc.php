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

function AjoutTel($nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $BDD){
    
        //recup nbmaxproduit+1
        $rep = $BDD->query("select MAX(numProduit) from Produit");
        $numProduit= $rep->fetch();  
        $numProduit[0]++;
        
        // gestion de l image
         $testImg = $BDD->query("INSERT INTO `images` (`idImage`,`idProduit`, `LienImage`)
        	VALUES ('$numProduit[0]', '$numProduit[0]', 'img/img$numProduit[0].jpg');");
       	 $repTestImg = $testImg->fetch();
        
        //ajout du produit
        $reponse = $BDD->query("INSERT INTO `produit` (`nomProduit`,`numProduit`, `NombredeVente`, `promo`, `Couleur`, `Marque`, `Ecran`, `editionLimite`, `prixduproduit`, `datesortie`, `quantite`, `foncTexte`) 
        		VALUES ('$nom', '$numProduit[0]', '0', '0', '$couleur', '$marque', '$ecran', '$editionLimite', '$prix', '$date', '$quantite', '$fonction');");
        $donnees = $reponse->fetch();             
        return $numProduit[0];
        
}

function ModifierTel($numTel, $nom, $ecran, $couleur, $marque, $prix, $fonction, $quantite, $editionLimite, $date, $BDD){
	
        //Modification du produit
        $reponse = $BDD->query("UPDATE `produit` SET nomProduit='$nom', Couleur='$couleur', Marque='$marque', Ecran='$ecran', editionLimite='$editionLimite', prixduproduit='$prix',
        		datesortie='$date', quantite='$quantite', foncTexte='$fonction' WHERE numProduit = '$numTel'");        
        $donnees = $reponse->fetch(); 
        
        return $numProduit;
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

function VerifExistewishlistClient($numClient, $BDD){
	$reponse = $BDD->query("Select NumWishlist From wishlist where numclient='$numClient';");
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
        return $numPanier[0];
}

function CreerLignePanierClient($numTel,$numClient, $BDD){
        $req = $BDD->query("Select MAX(IdLignePanier) From lignepanier");
        $numLignePanier = $req->fetch();
        $numLignePanier[0]++;

        $req = $BDD->query("Select IdPanier From panier where numClient='$numClient';");
        $IdPanier = $req->fetch();
        
        $reponse = $BDD->query("select quantite from lignepanier where idPanier='$IdPanier[0]' AND IdProduit='$numTel' AND numCommande='0';");
        $infosTel = $reponse->fetch(); 
        
        if($infosTel != false){
        	$quantite = $infosTel[0] + 1;
        	$reponse = $BDD->query("UPDATE `lignepanier` SET quantite='$quantite'where idPanier='$IdPanier[0]' AND IdProduit='$numTel' AND numCommande='0'; ;");
        	$donnees = $reponse->fetch();
        } else {        
	        $reponse = $BDD->query("INSERT INTO `lignepanier` (`IdLignePanier`, `IdProduit`, `IdPanier`,`numCommande`,  `quantite`) VALUES
	            ('$numLignePanier[0]', '$numTel', '$IdPanier[0]','0', '1');");
	        $donnees = $reponse->fetch();
        }
        return $donnees;
}

function CreerwishlistClient($numClient, $BDD){
	$req = $BDD->query("Select MAX(NumWishlist) From wishlist");
	$NumWishlist= $req->fetch();
	$NumWishlist[0]++;
	
	$reponse = $BDD->query("INSERT INTO `wishlist` (`NumWishlist`, `numclient`) VALUES
			('$NumWishlist[0]', '$numClient')");
	$donnees = $reponse->fetch();
}

function CreerLignewishlistClient($numTel,$numClient, $BDD){
	$req = $BDD->query("Select MAX(IdLigneWishlist) From lignewishlist");
	$LigneWishlist= $req->fetch();
	$LigneWishlist[0]++;
	
	$req = $BDD->query("Select NumWishlist From wishlist where numClient='$numClient';");
	$NumWishlist= $req->fetch();
	
	$reponse = $BDD->query("INSERT INTO `lignewishlist` (`IdLigneWishlist`, `IdProduit`, `IdWishlist`,  `quantite`) VALUES
			('$LigneWishlist[0]', '$numTel', '$NumWishlist[0]', '1');");
	$donnees = $reponse->fetch();
	
	return $donnees;
}

function TelsClient($numClient, $BDD){
    $TelClient = TelClient($numClient, $BDD);
    
    for($i=0; $i<$TelClient[0]; $i++){
        if($i==0){
            $reponse = $BDD->query("select IdProduit, quantite from lignepanier where idPanier='$TelClient[idPanier]' AND numCommande='0' LIMIT 0, 1;");
            $infosTel[$i] = $reponse->fetch();  
        } else {
        	$reponse = $BDD->query("select IdProduit, quantite from lignepanier where idPanier='$TelClient[idPanier]' AND numCommande='0' LIMIT $i,$i;");
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
    
    $reponse = $BDD->query("select count(IdProduit) from lignepanier where IdPanier='$donnees[0]' AND numCommande='0';");
    $donnees1 = $reponse->fetch();   
    $donnees[0] = $donnees1[0];
    return $donnees;
}

function TelsClientW($numClient, $BDD){
	$TelClientW = TelClientW($numClient, $BDD);
	
	for($i=0; $i<$TelClientW[1][0]; $i++){
		if($i==0){
			$reponse = $BDD->query("select IdProduit, quantite from lignewishlist where IdWishlist='$TelClientW[0]' LIMIT 0, 1;");
			$infosTel[$i] = $reponse->fetch();
		} else {
			$reponse = $BDD->query("select IdProduit, quantite from lignewishlist where IdWishlist='$TelClientW[0]' LIMIT $i,$i;");
			$infosTel[$i] = $reponse->fetch();
		}
	}
	if(isset($infosTel)){
		return $infosTel;
	}else{
		return 1;
	}
}

function TelClientW($numClient, $BDD){
	$reponse = $BDD->query("select NumWishlist from wishlist where numclient='$numClient';");
	$donnees = $reponse->fetch();
	
	$reponse = $BDD->query("select count(IdProduit) from lignewishlist where IdWishlist='$donnees[0]';");
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

function MajQteW($quantite, $numTel, $numClient, $BDD ){
	$reponse = $BDD->query("select quantite from produit where numProduit='$numTel';");
	$stock = $reponse->fetch();
	
	if($stock[0]>=$quantite){
		$reponse = $BDD->query("select NumWishlist from wishlist where numclient='$numClient';");
		$numPanier = $reponse->fetch();
		
		$reponse = $BDD->query("UPDATE `lignewishlist` SET quantite='$quantite' where IdProduit='$numTel' AND IdWishlist='$numPanier[0]';");
		$donnees = $reponse->fetch();
		
		return $donnees;
	} else {
		return $stock[0];
	}
}

function supprTelClient($numTel, $numClient, $BDD){
        $reponse = $BDD->query("select idPanier from panier where numclient='$numClient';");
        $numPanier = $reponse->fetch(); 
        
    $reponse = $BDD->query("DELETE from lignepanier where IdProduit='$numTel' AND IdPanier='$numPanier[0]' AND numCommande='0';");
    $donnees = $reponse->fetch();  
    return $donnees;
}

function supprTelClientW($numTel, $numClient, $BDD){
	$reponse = $BDD->query("select NumWishlist from wishlist where numclient='$numClient';");
	$numPanier = $reponse->fetch();
	
	$reponse = $BDD->query("DELETE from lignewishlist where IdProduit='$numTel' AND IdWishlist='$numPanier[0]';");
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
        
        $reponse = $BDD->query("Select IdLignePanier, IdProduit, quantite from lignepanier where IdPanier='$PanierClient' and numCommande='0' order by IdLignePanier;");
        $nbLignePanier = $reponse->fetchAll();

        for($i=0; $i<sizeof($nbLignePanier); $i++){
        	$ligne = $nbLignePanier[$i][0];
        	$req = $BDD->query("UPDATE `lignepanier` SET numCommande='$numCommande[0]' where IdLignePanier='$ligne';");
        	$reponse = $req->fetch();
        	$numProduit = $nbLignePanier[$i][1];
        	$req = $BDD->query("Select quantite From produit where numProduit ='$numProduit'");
        	$quantite = $req->fetch();
        	$quantiteRestante = $quantite[0]-$nbLignePanier[$i][2];
        	$req = $BDD->query("UPDATE `produit` SET quantite='$quantiteRestante' where numProduit='$numProduit';");
        	$reponse = $req->fetch();
        }
        
    $reponse = $BDD->query("INSERT INTO `commande` (`idCommande`, `confirmationPaiement`, `prix_total`, `dateCommande`, `IdClient`) VALUES
            ('$numCommande[0]', '0', '$totalCommande','$date', '$numClient');");
    $donnees = $reponse->fetch(); 
    
    $req = $BDD->query("Select MAX(numfacture) From facture");
    $numfacture = $req->fetch();
    $numfacture[0]++;
    
    $reponse = $BDD->query("INSERT INTO `facture` (`numFacture`, `idCommande`) VALUES
    		('$numfacture[0]', '$numCommande[0]')");
    $donnees = $reponse->fetch(); 
    return $donnees;
}

function RecupInfoClient($num, $BDD){

        $reponse = $BDD->query("select ville from adresse where numClient='$num';");
        $test = $reponse->fetch();
        $type = gettype($test);
        if($type == 'boolean'){
            $reponse = $BDD->query("select emailClient, nomClient, prenomClient, etatCivile, num_Tel from client where client.numClient='$num';");
            $donnees = $reponse->fetch();
            for($i=5; $i<10; $i++){
                $donnees[$i] = '';
            }
        } else {
            $reponse = $BDD->query("select emailClient, nomClient, prenomClient, etatCivile, num_Tel, ville, pays, rue, numero_porte, Code_Postal from client join adresse on(client.numClient = adresse.numClient) where client.numClient='$num';");
            $donnees = $reponse->fetch();
        }
        return $donnees;
}
        
function testAdresse($numClient, $BDD){
        $req = $BDD->query("Select ville From adresse where numClient='$numClient'");
        $reponse = $req->fetch();
        if($reponse[0] != false){
            $reponse = true;
        }
    return $reponse;
}        

function MajAdresseCompte($Ville, $Pays, $Rue, $NumPorte, $CodePostal, $numClient, $BDD ){
    $reponse = $BDD->query("UPDATE `adresse` SET ville='$Ville', pays='$Pays', rue='$Rue', numero_porte='$NumPorte', Code_Postal='$CodePostal'  where numclient='$numClient';");
    $donnees = $reponse->fetch();   
    return $donnees;
}

function MajInfosCompte($Nom,$Tel, $Prenom, $EtatCivil, $Mail, $MDP, $numClient, $BDD){
        if($EtatCivil == 'Homme'){
            $EtatCivil = 1;
        }else{
            $EtatCivil = 0;
        }
    $reponse = $BDD->query("UPDATE client SET nomClient='$Nom', num_Tel='$Tel', prenomClient='$Prenom', etatCivile='$EtatCivil', emailClient='$Mail', motdepasse='$MDP' where numClient='$numClient';");
    $donnees = $reponse->fetch();
    return $donnees;
}

function AjoutAdresse($Ville, $Pays, $Rue, $NumPorte, $CodePostal, $numClient, $BDD ){
        $reponse = $BDD->query("INSERT INTO `adresse` (`ville`, `pays`, `rue`, `numero_porte`, `Code_Postal`, `numClient`) VALUES
            ('$Ville', '$Pays', '$Rue', '$NumPorte', '$CodePostal', '$numClient');");
        $donnees = $reponse->fetch();
    return $donnees;
}

function nbCommandes($BDD){
	$reponse = $BDD->query("select count(idCommande) from commande;");
	$donnees = $reponse->fetch();
	return $donnees;
}

function Commandes($BDD){
	$nbCommandes= nbCommandes($BDD);
	if($nbCommandes[0]>0){
		for($i=0; $i<$nbCommandes[0]; $i++){
			if($i==0){
				$reponse = $BDD->query("select confirmationPaiement, prix_total,dateCommande, nomClient, idCommande from commande join client on(IdClient=numClient) order by dateCommande DESC LIMIT 0,1;");
				$infosCommande[$i] = $reponse->fetch();
			} else {
				$reponse = $BDD->query("select confirmationPaiement, prix_total,dateCommande, nomClient, idCommande from commande join client on(IdClient=numClient) order by dateCommande DESC LIMIT $i,$i;");
				$infosCommande[$i] = $reponse->fetch();
			}
		}
		return $infosCommande;
	}
}


function TelsCommande($numCommande, $BDD){
	$reponse = $BDD->query("select count(IdProduit) from lignepanier where numCommande = '$numCommande';");
	$donnees = $reponse->fetch();
	
	for($i=0; $i<$donnees[0]; $i++){
		if($i==0){
			$reponse = $BDD->query("SELECT `IdProduit`, `quantite` from lignepanier where `numCommande` = '$numCommande' LIMIT 0,1;");
			$infosCommande[$i] = $reponse->fetch();
			$infosTel[$i] = RecupInfoTel($infosCommande[$i][0], $BDD);
			$infosTel[$i][7] = $infosCommande[$i][1];
		} else {
			$reponse = $BDD->query("SELECT `IdProduit`, `quantite` from lignepanier where `numCommande` = '$numCommande'  LIMIT $i,$i;");
			$infosCommande[$i] = $reponse->fetch();
			$infosTel[$i] = RecupInfoTel($infosCommande[$i][0], $BDD);
			$infosTel[$i][7] = $infosCommande[$i][1];
		}
	}
	return $infosTel;
}

function infosCommande($numCommande, $BDD){
	$reponse = $BDD->query("select confirmationPaiement, prix_total, dateCommande, nomClient, rue, ville, numero_porte from Commande join Client on(IdClient=Client.numClient) join adresse on(IdClient=adresse.numClient) where idCommande = '$numCommande';");
	$donnees = $reponse->fetch();

	return $donnees;
}

function nbCommandesClient($numClient, $BDD){
	$reponse = $BDD->query("select count(idCommande) from commande where IdClient = '$numClient';");
	$donnees = $reponse->fetch();
	return $donnees;
}

function CommandesClient($numClient, $BDD){
	$nbCommandes= nbCommandes($BDD);
	
	for($i=0; $i<$nbCommandes[0]; $i++){
		if($i==0){
			$reponse = $BDD->query("select confirmationPaiement, prix_total,dateCommande, nomClient, idCommande from commande join client on(IdClient=numClient) where IdClient = '$numClient' order by dateCommande DESC LIMIT 0,1;");
			$infosCommande[$i] = $reponse->fetch();
		} else {
			$reponse = $BDD->query("select confirmationPaiement, prix_total,dateCommande, nomClient, idCommande from commande join client on(IdClient=numClient) where IdClient = '$numClient' order by dateCommande DESC LIMIT $i,$i;");
			$infosCommande[$i] = $reponse->fetch();
		}
	}
	return $infosCommande;
}

function detruirePanier($numPanier, $numClient, $BDD){
	$TelsClient = TelsClient($numClient, $BDD);
	if($TelsClient != 1){
		for($i=0; $i<sizeof($TelsClient); $i++){
			supprTelClient($TelsClient[$i][0], $numClient, $BDD);
		}
	}
	$reponse = $BDD->query("DELETE from panier where IdPanier='$numPanier';");
	$donnees = $reponse->fetch();
	return $donnees;
}


function detruireWishlist($wishlist, $BDD){
	$reponse = $BDD->query("DELETE from lignewishlist where IdWishlist='$wishlist';");
	$donnees = $reponse->fetch();
	
	$reponse = $BDD->query("DELETE from wishlist where NumWishlist='$wishlist';");
	$donnees = $reponse->fetch();
	return $donnees;
}


function MajPanier($numWishlist, $numClient, $BDD){
	$reponse = $BDD->query("select IdProduit, quantite from lignewishlist where IdWishlist = '$numWishlist';");
	$infosWishlist = $reponse->fetchAll();
	
	$PanierClient = VerifExistePanierClient($numClient, $BDD);
	
	if($PanierClient[0] == false){
		$PanierClient = CreerPanierClient($numClient, $BDD);
	}
	for($i=0; $i<sizeof($infosWishlist); $i++){
		CreerLignePanierClient($infosWishlist[$i][0],$numClient, $BDD);
		if($infosWishlist[$i][1] != 1){
			$PanierClient = VerifExistePanierClient($numClient, $BDD);
			$quantite = $infosWishlist[$i][1];
			$numProduit = $infosWishlist[$i][0];
			$reponse = $BDD->query("UPDATE lignepanier SET quantite='$quantite' where idPanier='$PanierClient[0]' AND IdProduit = '$numProduit' AND numCommande='0';");
			$donnees = $reponse->fetch();
		}
	}
}

function TelProbable($prix, $BDD){
	
	$reponse = $BDD->query("select numProduit from produit where prixduproduit < '$prix' order by prixduproduit DESC limit 0,1;");
	$donnees = $reponse->fetch();
	if($donnees == false){
		$reponse = $BDD->query("select numProduit from produit where prixduproduit > '$prix' order by prixduproduit ASC limit 0,1;");
		$donnees = $reponse->fetch();
	}
	return $donnees[0];
}


