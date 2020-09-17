<header class="fixed-top">
    

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="/COGIP-app/dashboard"><img src="/COGIP-app/public/img/logo.png" alt="logo" width="30%"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav navbar-right">
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
      <?php
        if (Auth::isLogged()) {
            if ($_SESSION['usertype'] === 'admin') echo '<li class="nav-item"><a class="nav-link" href="/COGIP-app/admin/admin">Admin</a></li>';
            echo '<li class="nav-item"><form action="" method="POST"><button class="navBtn" type="submit" name="submit" value="logout">Deconnexion</button></form></li>';
        } else {
            echo '<li class="nav-item"><a href="/COGIP-app/login"><button class="navBtn" type="button">Connexion</button></a></li>';
        }
      ?>
    </ul>
  </div>
</nav>

</header>