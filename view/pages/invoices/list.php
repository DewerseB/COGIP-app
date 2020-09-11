<h1>COGIP : Listing des factures</h1>
<table>
    <th>#ID</th>
    <th>Numéro de facture</th>
    <th>Date</th>
    <th>Contact</th>
    <th>Société</th>
    <th>Modifier</th>
    <th>Supprimer</th>
    <?php
       $invoicesList = $model->data;
       for ($i=0; $i < count($invoicesList); $i++) { 
           $invoice = $invoicesList[$i];
           echo "<tr>";
            echo "<td>".$invoice['invoice_id'].  "</td>";
            echo "<td>".$invoice['invoice_number'].  "</td>";
            echo "<td>".$invoice['date'].  "</td>";
            echo "<td>".$invoice['contact_id'].  "</td>";
            echo "<td>".$invoice['company_id'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/update/id\">Modifier<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/delete/id\">delete<a></button></td>";
           echo "</tr>";

       }
    ?>
</table>   