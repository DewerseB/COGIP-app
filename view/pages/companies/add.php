<h1>Ajout nouvelle société</h1>
<?php
    require('./model/db/countries.php');//fetch the variable $countries from countries.php
?>

<form class="formContent" action="" method="post">
    <section class="form">
        <label for="name"><h2>Nom de la société</h2></label>
        <input type="text" name="name" id="name" value="">
    </section>

    <section class="form">
        <label for="tva"><h2>N° de TVA</h2></label>
        <input type="text" name="tva" id="tva" value="">
    </section>

    <section class="form">
        <label for="country"><h2>Pays</h2></label>
        <select class="custom-select" name="country" id="country" required>
            <option selected value="Select your country">Select your country</option>
            <?php
                foreach($countries as $country){
            ?>
                 <option value="<?php echo strtolower($country); ?>"><?php echo $country;?></option>
            <?php
                }
            ?>
        </select>
    </section>

    <section class="form">
        <label for="company_type"><h2>Type de société</h2></label>
        <select name="company_type" id="company_type">
            <option value="1">Client</option>
            <option value="2">Fournisseur</option>
        </select>
    </section>
    
    <section class="form">
        <button type="submit" value="submit" id="submit" name="submit">Submit</button>
    </section>

</form>
