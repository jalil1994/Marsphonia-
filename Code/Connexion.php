<!DOCTYPE html>
<html lang="fr">
<head>

	<!-- menu responsive :  -->
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="slicknav/slicknav.css">
        <script src="slicknav/jquery.slicknav.js"></script>


	<link rel="shortcut icon" type="image/x-icon" href="img/logo3.png" />
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="stylelearn.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="js/script.js"></script>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<title>Connexion</title>

</head>
<body>
	<div id="page">
		<div id="pagereferences">
<?php include('header.php'); ?>

			<div id="content">
				<div class="container">
					<div class="row">
						<form method="post" action="VerifConnexion.php">
							<div class="col-md-4">
								<p> <label for="" > Mail :</label></p>
								<input type="text" name="Mail" id="Mail" size="30" required >
									<br><br>
							</div>
							<div class="col-md-4">
								<p> <label for="" > Mot de passe :</label></p>
								<input type="text" name="MDP" id="MDP" size="20" required >
									<br><br>
							</div>	
							<div class="col-md-4">
									<br><br>
									<input type="submit" name="connexion" id="connexion" value="connexion">
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
</body>
</html>