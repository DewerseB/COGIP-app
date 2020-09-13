<h1>COGIP : Annuaire des contacts</h1>
<table>
    <th>ID</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Société</th>
    <th>Modifier</th>
    <th>Supprimer</th>

    <?php
       $contactList = $model->data;
       for ($i=0; $i < count($contactList); $i++) { 
           $contact = $contactList[$i];
           echo "<tr>";
            echo "<td>".$contact['contact_id'].  "</td>";
            echo "<td>".$contact['firstname'].  "</td>";
            echo "<td>".$contact['lastname'].  "</td>";
            echo "<td>".$contact['email'].  "</td>";
            echo "<td>".$contact['phone'].  "</td>";
            echo "<td>".$contact['name'].  "</td>";
            echo "<td> <button><a href = \"/COGIP-app/contact/update/id\">Modifier<a></button></td>";
            echo "<td> <button><a href = \"/COGIP-app/contact/delete/id\">delete<a></button></td>";
           echo "</tr>";

       }
    ?>
</table>   