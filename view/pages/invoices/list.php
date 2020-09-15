<h1>COGIP : Listing des factures <?php
    if (Auth::isLogged()) {
        echo '<a href="/COGIP-app/invoices/add"><button class="manage" title="Ajouter une facture"><i class="fas fa-plus-square"></i></button></a>';
    }
?></h1>

<table>
    <th>ID</th>
    <th>Numéro de facture</th>
    <th>Date</th>
    <th>Contact</th>
    <th>Société</th>
    <th>Gérer</th>
    <?php
        $invoicesList = $model->data;
        for ($i=0; $i < count($invoicesList); $i++) { 
            $invoice = $invoicesList[$i];
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
</table>
