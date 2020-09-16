<?php
    $companyList = $model->data[1];
    var_dump($companyList);
    ?>
<h1>Ajout nouveau contact</h1>

<form class="contactForm" action="" method="post">
    <section class="firstname">
        <label for="firstname"><h2>Prénom</h2></label>
        <input type="text" name="firstname" id="firstname" value="">
    </section>
    <section class="lastname">
        <label for="lastname"><h2>Nom</h2></label>
        <input type="text" name="lastname" id="lastname" value="">
    </section>
    <section class="phone">
        <label for="phone"><h2>Téléphone</h2></label>
        <input type="text" name="phone" id="phone" value="">
    </section>
    <section class="email">
        <label for="email"><h2>Email</h2></label>
        <input type="email" name="email" id="email" value="">
    </section>
    <section class="company">
        <label for="company"><h2>Société</h2></label>
        <select class="custom-select" name="company" id="company" required>
            <option selected value="Selectionnez your company">Selectionnez la société</option>
            <?php
                foreach($companyList as $company){
            ?>
                 <option value="<?php echo $company['company_id']; ?>"><?php echo $company['name'];?></option>
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