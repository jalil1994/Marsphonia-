<?php 
session_start();
if (! (isset($_SESSION['']))) 
{
   header("location:index.php");
}
 
//connexion a la base de donnée
                      require_once("connexionBase.php");
                      $sql="SELECT * FROM produit";
                      $requete=mysql_query($sql)  or die(mysql_error());
 ?>


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
      <section >
          
              
     <form method="post" action="modifier_produit.php">
      <table  border="0" align="center" cellspacing="10" cellpadding="10">
        <tr>
          <td>  <img src="" alt="" class="admin"/> </td>
          <td> <h1> Modifier un produit </h1> </td>
        </tr>
        <tr>
          <td> <label for="promotion" > promotion </label> </td>
          <td><input id="promotion" name="promotion" type="text" required=""  readonly="" value="<?php echo $rs['promo'] ?>" /> </td>
          </tr>
          
         <tr>
          <td> <label for="prixduproduit" > prix du produit </label> </td>
          <td><input id="prixduproduit" name="prixduproduit" type="text" required=""  value="<?php echo $rs['prixduproduit'] ?>"/> </td>
          </tr>
         <tr>
          <td><label for="quantite" class="pr"> quantité du produit </label> </td>
          <td> <input id="quantite" name="quantite" type="text" required="" value="<?php echo $rs['quantite'] ?>"/> </td>
          </tr>
        
        
         

       <tr>
        <td>    </td>
         <td> <input id="butV" value="Valider" type="submit"  onclick="return(confirm('Etes vous sûr de vouloir modifier ce produit ?'));" />    </td>
        </tr>  
              
          

          
        </form>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
                      
                  </div>        
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->


	<script>
  			$(function(){
  			    $('.nav').slicknav({
  			        prependTo: '#navigation'
  			    });
  			});
	</script>