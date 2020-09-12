<h1>Ajout nouveau contact</h1>
<?php
 var_dump($_POST);
 ?>

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
        <input type="number" name="phone" id="phone" value="">
    </section>
    <section class="email">
        <label for="email"><h2>Email</h2></label>
        <input type="email" name="email" id="email" value="">
    </section>
    <section class="company">
        <label for="company"><h2>Société</h2></label>
        <select name="company" id="company">
        <option selected value="Select company">Selectionez une société</option>
        <!-- <option value="<?php echo $company['name']; ?>"><?php echo $company['name'];?></option> -->  
        </select>
    </section>
    <br><br>
    <section class="submit">
    <button type="submit" value="submit" id="submit">Submit</button>
    </section>
</form>