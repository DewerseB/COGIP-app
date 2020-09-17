<?php
    $invoiceInfo = $model->data[0][0];
    $contactList = $model->data[1][0];
    $companyList = $model->data[1][1];
 ?>
 
<h1>Modifier la facture :</h1>

<form class="container" action="" method="post">
    <div class="form-group">
        <label for="invoice_number">Numéro de facture</label>
        <input class="form-control" type="text" name="invoice_number" id="invoice_number" value="<?php echo $invoiceInfo['invoice_number'] ?>">
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input class="form-control" type="date" name="date" id="date" value="<?php echo $invoiceInfo['date'] ?>">
    </div>

    <div class="form-group">
        <label for="company">Société</label>
        <select class="form-control" name="company" id="company" required onchange="giveSelection(this.value)">
            <?php
                foreach($companyList as $company){
            ?>
                    <option value="<?php echo $company['company_id']; ?>"<?php echo ($company['name'] == $invoiceInfo['name'])? "selected":""?>>
                        <?php echo $company['name'];?>
                    </option>
            <?php
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="contact">Personne de contact pour la facture</label>
        <select class="form-control" name="contact" id="contact" required>
            <?php
                foreach($contactList as $contact){
            ?>
                <option data-id="<?php echo $contact['company_id']; ?>"value="<?php echo $contact['contact_id']; ?>"<?php echo ($contact['lastname'] == $invoiceInfo['lastname'] && $contact['firstname'] == $invoiceInfo['firstname'])? "selected":""?>>
                        <?php echo $contact['lastname']. " ". $contact['firstname'];?>
                </option>    
            <?php
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" value="submit" id="submit" name="submit">Submit</button>
    </div>
</form>