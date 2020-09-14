<h1>COGIP : Listing des factures</h1>
<?php
    if (Auth::isLogged()) {
        echo '<div class="nav">';
        echo '<a href="/COGIP-app/invoices/add"><button>+ Nouvelle facture</button></a>';
        echo '</div>';
    }
?>
<table>
    <th>#ID</th>
    <th>Numéro de facture</th>
    <th>Date</th>
    <th>Contact</th>
    <th>Société</th>
    <th>Détails</th>
    <?php
        if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
            echo '<th>Modifier</th>';
            echo '<th>Supprimer</th>';
        }
        $invoicesList = $model->data;
        for ($i=0; $i < count($invoicesList); $i++) { 
            $invoice = $invoicesList[$i];
            "<form action='COGIP-app/invoices/update/$invoice[invoice_id]' method='post'>";
            echo "<tr>";
            echo "<td>".$invoice['invoice_id'].  "</td>";
            echo "<td>".$invoice['invoice_number'].  "</td>";
            echo "<td>".$invoice['date'].  "</td>";
            echo "<td>".$invoice['lastname'].  "</td>";
            echo "<td>".$invoice['name'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/details/$invoice[invoice_id]\">Détails<a></button></td>";
            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                echo "<td> <button><a href = \"/COGIP-app/invoices/update/$invoice[invoice_id]\">Modifier<a></button></td>";
                echo "<td> <button><a href = \"/COGIP-app/invoices/delete/$invoice[invoice_id]\">Supprimer<a></button></td>";
            }
           echo "</tr>";
           "</form>"

       }
    ?>
</table>