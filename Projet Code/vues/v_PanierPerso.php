<div class="col-md-12" id="PanierClient">

    <?php 
        $BDD = connexionBDD();
        if(isset($quantite)){
            $MajQte = MajQte($quantite, $numTel, $_SESSION['numClient'], $BDD );
        }
        $TelsClient = TelsClient($_SESSION['numClient'], $BDD);
        $pointsClient = pointsClient($_SESSION['numClient'], $BDD);
        if($TelsClient != 1){
            for($i=0; $i<sizeof($TelsClient); $i++){
                $infosTel[$i] = RecupInfoTel($TelsClient[$i][0], $BDD);
            }

    ?>
    
<table  border="1" align="center" cellspacing="20" cellpadding="20" class="col-md-12">
    
    <tr>
    
      <th>Marque</th>
      <th>Modèle</th>
      <th>Prix</th>
      <th>quantitée</th>
      <th>Supprimer</th>
   <?php   
$total=0;
for($i=0; $i<sizeof($infosTel); $i++) {
    $total = $total + ($infosTel[$i][5]*$TelsClient[$i][1]);
  ?>
  
    <tr>
      <td ><?php echo($infosTel[$i][2]);?></td>
      <td ><?php echo($infosTel[$i][0]);?></td>
      <td ><?php echo($infosTel[$i][5]);?></td>
      <td ><?php
        if(isset($quantite) && $numTel ==$infosTel[$i][10] ){
            if($MajQte == 0){
                echo ($quantite);
            } else {
                echo($TelsClient[$i][1]);
                ?> <p>Pas assez de stock disponible, il reste : <?php echo($MajQte)?> téléphones disponibles.</p><?php
            }
        } else {
            echo($TelsClient[$i][1]);
        } ?> <p>Quantitée souhaitée :</p>
        <form method="post" id="changerQuantite" action="index.php?nav=Panier">
            <input type="number" name="Quantite" id="PointsUtiliser" size="2">
            <input type="hidden" name="numTel" value="<?php echo($infosTel[$i][10]);?>" />
            <input type="submit" name="changerQuantite" id="changerQuantite" value="Ok">
        </form>
      </td>
      <td><a href="index.php?nav=SupprimerTelClient&amp;IdTel=<?php echo($infosTel[$i][10]);?>">Supprimer</a> </td>
    </tr>
      <?php 
      
  }
  $PointsGagner = $total/10;
  $infosTel[12]=$total;
  $_SESSION['infosTel']=$infosTel;
  ?>
 </table> 
    
    <p>Total : <?php echo($total)?> €.</p>
    <p>Cette commande vous rapporte : <?php echo($PointsGagner)?> points de fidelité.</p>
    <p>Vous disposez actuellement de : <?php echo($pointsClient[0])?> points de fidelité (1 point = 1€).</p>
    <p>Combien de points souhaiter utiliser pour cette commande ?</p>
    <form method="post" id="FormValiderPanier" action="index.php?nav=ValiderPanier">
        <input type="number" name="PointsUtiliser" id="PointsUtiliser" size="10">
        <input type="submit" name="FormValiderPanier" id="FormValiderPanier" value="Valider le panier et payer la commande">
    </form>
    <?php 
        } else {
            ?> <p> Votre panier est vide ! </p> <?php 
        }  
         ?>
</div>