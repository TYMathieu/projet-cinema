<?php
ob_start();
?>

<h2>Film <?= $_POST[('titre')] ?> rajouté avec succès !</h2>



<?php

$titreOnglet = "Film ajouté";
$contenu = ob_get_clean();
require "views/template.php";
