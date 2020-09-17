<h1>COGIP : Annuaire des contacts <?php
    if (Auth::isLogged()) {
        echo '<a href="/COGIP-app/contacts/add"><button class="manage" title="Ajouter un contact"><i class="fas fa-plus-square"></i></button></a>';
    }
?></h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Société</th>
            <th scope="col">Gérer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $contactList = $model->data;
            for ($i=0; $i < count($contactList); $i++) { 
                $contact = $contactList[$i];
                echo "<tr>";
                echo '<th scope="col">' . $contact['contact_id'] . '</th>';
                echo "<td>".$contact['firstname'].  "</td>";
                echo "<td>".$contact['lastname'].  "</td>";
                echo "<td>".$contact['email'].  "</td>";
                echo "<td>".$contact['phone'].  "</td>";
                echo "<td>".$contact['name'].  "</td>";
                echo "<td><a href = \"/COGIP-app/contacts/details/$contact[contact_id]\"><button class='manage' title='Details'><i class='fas fa-external-link-square-alt'></i></button><a>";
                if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                    echo "<a href = \"/COGIP-app/contacts/update/$contact[contact_id]\"><button class='manage' title='Modifier'><i class='fas fa-pen-square'></i></button><a>";
                    echo "<a href = \"/COGIP-app/contacts/delete/$contact[contact_id]\"><button class='manage' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer le contact ?\")'><i class='fas fa-minus-square'></i></button><a>";
                }
                echo "</td></tr>";
        }
        ?>
    </tbody>
</table>   