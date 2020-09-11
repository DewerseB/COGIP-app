<h1>COGIP : Listing des factures</h1>
<table>
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
           echo "</tr>";

       }
    ?>
</table>   