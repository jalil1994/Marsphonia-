
	<div id="pageAdmin">
			<div id="content">
				<div class="container">
					<div class="row">
                                            <div class="col-md-4">
                                                <div class="col-md-12" id="sideClient">
                                                        <hr>
                                                        <ul style="list-style-type:none">
                                                            <li><a href="index.php?nav=InfosPerso">Mes informations personnelles</a></li>
                                                            <li><a href="index.php?nav=CommandeClient">Suivre mes commandes</a></li>           
                                                        </ul>
                                                        <hr>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php
                                                    $BDD=connexionBDD();
                                                    if(!isset($cas)){
                                                        //rien
                                                    } else if($cas=='InfosPerso' || $cas =='MdpFaux'){
                                                        $donneesClient = RecupInfoClient($_SESSION['numClient'], $BDD);
                                                        if($cas=='AdresseIncomplete'){
                                                           ?> <p> <label for="" >L'adresse rentrée est incomplète.</label></p><?php
                                                        }else if($cas=='MdpFaux'){
                                                           ?> <p> <label for="" >Le mot de passe rentrer est incorrect.</label></p><?php
                                                        }
                                                        ?>
                                                        <form method="post" action="index.php?nav=InscriptionClient&amp;cas=MajInfosClient">

                                                            <div class="col-md-3">
                                                                    <p> <label for="" > Nom : </label></p>
                                                                    <input type="text" name="Nom" id="Nom" size="20" maxlength="20" value="<?php echo $donneesClient[1] ?>" required >
                                                                            <br><br>
                                                                    <p> <label for="" > Telephone : </label></p>
                                                                    <input type="tel" name="Telephone" id="Telephone" value="<?php echo $donneesClient[4] ?>" required >		
                                                            </div>

                                                            <div class="col-md-3">
                                                                    <p> <label for="" > Prenom : </label></p>
                                                                    <input type="text" name="Prenom" id="Prenom" size="15" maxlength="30" value="<?php echo $donneesClient[2] ?>" required >
                                                                            <br><br>
                                                                    <p> <label for="" > Etat civil : </label></p>
                                                                    <?php
                                                                            if($donneesClient[3] == '1'){?>
                                                                                <input type="radio" name="etatCivil" id="etatCivil" value="Homme" checked>Homme&nbsp;&nbsp;&nbsp;
                                                                                <input type="radio" name="etatCivil" id="etatCivil" value="Femme">Femme<br> <?php
                                                                            }else{?>
                                                                                <input type="radio" name="etatCivil" id="etatCivil" value="Homme">Homme&nbsp;&nbsp;&nbsp;
                                                                                <input type="radio" name="etatCivil" id="etatCivil" value="Femme" checked>Femme<br> <?php
                                                                            }
                                                                    ?>				
                                                            </div>	
                                                            <div class="col-md-3">
                                                                    <p> <label for="" > Ville : </label></p>
                                                                    <input type="text" name="Ville" id="Ville" size="20" maxlength="50" value="<?php echo $donneesClient[5] ?>">
                                                                            <br><br>
                                                                    <p> <label for="" > Pays : </label></p>
                                                                    <input type="text" name="Pays" id="Pays" size="20" maxlength="20" value="<?php echo $donneesClient[6] ?>">	
                                                            </div>

                                                            <div class="col-md-3">
                                                                    <p> <label for="" > Rue : </label></p>
                                                                    <input type="text" name="Rue" id="Rue" size="20" maxlength="20" value="<?php echo $donneesClient[7] ?>" >
                                                                            <br><br>
                                                                    <p> <label for="" > Numero de porte : </label></p>
                                                                    <input type="tel" name="numero_porte" id="numero_porte" value="<?php echo $donneesClient[8] ?>">		
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br><br>
                                                                    <p> <label for="" > Code postal : </label></p>
                                                                    <input type="tel" name="Code_Postal" id="Code_Postal" size="20" maxlength="20" value="<?php echo $donneesClient[9] ?>">
                                                                            <br><br>
                                                                    <p> <label for="" > Mail : </label></p>
                                                                    <input type="text" name="Mail" id="Mail" size="20" maxlength="20" value="<?php echo $donneesClient[0] ?>">                                                                            
                                                                    
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br><br>
                                                                    <p> <label for="" > Mot de passe : </label></p>
                                                                    <input type="password" name="MDP" id="MDP" size="20" maxlength="20" required >  
                                                                    <br><br>
                                                                    <input type="submit" name="MajInfosPerso" id="Inscription" value="Mettre a jour mes informations">
                                                            </div>                                                             
                                                        </form>
                                                        <?php
                                                    } else if($cas=='CommandeClient'){
                                                    	header('Location: index.php?nav=ConsulterCommande'); 
                                                    }
                                                    
                                                ?>
                                            </div>
                                            
                                        </div>
			</div>	
		</div>
	</div>