<?php
ob_start();

?>

<h2>Acteur <?= $_POST[('prenom_du_acteur')] . " " . $_POST[('nom_du_acteur')] ?> modifié avec succès (youppppiiii)</h2>



<?php

$titreOnglet = "Realisateur modifié";
$contenu = ob_get_clean();
require "views/template.php";
