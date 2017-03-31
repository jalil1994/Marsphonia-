<?php require('include/class.form.php') ;
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
	<title>Formulaire</title>
				
<body>
	<div id="page">
	<div id="pageForm">

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

						 <p><label for="" > <br>Les champs <span class="etoile">*</span> sont obligatoires.</label></p>
								<div class="col-md-2">		
								<br><br>
								<input type="submit" name="envoyer" id="envoyer" value="Envoyer le formulaire">
								</div>
					</form>
				<div class="col-md-12">
					
					<?php echo $messageSucces; ?>

				</div>

					</div>
				</div>
			</div>	
