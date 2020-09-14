<h1>COGIP : Annuaire des sociétés</h1>
<?php
    if (Auth::isLogged()) {
        echo '<div class="nav">';
        echo '<a href="/COGIP-app/companies/add"><button>+ Nouvelle société</button></a>';
        echo '</div>';
    }
?>
<table>
    <th>#ID</th>
    <th>Nom</th>
    <th>Numéro de TVA</th>
    <th>Pays</th>
    <th>type</th>
    <th>Détails</th>
    <?php
        if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
            echo '<th>Modifier</th>';
            echo '<th>Supprimer</th>';
        }
        $companyList = $model->data;
        for ($i=0; $i < count($companyList); $i++) { 
            $company = $companyList[$i];
            echo "<tr>";
            echo "<td>".$company['company_id'].  "</td>";
            echo "<td>".$company['name'].  "</td>";
            echo "<td>".$company['VAT'].  "</td>";
            echo "<td>".$company['country'].  "</td>";
            echo "<td>".$company['company_type'].  "</td>";
            echo "<td> <a href = \"/COGIP-app/companies/details/$company[company_id]\"><button>Détails</button><a></td>";
            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                echo "<td> <a href = \"/COGIP-app/companies/update/$company[company_id]\"><button>Modifier</button><a></td>";
                echo "<td> <a href = \"/COGIP-app/companies/delete/$company[company_id]\"><button>Supprimer</button><a></td>";
            }
            echo "</tr>";

       }
    ?>
</table>   