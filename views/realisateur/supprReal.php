<?php
ob_start();

?>

<h2>Le réalisateur a bien été supprimé</h2>



<?php

$titreOnglet = "Realisateur supprimé";
$contenu = ob_get_clean();
require "views/template.php";
