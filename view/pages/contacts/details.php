<?php
    $datas = $model->data;
    var_dump($datas);
    ?>
<h1>Contact : <?php echo $datas[0]['lastname']. " ". $datas[0]['firstname'] ?> </h1>

<section class="contactDetails">
    <strong> Société : </strong> <?php echo $datas[0]['name']?> <br>
    <strong> Email : </strong> <?php echo $datas[0]['email']?> <br>
    <strong> Phone : </strong> <?php echo $datas[0]['phone']?> <br>
</section>

<section class="invoiceContactDétails">
    <h2>Contact pour les factures : </h2>
    <table>
        <th>Numéro de facture</th>
        <th>Date</th>
    <?php
     for ($i=0; $i < count($datas); $i++) {    
        echo "<tr>";
            echo "<td>".$datas[$i]['invoice_number']."</td>";
            echo "<td>".$datas[$i]['date']."</td>";
        echo "</tr>";
     }
    ?>
</table> 


</section>