

<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
?>
        
		<div id="pageajoutTel">

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" id="FormAjoutTel" action="index.php?nav=VerifAjouterTel" enctype="multipart/form-data">
                                                    <div class="col-md-12"> 
							<div class="col-md-4">
                                                            <p> <label for="" > Nom : </label></p>
								<input type="text" name="Nom" id="Nom" size="20" maxlength="20" required >
                                                                <br><br>
								<p> <label for="" > Marque : </label></p>
								<input type="text" name="Marque" id="Marque" size="20" maxlength="20" required >
							</div>

							<div class="col-md-4">
								<p> <label for="" > Date de sortie : </label></p>
                                                                <input type="date" name="DateSortie" id="DateSortie" required >
									<br><br>
								<p> <label for="" > Stock : </label></p>
                                                                <input type="number" name="Stock" id="Stock" required >
                                                                <br><br>
							</div>	

							<div class="col-md-4">
								<p> <label for="" > Fonctions : </label></p>
                                                                <input type="text" name="Fonctions" id="Fonctions" required >
							<br><br>
                                                            <p> <label for="" > Ecran : </label></p>
                                                                <input type="number" step="0.1" name="Ecran" id="Ecran" required >                                                                
							</div>
                                                    </div>
                                                    
                                                    <div class="col-md-12"> 
							<div class="col-md-4">
                                                            <p> <label for="" > Couleur : </label></p>
                                                                <input type="text" name="Couleur" id="Couleur" required >

							</div>
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Edition limitée : </label></p>
                                                                <input  type="radio" name="editionLimiteO" id="editionLimite" value="Oui" >Oui&nbsp;&nbsp;&nbsp;
  																<input  type="radio" name="editionLimiteN" id="editionLimite" value="Non" checked="checked">Non<br>
                                                                <input type="number" name="nbeditionLimite" id="nbeditionLimite"  >
														</div>
                                                        
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Prix : </label></p>
                                                            <input type="number" name="Prix" id="Prix" required >
                                                                <br><br>
                                                                <input type="submit" name="AjoutTel" id="AjoutTel" value="Ajouter le telephone">
                                                            <input type="reset" id="reset" value="Réinitialiser">
                                                        </div>
                                                    </div>
						</form>					 	
					</div>
				</div>
			</div>	

		</div>        
        
        
<?php        
    }else {
        header('Location: index.php?nav=Accueil');            
    }
}else{
        header('Location: index.php?nav=Accueil');            
}
?>