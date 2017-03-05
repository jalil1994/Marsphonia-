<!DOCTYPE html>
<html lang="fr">
<head>

	<!-- menu responsive :  -->
        <link rel="stylesheet" href="slicknav/slicknav.css">
        <script src="js/jquery.js"></script>
        <script src="slicknav/jquery.slicknav.js"></script>


	<link rel="shortcut icon" type="image/x-icon" href="img/logo3.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="stylelearn.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<title>Inscription</title>
							
</head>
<body>
	<div id="page">
		<div id="pagecontact">
<?php include('header.php'); ?>

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="#">

							<div class="col-md-3">
								<p> <label for="" > Nom : </label></p>
								<input type="text" name="Nom" id="Nom" size="20" maxlength="20" required >
									<br><br>
								<p> <label for="" > Telephone : </label></p>
								<input type="number" name="Telephone" id="Telephone" required >		
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
								<input type="text" name="Mail" id="Mail" size="30" maxlength="50" required >
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
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer">
							<p>© Smartphonia</p>
						</div>
					</div>
				</div>
			</div>	
		</footer>
		</div>
	</div>
</body>
</html>