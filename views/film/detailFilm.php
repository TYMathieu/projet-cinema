<?php

ob_start();


$detail = $film->fetch();
$row = 1;

?>

<h1><?= $detail["titre"]; ?></h1>
<div class="container moviehead">
  <div class="row">
    <div class="col">
      <figure class="imgAffiche">
        <img src="<?= $detail["img"]; ?>" alt="affiche de<?= $detail["titre"]; ?>">
      </figure>
    </div>
    <div class="col-8">
      <p><?= $detail["dateSortie"]; ?> / <?= $detail["duree"]; ?> /
        <?php
        while ($genre = $genres->fetch()) {
          if ($row == 1) {
            echo $genre['nom'];
            $row++;
          } else {
            echo ', ' . $genre['nom'];
          }
        }
        $row = 1;
        ?>
        <br>De <a href='index.php?action=detailReal&id=<?= $detail['id_realisateur'] ?>"'> <?= $detail["realisateur"] ?> </a>
        <br>Avec <?php
                  while ($acteur = $acteurs->fetch()) {
                    if ($row == 1) {
                      echo "<a href='index.php?action=detailActeur&id=" . $acteur["id"] . "'>" . $acteur['nom'] . "</a>";
                      $row++;
                    } else {
                      echo ", <a href='index.php?action=detailActeur&id=" . $acteur["id"] . "'>" . $acteur['nom'] . "</a>";
                    }
                  }
                  ?>
      </p>
    </div>
  </div>
</div>

<a href="index.php?action=ajouterCastingForm&id=<?= $detail['id'] ?>">Ajouter un nouvel acteur</a>


<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$film->closeCursor();
$titreOnglet = $detail["titre"];
$contenu = ob_get_clean();
require "views/template.php";
