<?php
    $invoicesList = $model->data;
    $contactInfo = $invoicesList[0];
    
    ?>
<h1>Contact : <?php echo $contactInfo['lastname']. " ". $contactInfo['firstname'] ?> </h1>

<section class="contactDetails">
    <strong> Société : </strong> <?php echo $contactInfo['name']?> <br>
    <strong> Email : </strong> <?php echo $contactInfo['email']?> <br>
    <strong> Phone : </strong> <?php echo $contactInfo['phone']?> <br>
</section>

<!-- display more info if available -->
<?php if (count($contactInfo)>5) {?>
<section class="invoiceContactDétails">
    <h2 id="edit">Contact pour les factures : </h2>
    <table  class="invoiceContactDétails">
        <th>Numéro de facture</th>
        <th>Date</th>
        <?php
        foreach ($invoicesList as $invoice) {    
            echo "<tr>";
                echo "<td>".$invoice['invoice_number']."</td>";
                echo "<td>".$invoice['date']."</td>";
            echo "</tr>";
        }
        ?>
    </table> 
</section>
<?php
}
?>