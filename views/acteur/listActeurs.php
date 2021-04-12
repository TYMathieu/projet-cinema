<?php

ob_start();
$age = new AgeController();

?>
<!-- La modal -->
<div class="modalPlace"></div>

<h1>Liste des acteurs enregistrés : </h1>
<!-- <h2>Il y a <?php // $films->rowCount(); 
                ?> films dans le tableau </h2> -->

<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date de naissance</th>
      <th>Genre</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($acteur = $acteurs->fetch()) {
      echo "<tr class='Acteur' id='" . $acteur['id'] . "'><td><a href='index.php?action=detailActeur&id=" . $acteur['id'] . "'>" . $acteur["nom"] . "</a></td>";
      echo "<td>" . $age->toAge(new DateTime($acteur["dateBirth"])) . " ans</td>";
      echo "<td>" . $acteur["sexe"] . "</td>";
      echo "<td><a href='index.php?action=modifierActeur&id=" . $acteur['id'] . "'><i class='fas fa-edit'></i></td>";
      echo '<td><span class="modalTable" data-toggle="modal" data-target="#modal"><i class="fas fa-trash-alt"></i></span></td></tr>';
    }
    ?>
  </tbody>
</table>

<a href="index.php?action=ajouterActeurForm">Ajouter un nouvel acteur</a>
<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$acteurs->closeCursor();
$titreOnglet = "liste des acteurs";
$contenu = ob_get_clean();
require "views/template.php";
