<h1>Ajout nouvel utilisateur</h1>

<form class="container" action="" method="post">

    <!-- username -->
    <section class="form-group">
        <label for="username">Nom de l'utilisateur</label>
        <input class="form-control" type="text" name="username" id="username" value="">
    </section>

    <!-- password -->
    <section class="row">
        <article class="col-xl-6">
            <div class="form-group">
                <label for="pasword">Mot de passe</label>
                 <input class="form-control" type="password" name="password" id="password" value="">
            </div>
        </article>
        <article class="col-xl-6">
            <div class="form-group">
                <label for="confirm">Confirmer le mot de passe</label>
                <input class="form-control" type="confirm" name="confirm" id="confirm" value="">
            </div>
        </article>
    </section>

    <!-- user type  -->
    <section class="form-group">
        <label for="usertype_id">Type d'utilisateur</label>
        <select class="form-control" name="usertype_id" id="usertype_id">
            <option value="1">Administrateur</option>
            <option value="2">Modérateur</option>
        </select>
    </section>

    <!-- submit  -->
    <section class="form-group">
        <button class="btn btn-primary" type="submit" value="submit" id="submit" name="submit">Submit</button>
    </section>
</form>