<?php session_start(); 
require("include/bdd.inc.php");
require("include/fct.inc.php");
connexionBDD();

if(!isset($_REQUEST['nav'])){
     $_REQUEST['nav'] = 'Accueil';
}

$nav = $_REQUEST['nav'];
include("vues/v_Entete.php");

if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
        include('vues/v_headerAdmin.php');                
    }else {
        include('vues/v_headerDeco.php');        
    }
}else{
    include('vues/v_header.php');
}

switch($nav){
        case 'Accueil':{   
		include("vues/v_index.php");
                break;
	}
        case 'Smartphones':{   
		include("vues/v_Smartphones.php");
                break;
	}
        case 'Panier':{   
            if(isset($_POST['Quantite'])){
                $quantite=$_POST['Quantite'];
                $numTel=$_POST['numTel'];
            }else if(isset($_GET['panier'])){
            	$panier=$_GET['panier'];
            	$BDD = connexionBDD();
            	detruirePanier($panier, $_SESSION['numClient'],$BDD);
            } else if(isset($_GET['wishlist'])){
            	$numWishlist=$_GET['wishlist'];
            	$BDD = connexionBDD();
            	MajPanier($numWishlist, $_SESSION['numClient'], $BDD);
            	detruireWishlist($numWishlist, $BDD);
            }
		include("vues/v_Panier.php");
                break;
	}
        case 'Deconnexion':{   
            deconnecter();
            header('Location: index.php?nav=Accueil');
            break;
	}
        case 'Connexion':{   
		include("vues/v_Connexion.php");
                break;
	}      
        case 'ConnexionFailed':{   
		include("vues/v_ConnexionFailed.php");
                break;
	}         
        case 'FAQ':{   
		include("vues/v_FAQ.php");
                break;
	}          
        case 'Inscription':{   
		include("vues/v_Inscription.php");
                break;
	}
        case 'InscriptionClient':{
            if(isset($_GET['cas'])){
                $cas=$_GET['cas'];
            }
		include("include/VerifInscription.php");
                break;
	} 
        case 'InscriptionFailed':{   
		include("vues/v_InscriptionFailed.php");
                break;
	}        
        case 'FAQ':{   
		include("vues/v_FAQ.php");
                break;
	}   
        case 'DerniersSmartphones':{  
		include("vues/v_DerniersSmartphones.php");
                break;
	}
        case 'SmartphonesMoinsChers':{   
		include("vues/v_SmartphonesMoinsChers.php");
                break;
	}  
        case 'Promo':{   
		include("vues/v_Promos.php");
                break;
	}    
        case 'ConnexionClient':{   
		include("include/VerifConnexion.php");
                break;
	}  
        case 'ClientConnecter':{
            if($_SESSION['numClient'] == 4){
                header('Location: index.php?nav=Admin');
            }else{
            header('Location: index.php?nav=Accueil');    
            }break;
	}   
        case 'Admin':{   
			include("vues/v_Admin.php");
                break;
	}       
        case 'AjouterTel':{   
			include("vues/v_AjoutTel.php");
                break;
	}  
        case 'VerifAjouterTel':{   
                include("include/VerifAjouterTel.php");
                break;
	}         
        case 'ModifierTel':{   
                $numTel=$_GET['IdTel'];
				include("vues/v_ModifierTel.php");
                break;
	}
        case 'VerifModifierTel':{
        	$numTel=$_GET['IdTel'];
        	include("include/VerifModifierTel.php");
        	break;
        }
        case 'SupprimerTel':{   
                $numTel=$_GET['IdTel'];
                $BDD = connexionBDD();
				SupprimerTel($numTel, $BDD);
                include("vues/v_ConsulterTel.php");
                break;
	}        
        case 'ConsulterTel':{   
		include("vues/v_ConsulterTel.php");
                break;
	} 
        case 'ConsulterCommande':{   
		include("vues/v_ConsulterCommande.php");
                break;
	}   
        case 'Wishlist':{
        	if(isset($_POST['Quantite'])){
        		$quantiteW=$_POST['Quantite'];
        		$numTelW=$_POST['numTel'];
        	}else if(isset($_GET['wishlist'])){
        		$wishlist=$_GET['wishlist'];
        		$BDD = connexionBDD();
        		detruireWishlist($wishlist, $BDD);
        	}
		include("vues/v_Wishlist.php");
                break;
	} 
        case 'FicheTel':{
            $tel=$_GET['IDTel'];
			include("vues/v_FicheTel.php");
                break;
	}
        case 'Contact':{   
		include("vues/v_Contact.php");
                break;
	}  
        case 'ajouterTelPanier':{  
            $numTel=$_GET['IdTel'];
            include("include/VerifExistePanierClient.php");
            break;
	}  
        case 'ajouterTelwishlist':{
        	$numTel=$_GET['IdTel'];
        	include("include/VerifExistewishlistClient.php");
        	break;
        }
        case 'AjoutPromo':{  
            $numTel=$_GET['IdTel'];
            $promo = $_POST['Promo'];
            include("include/AjoutPromo.php");
            break;
	}  
        case 'SupprimerTelClient':{  
            $numTel=$_GET['IdTel'];
            $BDD = connexionBDD();
            supprTelClient($numTel, $_SESSION['numClient'], $BDD);
            include("vues/v_Panier.php");
            break;
	}
        case 'SupprimerTelClientW':{
        	$numTel=$_GET['IdTel'];
        	$BDD = connexionBDD();
        	supprTelClientW($numTel, $_SESSION['numClient'], $BDD);
        	include("vues/v_Wishlist.php");
        	break;
     }
        case 'ValiderPanier':{  
            $PointsUtiliser=$_POST['PointsUtiliser'];
            $infosTel=$_SESSION['infosTel'];
            include("include/ValiderPanier.php");
            header('Location: index.php?nav=Accueil');
            break;
	}   
        case 'Compteclient':{  
            include("vues/v_CompteClient.php");
            break;
	}  
        case 'InfosPerso':{  
            $cas='InfosPerso';
            include("vues/v_CompteClient.php");
            break;
	} 
        case 'CommandeClient':{ 
            $cas='CommandeClient';
            include("vues/v_CompteClient.php");
            break;
	} 
        case 'AfficheCommande':{
        	$idCommande=$_GET['IdCommande'];
        	include("vues/v_AfficheCommande.php");
        	break;
        } 
}
    include("vues/v_footer.php");	
?>
    
	
</body>
</html>