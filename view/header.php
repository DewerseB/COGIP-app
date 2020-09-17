<header>
    

    <nav class="navbar navbar-expand-lg navbar-light  background-color: #c0c0c0;">
  <a class="navbar-brand" href="#"><img src="/COGIP-app/public/img/logo.png" alt="logo" width="30%"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav navbar-right">

      <li class="nav-item ">
        <a class="nav-link" href="/COGIP-app/dashboard">Accueil <span class="sr-only">(current)</span></a>
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
        <?php
            if (Auth::isLogged()) {
                echo '<form action="" method="POST"><button class="nav" type="submit" name="submit" value="logout">Deconnexion</button></form>';
            } else {
                echo '<a href="/COGIP-app/login"><button class="nav" type="button">Connexion</button></a>';
            }
        ?>
        </div>
        </nav>

</header>