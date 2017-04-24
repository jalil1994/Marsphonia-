
	<div id="pageSmartphones">
			<div id="content">
				<div class="container">
					<div class="row">
                                            <div class="col-md-12">
                                                <?php $BDD = connexionBDD();
                                                $infosTel = RecupInfoTel($tel, $BDD);
                                                ?>
                                                <img src="<?php echo $infosTel[9]?>" class="imgFicheTel">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="col-md-4">
                                                    <p>Marque : <?php echo $infosTel[2]?>.</p>
                                                    <p>Modèle : <?php echo $infosTel[0]?>.</p>
                                                    
                                                    <p>Couleur <?php echo $infosTel[1]?>.</p>
                                                    
                                                    <p>Taille de l'ecran : <?php echo $infosTel[3]?> pouces.</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                    if($infosTel[4] != 0){
                                                    ?><p>Edition limitée a <?php echo $infosTel[4]?> pièces.</p>
                                                    <?php } else {};?>
                                                    <p>Prix : <?php echo $infosTel[5]?>€.</p>
                                                    <p>Date de sortie : <?php echo $infosTel[6]?>.</p>
                                                    <p>Stock : <?php 
                                                    if($infosTel[7] > 0) {
                                                    	echo $infosTel[7]?> disponibles.</p><?php 
                                                    } else {
                                                    	echo 'En rupture de stock!';
                                                    }
                                                    ?>
                                                    <p>Fonctionalités : <?php echo $infosTel[8]?>.</p>
                                                </div>
                                                <?php
                                               if($_SESSION['numClient'] == 4){
                                               	
                                               } else {
                                               	if($infosTel[7] > 0) {
                                               	?>
	                                            <form method="post" action="index.php?nav=ajouterTelPanier&amp;IdTel=<?php echo($infosTel[10]);?>">	
													<div class="col-md-4">
														<br><br>
														<input type="submit" name="ajouterTelPanier" id="ajouterTelPanier" value="Ajouter au panier">
													</div>
	                                            </form>  
	                                      <?php }?>
	                                            <form method="post" action="index.php?nav=ajouterTelwishlist&amp;IdTel=<?php echo($infosTel[10]);?>">	
													<div class="col-md-4">
														<br><br>
														<input type="submit" name="ajouterTelwishlist" id="ajouterTelwishlist" value="Ajouter a la wishlist">
													</div>
	                                            </form>	                                            
	                                            <?php	
                                               }
                                               ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php include('V_Side.php'); ?>
                                            </div>

                                            
                                        </div>
			</div>	
		</div>
	</div>