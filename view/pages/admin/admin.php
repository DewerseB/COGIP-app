<h1>Gestion des utilisateurs</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
            <th scope="col">Gérer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($model->data as $user) {
                echo "<tr>";
                echo '<th scope="row">' . $user['id'] . '</th>';
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['usertype'] . "</td>";
                echo "<td><a href = \"/COGIP-app/admin/details/$user[id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
                echo "<a href = \"/COGIP-app/admin/update/$user[id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
                echo "<a href = \"/COGIP-app/admin/delete/$user[id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer l\'utilisateur ?\")'><i class='fas fa-minus-square'></i></button><a>";
                echo "</td></tr>";
        }
        ?>
    </tbody>
</table>