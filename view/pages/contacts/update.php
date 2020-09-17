<?php
    $contactInfo = $model->data[0][0];
    $companyList = $model->data[1][1];
?>

<h1>Modifier le contact :</h1>

<form class="container" action="" method="post">
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $contactInfo['firstname'] ?>">
    </div>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $contactInfo['lastname'] ?>">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $contactInfo['phone'] ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" value="<?php echo $contactInfo['email'] ?>">
    </div>
    <div class="form-group">
        <label for="company">Société</label>
        <select class="form-control" name="company" id="company" required>
            <?php
                foreach($companyList as $company){
            ?>
            <option value="<?php echo $company['company_id']; ?>"<?php echo ($company['name'] == $contactInfo['name'])? "selected":""?>>
                <?php echo $company['name'];?>
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