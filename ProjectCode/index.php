<?php session_start(); 
require("include/bdd.inc.php");
require("include/fct.inc.php");
connexionBDD();

if(!isset($_REQUEST['nav'])){
     $_REQUEST['nav'] = 'Accueil';
}
$nav = $_REQUEST['nav'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
    
<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
        include('vues/v_headerAdmin.php');                
    }else {
        include('vues/v_headerDeco.php');        
    }
}else{
    include('vues/v_header.php');
}
?>
    
</head>
<body>

<?php
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
        case 'SmartphonesPlusVendus':{  
		include("vues/v_SmartphonesPlusVendus.php");
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
		include("vues/v_ModifierTel.php");
                break;
	}
        case 'SupprimerTel':{   
		include("vues/v_SupprimerTel.php");
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
}
    include("vues/v_footer.php");	
?>

	</div>
</body>
</html>