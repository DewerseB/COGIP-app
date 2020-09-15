<h1>Modifier la société</h1>
<?php
    require('./model/db/countries.php');//fetch the variable $countries from countries.php
    $companyInfo = $model->data[0];
    var_dump($companyInfo);
    var_dump($_POST);
?>

<form class="formContent" action="" method="post">
    <div class="form">
        <label for="name"><h2>Nom de la société</h2></label>
        <input type="text" name="name" id="name" value="<?php echo $companyInfo['name'] ?>">
    </div>
    <div class="form">
        <label for="tva"><h2>N° de TVA</h2></label>
        <input type="text" name="tva" id="tva" value="<?php echo $companyInfo['VAT'] ?>">
    </div>
    <div class="form">
        <label for="country"><h2>Pays</h2></label>
        <select class="custom-select" name="country" id="country" required>
            <?php
                foreach($countries as $country){
            ?>
                 <option value="<?php echo strtolower($country); ?>"<?php echo (strtolower($country) == strtolower($companyInfo['country']))? "selected":""?>><?php echo $country;?></option>
            <?php
                }
            ?>
        </select>

    </div>
    <div class="form">
        <label for="company_type"><h2>Type de société</h2></label>
        <select name="company_type" id="company_type">
            <option value="1">Client</option>
            <option value="2">Fournisseur</option>
        </select>
    </div>
    <div class="form">
        <button type="submit" value="submit" id="submit" name="submit">Submit</button>
    </div>

</form>
