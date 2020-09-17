<?php
    $contactInfo = $model->data[0][0];
    $companyList = $model->data[1][1];
?>

<h1>Modifier le contact :</h1>

<form class="contactForm" action="" method="post">
    <section class="firstname">
        <label for="firstname"><h2>Prénom</h2></label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $contactInfo['firstname'] ?>">
    </section>
    <section class="lastname">
        <label for="lastname"><h2>Nom</h2></label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $contactInfo['lastname'] ?>">
    </section>
    <section class="phone">
        <label for="phone"><h2>Téléphone</h2></label>
        <input type="text" name="phone" id="phone" value="<?php echo $contactInfo['phone'] ?>">
    </section>
    <section class="email">
        <label for="email"><h2>Email</h2></label>
        <input type="email" name="email" id="email" value="<?php echo $contactInfo['email'] ?>">
    </section>
    <section class="company">
        <label for="company"><h2>Société</h2></label>
        <select class="custom-select" name="company" id="company" required>
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
    </section>
    <br>
    <section class="submit">
    <button type="submit" value="submit" id="submit" name="submit">Submit</button>
    </section>
</form>