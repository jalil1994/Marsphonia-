
	<div id="pageSmartphonesPlusVendus">
			<div id="content">
				<div class="container">
					<div class="row">						

                                  <div id="offres">
						<div class="col-md-4" >
                                                    <a href="index.php?nav=DerniersSmartphones" class="encours" >Derniers smartphones</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=SmartphonesMoinsChers" class="pasencours" >Smartphones les moins chers</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=Promo" class="pasencours" >Promos</a>
						</div>
						
					</div>
<!-- _______________________________________________________________________________________________________________ -->
                                            <?php 
                                                $BDD = connexionBDD();
                                                $DerniersTel = DerniersTel($BDD);
                                                for($i=0; $i<6; $i++){
                                                    $infosTel[$i] = RecupInfoTel($DerniersTel[$i][0], $BDD);
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
                                                                <p> <u>Sortit le <?php echo $infosTel[$i][6]?> : </u></p>
                                                                  <a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[$i][10]);?>">
                                                                    <img src="<?php echo $infosTel[$i][9]?>" class="imgFicheTel">
                                                                    <?php 
                                                                        if($infosTel[$i][11] !=0){
                                                                            $coef = 1 - ($infosTel[$i][11]/100);
                                                                            $prixBase =  $infosTel[$i][5] / $coef;
                                                                        }
                                                                    ?>
                                                                    <p><?php echo $infosTel[$i][0]?>, <?php echo $infosTel[$i][2]?> : 
                                                                        <?php 
                                                                            if($infosTel[$i][11]!=0){
                                                                                $coef = 1 - ($infosTel[$i][11] /100);
                                                                                $prixBase = $infosTel[$i][5] / $coef;
                                                                                ?> <span> <s> <?php echo $prixBase ?> €</s> </span> - <?php echo $infosTel[$i][11]?>% = <?php echo $infosTel[$i][5]?>€!</p>
                                                                      <?php } else {
                                                                                
                                                                                echo $infosTel[$i][5]?> € </p>
                                                                     <?php  }                                                                         
                                                                        ?>
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

