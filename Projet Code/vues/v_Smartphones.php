
	<div id="pageSmartphones">
			<div id="content">
				<div class="container">
					<div class="row">						

                                            <div id="offres">
						<div class="col-md-4" >
							<a href="index.php?nav=DerniersSmartphones" class="pasencours" >Derniers smartphones</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=SmartphonesMoinsChers" class="pasencours" >Smartphones les moins chers</a>
						</div>
						<div class="col-md-4">
							<a href="index.php?nav=Promo" class="pasencours" >Promos</a>
						</div>
						
						<div class="col-md-12 hr">
                                                    <br><br><br>	
                                                    <hr/>
                                                    <p>Nos trois Smartphones les plus vendus : </p>
                                                    <br>
						</div>
					</div>
                                            <?php 
                                                $BDD = connexionBDD();
                                                $TelPlusVendus = TelPlusVendus($BDD);
                                                $infosTel[0] = RecupInfoTel($TelPlusVendus[0][0], $BDD);
                                                $infosTel[1] = RecupInfoTel($TelPlusVendus[1][0], $BDD);
                                                $infosTel[2] = RecupInfoTel($TelPlusVendus[2][0], $BDD);
                                            ?>
						<div class="col-md-4">
						<a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[0][10]);?>">
                                                    <img src="<?php echo $infosTel[0][9]?>" class="imgFicheTel">
                                                    <p><?php echo $infosTel[0][0]?>, <?php echo $infosTel[0][2]?> : <?php echo $infosTel[0][5]?>€</p>
                                                </a>
						</div>
						<div class="col-md-4">	
						<a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[1][10]);?>">
                                                    <img src="<?php echo $infosTel[1][9]?>" class="imgFicheTel">
                                                    <p><?php echo $infosTel[1][0]?>, <?php echo $infosTel[1][2]?> : <?php echo $infosTel[1][5]?>€</p>
                                                </a>
						</div>
						<div class="col-md-4">	
						<a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[2][10]);?>">
                                                    <img src="<?php echo $infosTel[2][9]?>" class="imgFicheTel">
                                                    <p><?php echo $infosTel[2][0]?>, <?php echo $infosTel[2][2]?> : <?php echo $infosTel[2][5]?>€</p>
                                                </a>
						</div>												
                                        </div>
			</div>	
		</div>
	</div>