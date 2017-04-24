<div class="col-md-12" id="wishlistClient">

    <?php 
    // refaire toutes fonctions
        $BDD = connexionBDD();
        if(isset($quantiteW)){
            $MajQteW = MajQteW($quantiteW, $numTelW, $_SESSION['numClient'], $BDD );
        }
        $TelsClientW = TelsClientW($_SESSION['numClient'], $BDD);
        
        if($TelsClientW != 1){
            for($i=0; $i<sizeof($TelsClientW); $i++){
                $infosTelW[$i] = RecupInfoTel($TelsClientW[$i][0], $BDD);
            }
            $wishlistClient = VerifExisteWishlistClient($_SESSION['numClient'], $BDD);
    ?>
   
<a href="index.php?nav=Wishlist&amp;wishlist=<?php echo($wishlistClient[0]);?>">Supprimer ma wishlist</a> 
    
<table  border="1" align="center" cellspacing="20" cellpadding="20" class="col-md-12">
    
    <tr>
    
      <th>Marque</th>
      <th>Modèle</th>
      <th>Prix</th>
      <th>quantitée</th>
      <th>Supprimer</th>
   <?php   
$totalW=0;
for($i=0; $i<sizeof($infosTelW); $i++) {
    $totalW = $totalW + ($infosTelW[$i][5]*$TelsClientW[$i][1]);
  ?>
  
    <tr>
      <td ><?php echo($infosTelW[$i][2]);?></td>
      <td ><a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[$i][0]);?>"><?php echo($infosTel[$i][0]);?></a></td>
      <td ><?php echo($infosTelW[$i][5]);?></td>
      <td ><?php
        if(isset($quantiteW) && $numTelW ==$infosTelW[$i][10] ){
            if($MajQteW == 0){
                echo ($quantiteW);
            } else {
                echo($TelsClientW[$i][1]);
                ?> <p>Pas assez de stock disponible, il reste : <?php echo($MajQteW)?> téléphones disponibles.</p><?php
            }
        } else {
            echo($TelsClientW[$i][1]);
        } ?> <p>Quantitée souhaitée :</p>
        <form method="post" id="changerQuantite" action="index.php?nav=Wishlist">
            <input type="number" name="Quantite" id="PointsUtiliser" size="2">
            <input type="hidden" name="numTel" value="<?php echo($infosTelW[$i][10]);?>" />
            <input type="submit" name="changerQuantite" id="changerQuantite" value="Ok">
        </form>
      </td>
      <td><a href="index.php?nav=SupprimerTelClientW&amp;IdTel=<?php echo($infosTelW[$i][10]);?>">Supprimer</a> </td>
    </tr>
      <?php  
  }

  ?>
 </table> 
    <?php 
      	$PointsGagner = $totalW/10;
      	?>
	    <p>Total : <?php echo($totalW)?> €.</p>
	    <p>Cette commande vous rapportera : <?php echo($PointsGagner)?> points de fidelité.</p>  	
		<a href="index.php?nav=Panier&amp;wishlist=<?php echo($wishlistClient[0]);?>">Transferer vers mon panier</a>	    
      <?php
      } else{
   		?>
   		<p> Votre wishlist est vide ! </p>
      <?php 
      }
  ?>          
</div>