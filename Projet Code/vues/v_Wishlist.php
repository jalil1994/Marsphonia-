
		<div id="pagePanier">
			<div id="content">
				<div class="container">
					<div class="row">
                                            
                                           <?php if( isset($_SESSION['numClient'])){ ?>
                                                <div class="col-md-8">
                                                    <p>Bonjour client <?php echo $_SESSION['numClient']?>, voici votre wishlist :</p>
                                                    <?php
                                                    include('vues/v_WishlistPerso.php');
                                                    ?> </div>
                                                    <div class="col-md-4">
                                                    <?php
	                                                    if(isset($infosTel)){
	                                                    	include('v_Side.php');
														}?>
                                                	</div>
                                               <?php }else{ ?>
                                               <div class="col-md-12">
                                                    <p>Veuillez vous connectez ou vous inscrire pour gérer votre wishlist :</p> <?php
                                                    include("vues/v_Connexion.php");
                                                    ?>  <hr/> <?php
                                                    include("vues/v_Inscription.php");
                                                }
                                                ?>
                                                </div>                                                                                         
                                            </div>
					</div>
				</div>
			</div>	