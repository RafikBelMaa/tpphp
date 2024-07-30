<?php
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=contacts.csv");
?>
"civilite";"nom";"prenom"
<?php foreach($data as $row) : ?>
"<?= $row['libelle'] ?>";"<?= $row['nom'] ?>";"<?= $row['prenom'] ?>"
<?php endforeach ?>