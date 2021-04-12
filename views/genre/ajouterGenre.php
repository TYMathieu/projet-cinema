<?php
ob_start();

?>

<h2>Le genre "<?= $_POST[('libelle')] ?>"" a été rajouté avec succès !</h2>



<?php

$titreOnglet = "Realisateur ajouté";
$contenu = ob_get_clean();
require "views/template.php";
