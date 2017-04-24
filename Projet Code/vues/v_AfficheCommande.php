		<div id="ConsulterCommande">

			<div id="content">
				<div class="container">
					<div class="row">

    <?php 
        $BDD = connexionBDD();

        $TelsCommande= TelsCommande($idCommande, $BDD);
        $infosCommande = infosCommande($idCommande, $BDD);
    ?>
    
<table  border="1" align="center" cellspacing="20" cellpadding="20" class="col-md-12">
    
    <tr>
    
      <th>Marque</th>
      <th>Modèle</th>
      <th>Prix</th>
      <th>quantitée</th>
    </tr>
   <?php   
$total=0;
for($i=0; $i<sizeof($TelsCommande); $i++) {
  ?>
    <tr>
      <td ><?php echo($TelsCommande[$i][2]);?></td>
      <td ><?php echo($TelsCommande[$i][0]);?></td>
      <td ><?php echo($TelsCommande[$i][5]);?></td>
      <td ><?php echo($TelsCommande[$i][7]);?></td>
    </tr>
      <?php 
  }

  ?>
 </table>

  <?php 
  $PointsGagner = $infosCommande[1]/10;
  echo 'Total = '.$infosCommande[1].'€'; ?><br> <?php
	echo 'Points gagnés ='.$PointsGagner; ?><br> <?php
	?>
	
 <table  border="1" align="center" cellspacing="20" cellpadding="20" class="col-md-12">
    
    <tr>
    
      <th>Nom Client</th>
      <th>Rue</th>
      <th>Ville</th>
      <th>Numero de porte</th>
      <th>date de la commande</th>
      <th>Confirmation de paiement</th> 
      <th>Prix total</th> 
    </tr>    

    <tr>
      <td ><?php echo($infosCommande[3]);?></td>
	  <td ><?php echo($infosCommande[4]);?></td> 
	  <td ><?php echo($infosCommande[5]);?></td> 
	  <td ><?php echo($infosCommande[6]);?></td> 
	  <td ><?php echo($infosCommande[2]);?></td> 
	  <td ><?php echo($infosCommande[0]);?></td> 
	  <td ><?php echo($infosCommande[1]);?></td> 	  	  	  	  	       
    </tr>

 </table> 
  

					</div>
				</div>
			</div>
		</div>	