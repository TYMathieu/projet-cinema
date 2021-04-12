<?php
ob_start();

?>

<h2>Réalisateur <?= $_POST[('prenom_du_realisateur')] . " " . $_POST[('nom_du_realisateur')] ?> rajouté avec succès !</h2>



<?php

$titreOnglet = "Realisateur ajouté";
$contenu = ob_get_clean();
require "views/template.php";
