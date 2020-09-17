<?php
    require('./model/db/countries.php');//fetch the variable $countries from countries.php
    $companyInfo = $model->data[0][0];
?>

<h1>Modifier la société</h1>

<form class="container" action="" method="post">
    <div class="form-group">
        <label for="name">Nom de la société</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo $companyInfo['name'] ?>">
    </div>

    <div class="form-group">
        <label for="tva">N° de TVA</label>
        <input class="form-control" type="text" name="tva" id="tva" value="<?php echo $companyInfo['VAT'] ?>">
    </div>

    <div class="form-group">
        <label for="country">Pays</label>
        <select class="form-control" name="country" id="country" required>
            <?php
                foreach($countries as $country){
            ?>
                 <option value="<?php echo strtolower($country); ?>"<?php echo (strtolower($country) == strtolower($companyInfo['country']))? "selected":""?>><?php echo $country;?></option>
            <?php
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="company_type">Type de société</label>
        <select class="form-control" name="company_type" id="company_type">
            <option value="1">Client</option>
            <option value="2">Fournisseur</option>
        </select>
    </div>
    
    <div class="form-group">
        <button class="btn btn-primary" type="submit" value="submit" id="submit" name="submit">Submit</button>
    </div>

</form>
