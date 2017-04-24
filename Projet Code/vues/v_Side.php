<div class="col-md-12" id="actu">
	<hr/>
	<p>Telephone qui pourrait vous intérrésser :</p>
	<?php
	if($nav != "FicheTel"){
      $prix = $infosTel[0][5];
      $BDD = connexionBDD();
      $TelProbable = TelProbable($prix, $BDD);
      $infosTel[0] = RecupInfoTel($TelProbable, $BDD);
	} else {
		$prix = $infosTel[5];
		$BDD = connexionBDD();
		$TelProbable = TelProbable($prix, $BDD);
		$infosTel[0] = RecupInfoTel($TelProbable, $BDD);
	}
    ?>
<a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[0][10]);?>">
      <img src="<?php echo $infosTel[0][9]?>" class="imgFicheTel">
      <p><?php echo $infosTel[0][0]?>, <?php echo $infosTel[0][2]?> : <?php echo $infosTel[0][5]?>€</p>
</a>    
	<hr/>
</div>