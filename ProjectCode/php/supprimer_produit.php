<?php 
session_start();
if (!isset($_SESSION['numProduit']))
{
  header("location:index.php");
}
//connexion a la base de donnée
                      require_once("connexionBase.php");
                      $sql="SELECT * FROM produit";
                      $requete=mysql_query($sql)  or die(mysql_error());
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <style>
 table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    color: black;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

   </style>
    
  </head>

<body>
 <header>	
			<div id="head">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a href="/Smartphonia/">
								<p>Marsphonia</p>
							</a>

						<div id='navigation'>
							<div  class="nav">
								<a href="/Smartphonia/">Accueil </a>								
								<a href="Smartphones.php">Smartphones</a>
								<a href="Panier.php">Panier</a>
								<a href="Connexion.php">Connexion</a>
								<a href="Inscription.php">Inscription</a>
								<a href="FAQ.php">FAQ</a>
							</div>
						</div>	
						</div>
					</div>
				</div>
			</div>
		</header>


			<aside>

				 <li class="sub-menu">
                     <a href="javascript:;" class="">
                         
                          <span>Gérer les produits </span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                     </a>
					 <ul class="sub">
                          <li><a class="" href="ajouter_produit.php">Ajouter</a></li>
                          <li><a class="" href="modifier_produit.php">Modifier</a></li>
                          <li><a class="" href="supprimer_produit.php">Supprimer </a></li>
                          <li><a class="" href="consulter_produit.php">la liste des produits</a></li>
                 	</ul>
                 </li>
      		</aside>




       <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
     
      <h1 style="color: black; text-align: center">
        supprimer un produit
      </h1></br>
<div style="overflow-x:auto;">
      <table  border="1" align="center" cellspacing="20" cellpadding="20">
    
    <tr>
    
       <th>numProduit</th>
     
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
     
     
    </tr>
 

                     
<?php                        
while( $result = mysql_fetch_assoc( $requete ) )
  {
  ?>
  
      <tr>
      <td ><?php echo($result['numProduit']);?></td>
      
      <td><?php echo($result['']);?></td>
      <td><?php echo($result['']);?></td>
      <td ><?php echo($result['']);?></td>
      <td ><?php echo ($result['']);?></td>
      <td ><?php echo($result['']);?></td>
      <td ><?php echo($result['']);?></td>
      <td><a href="supprimerunproduit.php?numProduit=<?php echo($result['numProduit']);?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce produit ? '));"> supprimer </a> </td>
      
       </tr>
  
  

  <?php
  }//fin if 
  ?>
 </table>

                      
                  </div>        
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

</body>
</html>


