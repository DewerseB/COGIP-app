<h1>COGIP : Annuaire des sociétés</h1>
<table>
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
           echo "</tr>";

       }
    ?>
</table>   