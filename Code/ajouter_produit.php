
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
          
                           
                            
     
     <form method="post" action="ajouterunproduit.php">
      <table  border="0" align="center" cellspacing="10" cellpadding="10">
        <tr>
          <td>  <img src="" alt="" class="admin"/> </td>
          <td> <h1> Ajouter un produit </h1> </td>
        </tr>
        
        <tr>
          <td> <label for="nom" > numéro du produit </label> </td>
          <td><input id="nom" name="ref" type="text" required="" /> </td>
        </tr>
          
        
         <tr>
          <td> <label for="tele"> Quantité</label></td>
          <td> <input id="tele" name="quantite" type="number" required="" />  </td>
         </tr>
        
        <tr>
          <td><label for="email" class="pr"> Fonctionnalitées </label>   </td>
          <td><input id="email" name="origine" type="text"/>  </td>
        </tr> 
          <tr>
          <td>  <label for="adr"> Prix </label>  </td>
          <td> <input id="adr" name="prix" type="text" required="" />  </td>
        </tr> 
        
        <tr>
          <td>   <label for="type" class="pr"  > Marque </label></td>

          <td> <input id="adr" name="dim" type="text"  required="" /> 
        </td>
    
    <tr>
          <td>   <label for="type" class="pr"  > Couleur </label></td>
          <td> <input id="adr" name="dim" type="text"  required="" /> 
        </td>

        <tr>

          <td>   <label for="type" class="pr"  > Ecran </label></td>
          <td> <input id="adr" name="dim" type="text"  required="" /> 
        </td>

        <tr>
          <td>   <label for="type" class="pr"  > Edition Limité </label></td>
          <td> <input id="adr" name="dim" type="text"  required="" /> 
        </td>

         <tr>
          <td>   <label for="type" class="pr"  > Date de sortie </label></td>
          <td> <input id="adr" name="dim" type="text"  required="" /> 
        </td>


         <tr>
            <td>  <input id="buts" value="Réinitialiser" type="reset"/> </td>
            <td> <input id="butV" value="Valider" type="submit"  onclick="return(confirm('Etes vous sûr de vouloir ajouter un produit'));"/>    </td>
         </tr> 

  </select>


  <script>
        $(function(){
            $('.nav').slicknav({
                prependTo: '#navigation'
            });
        });
  </script>