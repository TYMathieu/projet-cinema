<?php

ob_start()

?>
<!-- La modal -->
<div class="modalPlace"></div>

<h1>Liste des films enregistrés : </h1>
<!-- <h2>Il y a <?php // $films->rowCount(); 
                ?> films dans le tableau </h2> -->

<table class="table">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Sortie</th>
      <th>Duree</th>
      <th>Nom du réalisateur</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php //f.id_realisateur, nom
    while ($film = $films->fetch()) {
      echo "<tr class='Film' id='" . $film['id'] . "'><td><a href='index.php?action=detailFilm&id=" . $film['id'] . "'>" . $film["titre"] . "</a></td>";
      echo "<td>" . $film["dateSortie"] . "</td>";
      echo "<td>" . $film["duree"] . "</td>";
      echo "<td><a href='index.php?action=detailReal&id=" . $film['id_realisateur'] . "'>" . $film['nom'] . "</a></td>";
      echo "<td><a href='index.php?action=modifierFilm&id=" . $film['id'] . "'><i class='fas fa-edit'></i></td>";
      echo '<td><span class="modalTable" data-toggle="modal" data-target="#modal"><i class="fas fa-trash-alt"></i></span></td></tr>';
    }
    ?>
  </tbody>
</table>

<a href="index.php?action=ajouterFilmForm">Ajouter un nouveau film</a>
<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$films->closeCursor();
$titreOnglet = "liste des films";
$contenu = ob_get_clean();
require "views/template.php";
