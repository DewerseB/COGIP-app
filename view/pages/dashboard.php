<h1>Bienvenue à la COGIP</h1>
<nav>
    <ul>
        <li><h2><a href="http:/COGIP-app/invoices/add">+ Nouvelle facture</a></h2></li>
        <li><h2><a href="http:/COGIP-app/contacts/add">+ Nouveau contact</a></h2></li>
        <li><h2><a href="http:/COGIP-app/companies/add">+ Nouvelle société</a></h2></li>
    </ul>
</nav>

<h2>Dernières factures:</h2>
<!-- <table>
    <th>#ID</th>
    <th>Numéro de facture</th>
    <th>Date</th>
    <th>Contact</th>
    <th>Société</th>
    <th>Détails</th>
    <th>Modifier</th>
    <th>Supprimer</th>
    <?php
       $invoicesList = $model->data;
       for ($i=0; $i < 4; $i++) { 
           $invoice = $invoicesList[$i];
           echo "<tr>";
            echo "<td>".$invoice['invoice_id'].  "</td>";
            echo "<td>".$invoice['invoice_number'].  "</td>";
            echo "<td>".$invoice['date'].  "</td>";
            echo "<td>".$invoice['contact_id'].  "</td>";
            echo "<td>".$invoice['company_id'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/details/$invoice[invoice_id]\">Détails<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/update/$invoice[invoice_id]\">Modifier<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/invoices/delete/$invoice[invoice_id]\">delete<a></button></td>";
           echo "</tr>";

       }
    ?>
</table>   

<h2>Dernier contacts:</h2>
<table>
    <th>ID</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Société</th>
    <th>Détails</th>
    <th>Modifier</th>
    <th>Supprimer</th>

    <?php
       $contactList = $model->data;
       for ($i=0; $i < 4; $i++) { 
           $contact = $contactList[$i];
           echo "<tr>";
            echo "<td>".$contact['contact_id'].  "</td>";
            echo "<td>".$contact['firstname'].  "</td>";
            echo "<td>".$contact['lastname'].  "</td>";
            echo "<td>".$contact['email'].  "</td>";
            echo "<td>".$contact['phone'].  "</td>";
            echo "<td>".$contact['company_id'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/contact/details/$contact[contact_id]\">Détails<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/contact/update/$contact[contact_id]\">Modifier<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/contact/delete/$contact[contact_id]\">delete<a></button></td>";
           echo "</tr>";

       }
    ?>
</table>    -->
<h2>Dernières sociétés:</h2>
<table>
    <th>#ID</th>
    <th>Nom</th>
    <th>Numéro de TVA</th>
    <th>Pays</th>
    <th>type</th>

    <?php
       $companyList = $model->data;
       $company = $companyList[0];
       for ($i=0; $i < 5; $i++) { 
           echo "<tr>";
            echo "<td>".$company[$i]['company_id'].  "</td>";
            echo "<td>".$company[$i]['name'].  "</td>";
            echo "<td>".$company[$i]['VAT'].  "</td>";
            echo "<td>".$company[$i]['country'].  "</td>";
            echo "<td>".$company[$i]['company_type_id'].  "</td>";
           echo "</tr>";

       }
    ?>
</table>   