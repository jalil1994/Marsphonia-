<?php

function connexionBDD(){
            try
        {
                $bdd = new PDO('mysql:host=localhost;dbname=smartphonia;charset=utf8', 'root', '');
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
        $rep2 = $BDD->query("select MAX(numProduit) from Produit");
        $don2 = $rep2->fetch();  
        $numImg = $don2[0]++;
        $testImg = $BDD->query("INSERT INTO `images` (`idImage`,`idProduit`, `LienImage`) 
            VALUES ('$numImg', '$numProduit', '$photo')");
        $repTestImg = $testImg->fetch();
        
        //ajout du produit
        $reponse = $BDD->query("INSERT INTO `produit` (`nomProduit`,`numProduit`, `numImg`, `Idcouleur`, `Idmarque`, `Idecran`, `editionLimite`, `prixduproduit`, `datesortie`, `quantite`, `foncTexte`) 
            VALUES ('$nom', '$numProduit', '$numImg', '$couleur', '$marque', '$ecran', '$editionLimite', '$prix', '$date', '$quantite', '$fonction')");
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
        
    