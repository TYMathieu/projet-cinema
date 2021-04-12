<?php

ob_start();
$age = new AgeController();

$detailReal = $realisateur->fetch();

?>

<h1><?= $detailReal["nom"] ?></h1>
<p>Age : <?= $age->toAge(new DateTime($detailReal["age"])) ?> ans<br>Sexe : <?= $detailReal['gender']; ?></p>
<ul class="list-group">
  <?php while ($film = $films->fetch()) {
    echo "<li class='list-group-item'>" . $film['titre'] . "</li>";
  }
  ?>
</ul>
<br><button id="modalButton" class="btn btn-danger" data-toggle="modal" data-target="#modal">Supprimer le réalisateur</button>

<!-- La modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer <?= $detailReal["nom"] ?> de la base de donnée ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
        <a href="index.php?action=supprimerReal&id=<?= $detailReal["id_realisateur"]; ?>" class="btn btn-danger">Oui</a>
      </div>
    </div>
  </div>
</div>





<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$realisateur->closeCursor();
$titreOnglet = "Détails du réalisateur";
$contenu = ob_get_clean();
require "views/template.php";
