<?php
    $datas = $model->data;
    $companyInfo = $datas[0];
?>

<h1>Société : <?php echo $companyInfo['name'] ?></h1>

<!-- display company info  -->
<section class="companyDetails">
    <h2>Numéro de TVA : <?php echo $companyInfo['VAT'] ?></h2>
    <h2>Type : <?php echo $companyInfo['company_type'] ?></h2>
</section>

<!-- display more info if available -->
<?php if (count($companyInfo)>5) {?>
    
    <!-- display contacts info related to this company -->
        <section class="contactCompanyDetails">
            <h2 id="edit">Personnes de contact</h2>
            <table class="contactCompanyDetails">
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <?php
                for ($i=0; $i < count($datas); $i++) { 
                    if ($i>0 && $datas[$i]['lastname'] == $datas[$i-1]['lastname'] && $datas[$i]['firstname'] == $datas[$i-1]['firstname']) {
                        continue;
                    }else{
                        echo "<tr>";
                        echo "<td>".$datas[$i]['lastname']. " ". $datas[$i]['firstname'] . "</td>";
                        echo "<td>".$datas[$i]['phone'].  "</td>";
                        echo "<td>".$datas[$i]['email'].  "</td>";
                        echo "</tr>"; 
                    }  
                }
                ?>
            </table>   
        </section>

        <!-- display invoices info related to this company -->
        <section class="invoiceCompanyDetails">
            <h2 id="edit">Factures</h2>
            <table class="contactCompanyDetails">
                <th>Numéro de facture</th>
                <th>Date</th>
                <th>Contact</th>
                <?php
                for ($i=0; $i < count($datas); $i++) {    
                    echo "<tr>";
                    echo "<td>".$datas[$i]['invoice_number'].  "</td>";
                    echo "<td>".$datas[$i]['date'].  "</td>";
                    echo "<td>".$datas[$i]['email'] ."</td>";
                    echo "</tr>";
                }
                ?>
            </table> 
        </section>
<?php
    }
?>