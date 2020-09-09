<header>
    <div class="nav">
        <a href="/COGIP-app/dashboard"><button type="button">Accueil</button></a>
        <a href="/COGIP-app/invoices/list"><button type="button">Factures</button></a>
        <a href="/COGIP-app/companies/list"><button type="button">Sociétés</button></a>
        <a href="/COGIP-app/contacts/list"><button type="button">Contacts</button></a>
        <?php
            if (Auth::isLogged()) {
                echo '<form action="" method="POST"><button type="submit" name="submit" value="logout">Deconnexion</button></form>';
            } else {
                echo '<a href="/COGIP-app/login"><button type="button">Connexion</button></a>';
            }
        ?>
    </div>
</header>