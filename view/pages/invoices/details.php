<?php
    $datas = $model->data[0];
?>

<h1>Facture : <?php echo $datas['invoice_number'] ?> <br>
    Date: <?php echo $datas['date'] ?>
</h1>

<section class="table companyInvoiceDetails">
    <h2 id="edit">Société liée à la facture</h2>
    <table class ="companyInvoiceDetails">
        <th>Nom</th>
        <th>Numéro de TVA</th>
        <th>type</th>
        <?php
            echo "<tr>";
                echo "<td>".$datas['name'].  "</td>";
                echo "<td>".$datas['VAT'].  "</td>";
                echo "<td>".$datas['company_type'].  "</td>";
            echo "</tr>";
        ?>
    </table>
</section>

<section class="table contactInvoiceDetails">
    <h2 id="edit">Personne de contact</h2>
    <table class ="companyInvoiceDetails">
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
    <?php
        echo "<tr>";
            echo "<td>".$datas['lastname']. " ". $datas['firstname'] . "</td>";
            echo "<td>".$datas['email'].  "</td>";
            echo "<td>".$datas['phone'].  "</td>";
        echo "</tr>";
    ?>
</table>
</section>