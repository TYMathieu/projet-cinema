<?php

ob_start();
$detailReal = $real->fetch();

// code à finir car j'ai mal copié !

?>

<h2><?php $detailReal['realisateur']; ?></h2>
<?php
$titre = "Détail du réalisateur" . $detailReal["realisateur"];
$contenu = ob_get_clean();
require "views/template.php";
