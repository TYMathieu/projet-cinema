<?php
ob_start();

?>

<h2>Le film "<?= $_POST[('titre')] ?>"" modifié avec succès (youppppiiii)</h2>



<?php

$titreOnglet = "Film modifié";
$contenu = ob_get_clean();
require "views/template.php";
