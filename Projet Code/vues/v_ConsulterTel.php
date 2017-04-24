<?php
if( isset($_SESSION['numClient'])){
    if($_SESSION['numClient'] == 4){
?>
        
		<div id="pageajoutTel">

			<div id="content">
				<div class="container">
					<div class="row">
                                                    <!-- choix du tel + btn suppr tel !-->
                                                    
                                                    <?php 
                                                        $BDD = connexionBDD();
                                                        $infosTel = Tels($BDD);
                                                        $nbTel = nbTel($BDD);
                                                        ?>
<table  border="1" align="center" cellspacing="20" cellpadding="20" class="col-md-12">
    
    <tr>
    
      <th>Numero</th>
      <th>Nom</th>
      <th>Ventes</th>
      <th>Promo</th>
      <th>Couleur</th>
      <th>Marque</th>
      <th>Ecran</th>
      <th>Edition limitée</th>     
      <th>Prix</th>
      <th>Date sortie</th>
      <th>quantite</th>
      <th>Fonctionnalités</th>
      <th>Modifier</th>
      <th>Supprimer</th>
      <th>Promo(%)</th>
    </tr>
    
<?php   
$i=0;
while ($i<$nbTel[0]) {
  ?>
  
    <tr>
      <td ><?php echo($infosTel[$i][0]);?></td>
      <td ><a href="index.php?nav=FicheTel&amp;IDTel=<?php echo($infosTel[$i][0]);?>"><?php echo($infosTel[$i][1]);?></a></td>
      <td ><?php echo($infosTel[$i][2]);?></td>
      <td ><?php echo($infosTel[$i][3]);?></td>
      <td ><?php echo($infosTel[$i][4]);?></td>
      <td ><?php echo($infosTel[$i][5]);?></td>
      <td ><?php echo($infosTel[$i][6]);?></td>
      <td ><?php echo($infosTel[$i][7]);?></td>
      <td ><?php echo($infosTel[$i][8]);?></td>
      <td ><?php echo($infosTel[$i][9]);?></td>
      <td ><?php if($infosTel[$i][10] == '0'){
      	echo '<p class="red2">Rupture de stock!</p>';
      } else {
      	echo($infosTel[$i][10]);
	  }?></td>
      <td ><?php echo($infosTel[$i][11]);?></td>
      <td><a href="index.php?nav=ModifierTel&amp;IdTel=<?php echo($infosTel[$i][0]);?>">Modifier</a> </td>
      <td><a href="index.php?nav=SupprimerTel&amp;IdTel=<?php echo($infosTel[$i][0]);?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet article ? '));"> Supprimer </a> </td>
      <td>
          <form method="post" id="MajPromo" action="index.php?nav=AjoutPromo&amp;IdTel=<?php echo($infosTel[$i][0]);?>">
            <input type="text" name="Promo" id="Promo" size="2" maxlength="99" placeholder="%">
            <input type="submit" name="AjoutPromo" id="AjoutPromo" value="OK">
          </form>	
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
    }else {
        header('Location: index.php?nav=Accueil');            
    }
}else{
        header('Location: index.php?nav=Accueil');            
}
?>