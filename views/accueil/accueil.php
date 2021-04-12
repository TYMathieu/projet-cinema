<?php

ob_start()

?>

<!-- on affiche un h1 juste pour tester si ça marche -->
<h1>Le PHP c'est chouette ! </h1>

<?php

$titreOnglet = "Accueil";
$contenu = ob_get_clean();
require "views/template.php";
