<?php
class form {


	public function verif($nom, $message, $num, $mail, $ville){

		$valid = true;

		if(!isset($nom) && empty($nom)){
			$valid = false;
		}

		if(!isset($message) && empty($message)){
			$valid = false;
		}

		if(!isset($num) && empty($num)){
			$valid = false;
		}

		if(!isset($mail) && empty($mail)){
			$valid = false;
		}

		if($valid){
			// envoie mail


					$maildestinataire = 'stefangualandi@club-internet.fr'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			
			$message_txt = "$passage_ligne   Mme/Mr. $nom, a envoyer un message via le formulaire de contact de Marsphonia : $passage_ligne $passage_ligne $message $passage_ligne $passage_ligne Voila le mail pour le/la recontacter : $mail, ainsi que son numero de telephone : $num. $passage_ligne $passage_ligne Ville : $ville";
			//==========
			 
			//=====Création de la boundary.
			$boundary = "-----=".md5(rand());
			$boundary_alt = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Nouveau message depuis le formulaire de contact de Learn-English-83";
			//=========
			 
			// =====Création du header de l'e-mail.
			$header = "From: \"Formulaire contact Learn-English-83\"<stef.gualandi@gmail.com>".$passage_ligne;
			$header.= "Reply-to: \"$nom\" <$mail>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			// // ==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			 
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			 
			//=====On ferme la boundary alternative.
			$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
			//==========
			 
			 
			 
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			 

			// =====Envoi de l'e-mail.
			$sendmail = mail($maildestinataire,$sujet,$message,$header);
			if($sendmail){
				return true;
			} else {
				return false;
			}


		}else {
			return false;
		}

	}
}
?>