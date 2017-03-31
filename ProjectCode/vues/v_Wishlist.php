
		<div id="pageWhishlist">
			<div id="content">
				<div class="container">
					<div class="row">
                                            
                                           <?php if( isset($_SESSION['numClient'])){ ?>
                                                <div class="col-md-4">	
                                                    <?php include('v_Side.php'); ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php
                                                    include('vues/v_WhishlistPerso.php');
                                                }else{
                                                    ?> <p>Veuillez vous connectez ou vous inscrire pour acceder a votre Whishlist :</p> <?php
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