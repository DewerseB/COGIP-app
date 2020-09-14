<h1>COGIP : Annuaire des contacts</h1>
<?php
    if (Auth::isLogged()) {
        echo '<div class="nav">';
        echo '<a href="/COGIP-app/contacts/add"><button>+ Nouveau contact</button></a>';
        echo '</div>';
    }
?>
<table>
    <th>ID</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Société</th>
    <th>Détails</th>
    <?php
        if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
            echo '<th>Modifier</th>';
            echo '<th>Supprimer</th>';
        }
        $contactList = $model->data;
        for ($i=0; $i < count($contactList); $i++) { 
            $contact = $contactList[$i];
            echo "<tr>";
            echo "<td>".$contact['contact_id'].  "</td>";
            echo "<td>".$contact['firstname'].  "</td>";
            echo "<td>".$contact['lastname'].  "</td>";
            echo "<td>".$contact['email'].  "</td>";
            echo "<td>".$contact['phone'].  "</td>";
            echo "<td>".$contact['company_id'].  "</td>";
            echo "<td> <a href = \"/COGIP-app/contacts/details/$contact[contact_id]\"><button>Détails</button><a></td>";
            if (Auth::isLogged() && $_SESSION['usertype'] === 'admin') {
                echo "<td> <a href = \"/COGIP-app/contacts/update/$contact[contact_id]\"><button>Modifier</button><a></td>";
                echo "<td> <a href = \"/COGIP-app/contacts/delete/$contact[contact_id]\"><button>Supprimer</button><a></td>";
            }
            echo "</tr>";

       }
    ?>
</table>   