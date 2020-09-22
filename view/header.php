<header class="fixed-top">

<nav class="navbar navbar-expand-md navbar-dark bg-dark"> 

        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2"> 
            <a class="navbar-brand" href="#"><img src="/COGIP-app/public/img/logo.png" alt="logo" width="40%"></a>
        </div> 

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2"> 
          <span class="navbar-toggler-icon"></span> 
        </button> -->
    
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
              <?php
                if (Auth::isLogged()) {
                    if ($_SESSION['usertype'] === 'admin') echo '<li class="nav-item"><a class="nav-link" href="/COGIP-app/admin/list">Admin</a></li>';
                    echo '<li class="nav-item"><form action="" method="POST"><button class="navBtn" type="submit" name="submit" value="logout">Deconnexion</button></form></li>';
                } else {
                    echo '<li class="nav-item"><a href="/COGIP-app/login"><button class="navBtn" type="button">Connexion</button></a></li>';
                }
              ?>
            </ul> 

        </div> 
</nav> 

</header>