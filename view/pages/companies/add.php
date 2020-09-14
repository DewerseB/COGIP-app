<h1>Ajout nouvelle société</h1>
<?php
 var_dump($_POST);
 ?>

<form class="companyForm" action="" method="post">
    <section class="name">
        <label for="name"><h2>Nom de la société</h2></label>
        <input type="text" name="name" id="name" value="">
    </section>
    <section class="tva">
        <label for="tva"><h2>N° de TVA</h2></label>
        <input type="text" name="tva" id="tva" value="">
    </section>
    <section class="country">
        <label for="country"><h2>Pays</h2></label>
        <input type="text" name="country" id="country" value="">
    </section>
    <section class="type">
        <label for="company_type"><h2>Type de société</h2></label>
        <select name="company_type" id="company_type">
            <option value="1">Client</option>
            <option value="2">Fournisseur</option>
        </select>
    </section>
    <br><br>
    <section class="submit">
        <button type="submit" value="submit" id="submit">Submit</button>
    </section>

</form>
