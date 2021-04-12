<?php
ob_start();
?>

<h2>Casting rajouté avec succès !</h2>



<?php

$titreOnglet = "Casting ajouté";
$contenu = ob_get_clean();
require "views/template.php";
