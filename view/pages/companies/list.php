<h1>COGIP : Annuaire des sociétés</h1>
<table>
    <th>#ID</th>
    <th>Nom</th>
    <th>Numéro de TVA</th>
    <th>Pays</th>
    <th>type</th>
    <th>Modifier</th>
    <th>Supprimer</th>

    <?php
       $companyList = $model->data;
       for ($i=0; $i < count($companyList); $i++) { 
           $company = $companyList[$i];
           echo "<tr>";
            echo "<td>".$company['company_id'].  "</td>";
            echo "<td>".$company['name'].  "</td>";
            echo "<td>".$company['VAT'].  "</td>";
            echo "<td>".$company['country'].  "</td>";
            echo "<td>".$company['company_type_id'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/companies/update/id\">Modifier<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/companies/delete/id\">delete<a></button></td>";
           echo "</tr>";

       }
    ?>
</table>   