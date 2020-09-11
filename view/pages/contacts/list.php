<h1>COGIP : Annuaire des contacts</h1>
<table>
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
            echo "<td>".$contact['company_id'].  "</td>";
           echo "</tr>";

       }
    ?>
</table>   