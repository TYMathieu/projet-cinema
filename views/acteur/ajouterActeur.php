<?php
ob_start();

?>

<h2>Réalisateur <?= $_POST[('prenom_du_acteur')] . " " . $_POST[('nom_du_acteur')] ?> rajouté avec succès !</h2>



<?php

$titreOnglet = "Acteur ajouté";
$contenu = ob_get_clean();
require "views/template.php";
