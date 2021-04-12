<?php

ob_start();
$age = new AgeController();

?>



<h1>Liste des réalisateurs enregistrés : </h1>
<!-- <h2>Il y a <?php // $films->rowCount(); 
                ?> films dans le tableau </h2> -->

<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Age</th>
      <th>Genre</th>
      <th>Modifier</th>
    </tr>
  </thead>
  <tbody>
    <?php //f.id_realisateur, nom
    while ($real = $reals->fetch()) {
      echo "<tr><td><a href='index.php?action=detailReal&id=" . $real['id_realisateur'] . "'>" . $real['nom'] . "</td>";
      echo "<td>" . $age->toAge(new DateTime($real["age"])) . " ans</td>";
      echo "<td>" . $real["gender"] . "</td>";
      echo "<td><a href='index.php?action=modifierRealisateur&id=" . $real['id_realisateur'] . "'><i class='fas fa-edit'></i></td></tr>";
    }
    ?>
  </tbody>
</table>

<a href="index.php?action=ajouterRealForm">Ajouter un nouveau réalisateur</a>
<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$reals->closeCursor();
$titreOnglet = "liste des réalisateurs";
$contenu = ob_get_clean();
require "views/template.php";
