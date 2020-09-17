<header>

<nav class="navbar navbar-expand-md navbar-dark bg-dark"> 
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2"> 
            <a class="navbar-brand" href="#"><img src="/COGIP-app/public/img/logo.png" alt="logo" width="30%"></a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2"> 
                <span class="navbar-toggler-icon"></span> 
            </button> 
        </div> 
    
    
        <div class="mx-auto order-0"> 
            <ul class="navbar-nav mr-auto"> 
                  <li class="nav-item "> 
                      <a class="nav-link" href="/COGIP-app/dashboard">Accueil</a> 
                  </li> 
                  <li class="nav-item"> 
                      <a class="nav-link" href="/COGIP-app/invoices/list">Factures</a> 
                  </li> 
                  <li class="nav-item"> 
                      <a class="nav-link" href="/COGIP-app/companies/list">Sociétés</a> 
                  </li> 
                  <li class="nav-item"> 
                      <a class="nav-link" href="/COGIP-app/contacts/list">Contacts</a> 
                  </li>  
            </ul> 
        </div> 

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2"> 
            <ul class="navbar-nav ml-auto"> 
                  <li class="nav-item"> 
                    <?php
                          if (Auth::isLogged()) {
                              echo '<form action="" method="POST"><button class="nav" type="submit" name="submit" value="logout">Deconnexion</button></form>';
                          } else {
                              echo '<a href="/COGIP-app/login"><button class="nav" type="button">Connexion</button></a>';
                          }
                      ?>
                  </li> 
            </ul> 

        </div> 
</nav> 

</header>