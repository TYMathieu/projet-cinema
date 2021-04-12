<?php
ob_start();

?>

<h2>Le film a bien été supprimé</h2>



<?php

$titreOnglet = "Acteur supprimé";
$contenu = ob_get_clean();
require "views/template.php";
