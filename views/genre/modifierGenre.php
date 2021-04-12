<?php
ob_start();

?>

<h2>Genre <?= $_POST[('nom_genre')] ?> modifié avec succès</h2>



<?php

$titreOnglet = "Genre modifié";
$contenu = ob_get_clean();
require "views/template.php";
