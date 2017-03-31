
		<div id="pagecontact">

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="index.php?nav=InscriptionClient">

							<div class="col-md-3">
								<p> <label for="" > Nom : </label></p>
								<input type="text" name="Nom" id="Nom" size="20" maxlength="20" required >
									<br><br>
								<p> <label for="" > Telephone : </label></p>
                                                                <input type="tel" name="Telephone" id="Telephone" required >		
							</div>

							<div class="col-md-3">
								<p> <label for="" > Prenom : </label></p>
								<input type="text" name="Prenom" id="Prenom" size="15" maxlength="30" required >
									<br><br>
								<p> <label for="" > Etat civil : </label></p>
								<input type="radio" name="etatCivil" id="etatCivil" value="Homme" checked>Homme&nbsp;&nbsp;&nbsp;
  								<input type="radio" name="etatCivil" id="etatCivil" value="Femme">Femme<br>				
							</div>	

							<div class="col-md-3">
								<p> <label for="" > Mail : </label></p>
                                                                <input type="email" name="Mail" id="Mail" size="30" maxlength="50" required >
									<br><br>
								<p> <label for="" > Mot de passe : </label></p>
								<input type="password" name="MDP" id="MDP" size="20" maxlength="20" required >	
							</div>

							<div class="col-md-3">
							<br><br>
									<input type="submit" name="Inscription" id="Inscription" value="Inscription">
							</div>

						</form>					 	
					</div>
				</div>
			</div>	

		</div>