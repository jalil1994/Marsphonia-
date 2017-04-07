<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
?>

		<div id="pageajoutTel">

			<div id="content">
				<div class="container">
					<div class="row">
                                             <!-- choix du client + choix commande = fiche commande !-->
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