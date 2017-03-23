
		<div id="pagemodifierTel">

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="index.php?nav=ModifierTel">
                                                    
                                                   <!-- choix du tel + page modif préremplie !: !-->

							<div class="col-md-3">
								<p> <label for="" > Marque : </label></p>
								<input type="text" name="Marque" id="Marque" size="20" maxlength="20" required >
									<br><br>
								<p> <label for="" > Prix : </label></p>
                                                                <input type="int" name="Prix" id="Prix" required >		
							</div>

							<div class="col-md-3">
								<p> <label for="" > Date de sortie : </label></p>
                                                                <input type="date" name="DateSortie" id="DateSortie" required >
									<br><br>
								<p> <label for="" > Stock : </label></p>
  								<input type="int" name="Stock" id="Stock" required >				
							</div>	

							<div class="col-md-3">
								<p> <label for="" > Fonctions : </label></p>
                                                                <input type="text" name="Fonctions" id="Fonctions" required >
									<br><br>
								<form action="upload.php" method="post" enctype="multipart/form-data">
                                                                    <p>Select image to upload:</p>
                                                                    <input type="file" name="photoTel" id="photoTel">
                                                                    <input type="submit" value="Upload Image" name="submit">
                                                                </form>	
							</div>

							<div class="col-md-3">
							<br><br>
									<input type="submit" name="ModifierTel" id="ModifierTel" value="Modifier">
							</div>

						</form>					 	
					</div>
				</div>
			</div>	

		</div>