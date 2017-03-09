<?php session_start(); ?>
<?php require('class.form.php') ?>
<?php 

		if(isset($_POST['captcha'])){
			$captcha = md5($_POST['captcha']);
				if($captcha == $_POST['key']){
					$verifcaptcha = true;
					$verifcaptcha2 = true;
					$envoiform = false;
				} else {
		    		$verifcaptcha = false;
					$verifcaptcha2 = false;
					$Erreurcaptcha = '<p>Veuillez re-remplir le captcha.</p>';
				}
		} else { 
			$verifcaptcha = false;
			$verifcaptcha2 = true;
			$Erreurcaptcha = '<p>Veuillez re-remplir le captcha.</p>';
		}

		if($_POST){

				$form = new form();

				if(isset($_POST['nom'] ) && isset( $_POST['message'] ) && isset( $_POST['num'] ) && isset( $_POST['mail'])){
				
					$isOk = $form->verif($_POST['nom'], $_POST['message'], $_POST['num'], $_POST['mail'], $_POST['ville']);
		
					if($isOk){
						$messageSucces = '<p>Votre message a été envoyé.</p>';
					} else {
						$messageErreur = "<p>Tous les champs n'ont pas été correctement remplis ou l'email n a pas put s'envoyé.</p>";
					}
 				} else{	
				}

		}



 ?>

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
    <link href="captcha.php">



    <meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<title>Formulaire</title>
				
	<!-- META : DESCRIPTION + KEYWORD : -->

	<meta name="keywords" content="cours anglais hyères, formation continue anglais hyères, formation anglais var, apprendre l'anglais, formatrice anglais, DIF anglais hyères, plan de formation anglais, CIF anglais, anglais pour demandeur d'emploi var, cherche cours anglais 83, soutien scolaire anglais, accompagnement scolaire anglais hyères, professeur anglais hyères, stage anglais, préparer examen anglais, TOEIC, TOEFL, formation prise en charge anglais">
	<meta name="description" content="cours anglais hyères, formation continue anglais hyères, formation anglais var, apprendre l'anglais, formatrice anglais, DIF anglais hyères, plan de formation anglais, CIF anglais, anglais pour demandeur d'emploi var, cherche cours anglais 83, soutien scolaire anglais, accompagnement scolaire anglais hyères, professeur anglais hyères, stage anglais, préparer examen anglais, TOEIC, TOEFL">
	
	<!-- META : URL, TITLE, FRANCE: -->
	
	<meta property="og:url" content="http://stefangualandi.fr.cr/Formulaire.php">
	<meta property="og:title" content="Formulaire">
	<meta property="business:contact_data:country_name" content="France">
</head>
<body>
	<div id="page">
	<div id="pageForm">

<?php include('header.php'); ?>



			<div id="content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<p class="titre2">Vous avez des questions ?</p> <br>
						<?php if(!empty($messageErreur)) echo $messageErreur; ?>
						<hr>
						<br>
						</div>
					<?php if(empty($messageSucces)): ?>
					<?php if($verifcaptcha): ?>
						<form method="post" action="#">
						<div class="col-md-4">
								
							   <p><label for="">Votre message : <span class="etoile">*</span> </label> <p/>
							   	<textarea autofocus type="text" name="message" id="message" rows="11" cols="40" required  ></textarea></p>
						</div>

						<div class="col-md-4">
									<p> <label for="" > Votre nom : <span class="etoile">*</span></label></p>
								<input type="text" name="nom" id="nom" size="30" required >
									<br><br>
								<p> <label for="" > Ville : </label></p>
								<input type="text" name="ville" id="ville" size="30">
						</div>

						<div class="col-md-4">
									<p> <label for="" > Votre numéro de telephone : <span class="etoile">*</span></label></p>
								<input type="number" name="num" id="num" size="30" maxlength="30" required >
								<br><br>
								<p> <label for="" > Votre adresse mail : <span class="etoile">*</span></label></p>
								<input type="email" name="mail" id="mail" size="30" required >
						
						</div>
						<?php endif; ?>



<!--________________ CAPTCHA________________ -->

					<?php if(!$verifcaptcha): ?>

						<form method="post" action="#"> 
						<div class="col-md-4">
						<?php require('captcha.php'); ?>
						<br><br>
							
						<label> <p>Recopiez le mot "<?php echo $captcha = captcha(); ?>" : <span class="etoile">*</span></p></label>
						<input type="hidden" name="key" value="<?php echo md5($captcha); ?>">
						<input type="text" name="captcha" id="captcha" size="15" required>
						<br> <p class="red3">ATTENTION AUX MAJUSCULES</p>
						<br> <p><label for="" >Les champs <span class="etoile">*</span> sont obligatoires.</label></p>
						</div>
						
						<div class="col-md-2">		
						<br><br>				
						<input type="submit" name="verif" id="verif" value="Verifier le captcha et acceder au formulaire">
						</div>
						<div class="col-md-12">
							<?php if(!$verifcaptcha2): ?>
							<?php echo $Erreurcaptcha; ?>
							<?php endif; ?>
						</div>
						</form>

							
					<?php endif; ?>


						<?php if($verifcaptcha): ?>
						 <p><label for="" > <br>Les champs <span class="etoile">*</span> sont obligatoires.</label></p>
								<div class="col-md-2">		
								<br><br>
								<input type="submit" name="envoyer" id="envoyer" value="Envoyer le formulaire">
								</div>
						<?php endif; ?>

					</form>
				<?php else: ?>
				<div class="col-md-12">
					
					<?php echo $messageSucces; ?>

				</div>

				<?php endif; ?>
					</div>
				</div>
			</div>	
<?php include('footer.php'); ?>
	</div>
	</div>
</body>
</html>