<?php

ob_start();
$age = new AgeController();

$detailActeur = $acteur->fetch();

?>

<h1><?= $detailActeur["nom"] ?></h1>
<p>Age : <?= $age->toAge(new DateTime($detailActeur["age"])) ?> ans<br>Sexe : <?= $detailActeur['gender']; ?></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Film</th>
      <th scope="col">Rôle</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($film = $films->fetch()) {
      echo "<tr><th><a href='index.php?action=detailFilm&id=" . $film['id'] . "'>" . $film['titre'] . "</th>";
      echo "<th>" . $film['nom'] . "</th></tr>";
    }
    ?>
  </tbody>
</table>


<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$acteur->closeCursor();
$titreOnglet = "Détails de l'acteur";
$contenu = ob_get_clean();
require "views/template.php";
