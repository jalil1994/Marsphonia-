
	<div id="pagePromo">
			<div id="content">
				<div class="container">
					<div class="row">						

                                            <div id="offres">
						<div class="col-md-4" >
							<a href="index.php?nav=SmartphonesPlusPopulaires" class="pasencours" >Smartphones les plus populaires</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=SmartphonesMoinsChers" class="pasencours" >Smartphones les moins chers</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=Promo" class="encours" >Promos</a>
						</div>
                                                
                                            </div>
<!-- _______________________________________________________________________________________________________________ -->
                                            <?php 
                                                $BDD = connexionBDD();
                                                $TelPromo = TelPromo($BDD);
                                                for($i=0; $i<sizeof($TelPromo); $i++){
                                                   $infosTel[$i] = RecupInfoTel($TelPromo[$i][0], $BDD);
                                                }
                                            
                                                for($i=0; $i<sizeof($infosTel);){
                                                    ?><div class="col-md-12 hr">
                                                    <br><br><br>
                                                        <hr/>
                                                    <!-- _______________________________________________________________________________________________________________ -->                                                    
                                                    </div> <?php
                                                    for($j=0; $j<3; $j++){
                                                        if(isset($infosTel[$i])){
                                                            ?>
                                                            <div class="col-md-4">
                                                                  <a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[$i][10]);?>">
                                                                    <img src="<?php echo $infosTel[$i][9]?>" class="imgFicheTel">
                                                                    <?php 
                                                                        $coef = 1 - ($infosTel[$i][11]/100);
                                                                        $prixBase =  $infosTel[$i][5] / $coef;
                                                                    ?>
                                                                    <p><?php echo $infosTel[$i][0]?>, <?php echo $infosTel[$i][2]?> : <span> <s> <?php echo $prixBase?> €</s> </span> - <?php echo $infosTel[$i][11]?>% = <?php echo $infosTel[$i][5]?>€!</p>
                                                                </a>
                                                            </div>
                                                            <?php
                                                            $i++;
                                                        } else {
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
					</div>
			</div>	
		</div>
	</div>