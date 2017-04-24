<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
    	
     $BDD = connexionBDD();
     $infosCommande = Commandes($BDD);
     $nbCommandes= nbCommandes($BDD);
     
    }else {
    	
    	$BDD = connexionBDD();
    	$infosCommande = CommandesClient($_SESSION['numClient'], $BDD);
    	$nbCommandes= nbCommandesClient($_SESSION['numClient'], $BDD);
    } 
?>
        
		<div id="ConsulterCommande">

			<div id="content">
				<div class="container">
					<div class="row">
<table  border="1" align="center" cellspacing="10" cellpadding="10" class="col-md-12">
    
    <tr>
      <th>Commande</th>    
      <th>Nom du client</th>
      <th>Date</th>
      <th>Prix total</th>
      <th>Confirmation de paiement</th>
    </tr>
    
<?php   
$i=0;
while ($i<$nbCommandes[0]) {
  ?>
  
    <tr>
<td><a href="index.php?nav=AfficheCommande&amp;IdCommande=<?php echo($infosCommande[$i][4]);?>">Afficher la commande <?php echo($infosCommande[$i][4]);?></a> </td>
      <td ><?php echo($infosCommande[$i][3]);?></td>
      <td ><?php echo($infosCommande[$i][2]);?></td>
      <td ><?php echo($infosCommande[$i][1]);?></td>
      <td ><?php
      		if($infosCommande[$i][0] == '1'){
      			echo 'oui';
      		} else {
	        	echo 'non';
      		}
	      ?>
	  </td>
    </tr>
      <?php $i++;
  } 
  ?>
 </table>                                                        
					</div>
				</div>
			</div>	

		</div>

<?php        

}else{
        header('Location: index.php?nav=Accueil');            
}
?>