<h1>Gestion des utilisateurs</h1>
<table>
    <th>ID</th>
    <th>Nom</th>
    <th>Type</th>
    <th>Gérer</th>
    <?php
        foreach ($model->data as $user) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "<td>" . $user['usertype'] . "</td>";
            echo "<td><a href = \"/COGIP-app/admin/details/$user[id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
            echo "<a href = \"/COGIP-app/admin/update/$user[id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
            echo "<a href = \"/COGIP-app/admin/delete/$user[id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer l\'utilisateur ?\")'><i class='fas fa-minus-square'></i></button><a>";
            echo "</td></tr>";
       }
    ?>
</table>