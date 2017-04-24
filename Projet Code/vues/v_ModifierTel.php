

<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
        $BDD=connexionBDD();
        $donnees = RecupInfoTel($numTel, $BDD);
?>
        
		<div id="pageajoutTel">

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="index.php?nav=VerifModifierTel&amp;IdTel=<?php echo($donnees[10]);?>">
                                                    <div class="col-md-12"> 
							<div class="col-md-4">
                                                            <p> <label for="" > Nom : </label></p>
								<input type="text" name="Nom" id="Nom" size="20" maxlength="20" value="<?php echo $donnees[0] ?>" required >
                                                                <br><br>
								<p> <label for="" > Marque : </label></p>
								<input type="text" name="Marque" id="Marque" size="20" maxlength="20" value="<?php echo $donnees[2] ?>" required >
							</div>

							<div class="col-md-4">
								<p> <label for="" > Date de sortie : </label></p>
                                                                <input type="date" name="DateSortie" id="DateSortie" value="<?php echo $donnees[6] ?>" required >
									<br><br>
								<p> <label for="" > Stock : </label></p>
                                                                <input type="number" name="Stock" id="Stock" value="<?php echo $donnees[7] ?>" required >
                                                                <br><br>
							</div>	

							<div class="col-md-4">
								<p> <label for="" > Fonctions : </label></p>
                                                                <input type="text" name="Fonctions" id="Fonctions" value="<?php echo $donnees[8] ?>" required >
							<br><br>
                                                            <p> <label for="" > Ecran : </label></p>
                                                                <input type="text" name="Ecran" id="Ecran" value="<?php echo $donnees[3] ?>" required >                                                                
							</div>
                                                    </div>
                                                    
                                                    <div class="col-md-12"> 
							<div class="col-md-4">
                                                            <p> <label for="" > Couleur : </label></p>
                                                                <input type="text" name="Couleur" id="Couleur" value="<?php echo $donnees[1] ?>" required >

							</div>
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Edition limitée : </label></p>
                                                                <input type="radio" name="editionLimite" id="editionLimite" value="Oui" <?php 
                                                                    if($donnees[4] != 0){
                                                                        ?>checked ><?php
                                                                    } else{
                                                                        ?> > <?php
                                                                    } ?> Oui&nbsp;&nbsp;&nbsp;
  																<input type="radio" name="editionLimite" id="editionLimite" value="Non" <?php
                                                                if($donnees[4] == 0) {
                                                                    ?>checked ><?php
                                                                } else{
                                                                    ?> > <?php
                                                                } ?> Non<br>
                                                                <input type="number" name="nbeditionLimite" id="nbeditionLimite"  <?php if($donnees[4] == 0){
                                                                    ?>><?php 
                                                                } else {
                                                                    ?> value="<?php echo $donnees[4] ?>" > <?php 
                                                                } ?>
							</div>
                                                        
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Prix : </label></p>
                                                            <input type="number" name="Prix" id="Prix" value="<?php echo $donnees[5] ?>" required >
                                                                <br><br>
                                                                <input type="submit" name="ModifTel" id="ModifTel" value="Modifier le telephone">
                                                        </div>
                                                    </div>
						</form>					 	
					</div>
				</div>
			</div>	

		</div>        
        
        
<?php        
    } else {
        header('Location: index.php?nav=Accueil');            
    }
}else{
        header('Location: index.php?nav=Accueil');            
}
?>