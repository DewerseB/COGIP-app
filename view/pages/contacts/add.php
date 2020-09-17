<?php
    $companyList = $model->data[1];
?>

<h1>Ajout nouveau contact</h1>

<form class="container" action="" method="post">
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input class="form-control" type="text" name="firstname" id="firstname" value="">
    </div>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input class="form-control" type="text" name="lastname" id="lastname" value="">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input class="form-control" type="text" name="phone" id="phone" value="">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" value="">
    </div>
    <div class="form-group">
        <label for="company">Société</label>
        <select class="form-control" name="company" id="company" required>
            <option selected value="Selectionnez your company">Selectionnez la société</option>
            <?php
                foreach($companyList as $company){
            ?>
                 <option value="<?php echo $company['company_id']; ?>"><?php echo $company['name'];?></option>
            <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit" value="submit" id="submit" name="submit">Submit</button>
    </div>
</form>