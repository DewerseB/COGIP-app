<?php
    $datas = $model->data;
    $companyList = $datas[0];
    $invoiceList = $datas[1];
    $contactList = $datas[2];
?>

<h1>Société : <?php echo $companyList[0]['name'] ?></h1>

<!-- display company info  -->
<section class="companyDetails">
    <h2>Numéro de TVA : <?php echo $companyList[0]['VAT'] ?></h2>
    <h2>Type : <?php echo $companyList[0]['company_type_id'] ?></h2>
</section>

<!-- display contacts info related to this company -->
<section class="contactCompanyDetails">
    <h2>Personnes de contact</h2>
    <table>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <?php
            echo "<tr>";
            echo "<td>".$contactList[0]['lastname']. $contactList[0]['firstname'] . "</td>";
            echo "<td>".$contactList[0]['phone'].  "</td>";
            echo "<td>".$contactList[0]['email'].  "</td>";
            echo "</tr>";
        ?>
    </table>   
</section>

<!-- display invoices info related to this company -->
<section class="invoiceCompanyDetails">
    <h2>Factures</h2>
    <table>
        <th>Numéro de facture</th>
        <th>Date</th>
        <th>Contact</th>
    <?php
           echo "<tr>";
            echo "<td>".$invoiceList[0]['invoice_number'].  "</td>";
            echo "<td>".$invoiceList[0]['date'].  "</td>";
            echo "<td>".$invoiceList[0]['contact_id'].  "</td>";
           echo "</tr>";
    ?>
</table> 

</section>

