<?php
ob_start();

?>

<h2>Le genre a bien été supprimé</h2>



<?php

$titreOnglet = "Genre supprimé";
$contenu = ob_get_clean();
require "views/template.php";
