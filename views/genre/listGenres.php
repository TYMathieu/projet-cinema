<?php

ob_start()

?>
<!-- La modal -->
<div class="modalPlace"></div>


<h1>Liste des genres enregistrés : </h1>

<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php //f.id_realisateur, nom
    while ($genre = $genres->fetch()) {
      echo "<tr class='Genre' id='" . $genre['id'] . "'><td>" . $genre["nom"] . "</td>";
      echo "<td><a href='index.php?action=modifierGenre&id=" . $genre['id'] . "'><i class='fas fa-edit'></i></td>";
      echo '<td><span class="modalTable" data-toggle="modal" data-target="#modal"><i class="fas fa-trash-alt"></i></span></td></tr>';
    }
    ?>
  </tbody>
</table>

<!-- Lien pour ajouter un nouveau genre -->
<a href="index.php?action=ajouterGenderForm">Ajouter un nouveau genre</a>
<?php

// On utilise closeCursor() pour éviter les erreurs s'il y a de multiples requêtes sur une même page
$genres->closeCursor();
$titreOnglet = "liste des genres";
$contenu = ob_get_clean();
require "views/template.php";
