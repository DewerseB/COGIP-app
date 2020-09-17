

       
            <h1>Bienvenue à la COGIP</h1>
        

<?php
    if (Auth::isLogged()) {
        echo '<div class="nav">';
        echo '<a href="/COGIP-app/invoices/add"><button class="nav">+ Nouvelle facture</button></a>';
        echo '<a href="/COGIP-app/companies/add"><button class="nav">+ Nouvelle société</button></a>';
        echo '<a href="/COGIP-app/contacts/add"><button class="nav">+ Nouveau contact</button></a>';
        echo '</div>';
    }
?>

       
<h2>Dernières factures:</h2>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro de facture</th>
                        <th>Date</th>
                        <th>Contact</th>
                        <th>Société</th>
                        <th>Gérer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $invoicesList = $model->data[1];
                    foreach ($invoicesList as $invoice) {
                            echo "<tr>";
                            echo "<td>".$invoice['invoice_id'].  "</td>";
                            echo "<td>".$invoice['invoice_number'].  "</td>";
                            echo "<td>".$invoice['date'].  "</td>";
                            echo "<td>".$invoice['lastname'].  "</td>";
                            echo "<td>".$invoice['name'].  "</td>";
                            echo "<td><a href = \"/COGIP-app/invoices/details/$invoice[invoice_id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
                            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') { 
                                echo "<a href = \"/COGIP-app/invoices/update/$invoice[invoice_id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
                                echo "<a href = \"/COGIP-app/invoices/delete/$invoice[invoice_id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer la facture ?\")'><i class='fas fa-minus-square'></i></button><a>";
                            }
                            echo "</td></tr>";

                    }
                    ?>
                </tbody>
            </table> 
        



<h2>Dernières sociétés:</h2>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Numéro de TVA</th>
                        <th>Pays</th>
                        <th>type</th>
                        <th>Gérer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $companiesList = $model->data[0];
                    foreach ($companiesList as $company) { 
                            echo "<tr>";
                            echo "<td>".$company['company_id'].  "</td>";
                            echo "<td>".$company['name'].  "</td>";
                            echo "<td>".$company['VAT'].  "</td>";
                            echo "<td>".$company['country'].  "</td>";
                            echo "<td>".$company['company_type'].  "</td>";
                            echo "<td><a href = \"/COGIP-app/companies/details/$company[company_id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
                            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                                echo "<a href = \"/COGIP-app/companies/update/$company[company_id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
                                echo "<a href = \"/COGIP-app/companies/delete/$company[company_id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer la société ?\")'><i class='fas fa-minus-square'></i></button><a>";
                            }
                            echo "</td></tr>";

                    }
                    ?>
                </tbody>
            </table>
   




<h2>Derniers contacts:</h2>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Société</th>
                        <th>Gérer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contactsList = $model->data[2];
                    foreach ($contactsList as $contact) {
                            echo "<tr>";
                            echo "<td>".$contact['contact_id'].  "</td>";
                            echo "<td>".$contact['firstname'].  "</td>";
                            echo "<td>".$contact['lastname'].  "</td>";
                            echo "<td>".$contact['email'].  "</td>";
                            echo "<td>".$contact['phone'].  "</td>";
                            echo "<td>".$contact['name'].  "</td>";
                            echo "<td><a href = \"/COGIP-app/contacts/details/$contact[contact_id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
                            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                                echo "<a href = \"/COGIP-app/contacts/update/$contact[contact_id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
                                echo "<a href = \"/COGIP-app/contacts/delete/$contact[contact_id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer le contact ?\")'><i class='fas fa-minus-square'></i></button><a>";
                            }
                            echo "</td></tr>";

                    }
                    ?>
                </tbody>
            </table>
  