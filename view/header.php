<header>
    <div class="nav">
        <a href="/COGIP-app/dashboard"><button class="nav" type="button">Accueil</button></a>
        <a href="/COGIP-app/invoices/list"><button class="nav" type="button">Factures</button></a>
        <a href="/COGIP-app/companies/list"><button class="nav" type="button">Sociétés</button></a>
        <a href="/COGIP-app/contacts/list"><button class="nav" type="button">Contacts</button></a>
        <?php
            if (Auth::isLogged()) {
                echo '<form action="" method="POST"><button class="nav" type="submit" name="submit" value="logout">Deconnexion</button></form>';
            } else {
                echo '<a href="/COGIP-app/login"><button class="nav" type="button">Connexion</button></a>';
            }
        ?>
    </div>
</header>