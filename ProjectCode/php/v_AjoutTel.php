
		<div id="pageajoutTel">

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="index.php?nav=VerifAjouterTel">
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
                                                                    <p>Ajouter une image : </p>
                                                                    <input type="file" name="photoTel" id="photoTel">
							</div>
                                                    </div>
                                                    
                                                    <div class="col-md-12"> 
							<div class="col-md-4">
                                                            <p> <label for="" > Couleur : </label></p>
                                                                <input type="text" name="Couleur" id="Couleur" required >
							<br><br>
                                                            <p> <label for="" > Ecran : </label></p>
                                                                <input type="text" name="Ecran" id="Ecran" required >
							</div>
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Edition limitée : </label></p>
                                                                <input type="radio" name="editionLimite" id="editionLimite" value="Oui" >Oui&nbsp;&nbsp;&nbsp;
  								<input type="radio" name="editionLimite" id="editionLimite" value="Non" checked>Non<br>
                                                                <input type="number" name="nbeditionLimite" id="nbeditionLimite" disabled >
							</div>
                                                        
                                                        <script>
                                                            document.getElementById('editionLimite').onchange = function(){
                                                                document.getElementById('nbeditionLimite').disabled= !this.checked;
                                                            }
                                                        </script>
                                                    
                                                        <div class="col-md-4">
                                                            <p> <label for="" > Prix : </label></p>
                                                            <input type="number" name="Prix" id="Prix" required >
                                                                <br><br>
                                                                <input type="submit" name="AjoutTel" id="AjoutTel" value="Ajouter le telephone" onclick="return(confirm('Etes-vous sur de vouloir ajouter ce produit ?'));">
                                                            <input type="reset" id="reset" value="Réinitialiser">
                                                        </div>
                                                    </div>
						</form>					 	
					</div>
				</div>
			</div>	

		</div>