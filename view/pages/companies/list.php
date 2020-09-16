<h1>COGIP : Annuaire des sociétés <?php
    if (Auth::isLogged()) {
        echo '<a href="/COGIP-app/companies/add"><button class="manage" title="Ajouter une société"><i class="fas fa-plus-square"></i></button></a>';
    }
?></h1>
<table>
    <th>ID</th>
    <th>Nom</th>
    <th>Numéro de TVA</th>
    <th>Pays</th>
    <th>type</th>
    <th>Gérer</th>
    <?php
        $companyList = $model->data;
        for ($i=0; $i < count($companyList); $i++) { 
            $company = $companyList[$i];
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
</table>