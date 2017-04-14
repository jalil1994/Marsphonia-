<?php

$BDD = connexionBDD();

    if($_SESSION['numClient'] == 4){
            if(is_int(intval($promo))){
                $AjoutPromo = AjoutPromo($numTel,$promo ,$BDD); 
                if($AjoutPromo == 0){
                    header('Location: index.php?nav=ConsulterTel');
                } else{
                    echo $php_errormsg   ; 
                } 
            }else {
                echo "Veuillez saisir un nombre";
                header('Location: index.php?nav=ConsulterTel');
            }

    }else{
            echo " Vous n'etes pas habilité a ajouter une promo."   ; 
    }