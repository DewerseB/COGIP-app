<h1>Ajout nouvelle facture</h1>
<?php
 var_dump($_POST);
 ?>

<form class="invoiceForm" action="" method="post">
    <section class="invoice_number">
        <label for="invoice_number"><h2>Numéro de facture</h2></label>
        <input type="text" name="invoice_number" id="invoice_number" value="">
    </section>
    <section class="date">
        <label for="date"><h2>Date</h2></label>
        <input type="date" name="date" id="date" value="">
    </section>
    <section class="company">
        <label for="company"><h2>Société</h2></label>
        <select name="company" id="company">
        <option selected value="Select company">Selectionez une société</option>
        <!-- <option value="<?php echo $company['name']; ?>"><?php echo $company['name'];?></option> -->  
        </select>
    </section>
    <section class="contact">
        <label for="contact"><h2>Personne de contact pour la facture</h2></label>
        <select name="contact" id="contact">
        <option selected value="Select contact">Selectionez un contact</option>
        <!-- <option value="<?php echo $contact['name']; ?>"><?php echo $contact['name'];?></option> -->  
        </select>
    </section>
    <br><br>
    <section class="submit">
    <button type="submit" value="submit" id="submit">Submit</button>
    </section>
</form>