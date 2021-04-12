<?php

ob_start();

$detailFilm = $film->fetch();
$tableau = array();
while ($cast = $casting->fetch()) {
  array_push($tableau, $cast['genre_id']);
}
var_dump($tableau);


?>


<h2>Modifier un film</h2>

<div class="content">
  <form action="./index.php?action=modifierFilmSucces&id=<?= $detailFilm['id'] ?>" method="post">
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input class="form-control" type="text" id="titre_film" name="titre" value="<?= $detailFilm["titre"] ?>" required>
    </div>
    <div class="form-group">
      <label for="date">Date de sortie :</label>
      <input class="form-control" type="date" id="date_sortie" name="date" value="<?= $detailFilm["sortie"] ?>" required>
    </div>
    <div class="form-group">
      <label for="resume">Résumé :</label>
      <textarea class="form-control" type="text" id="resume_film" name="resume" required><?= $detailFilm["synopsis"] ?></textarea>
    </div>
    <div class="form-group">
      <label for="notes">Note :</label>
      <input type="number" id="notes" name="note_film" min='0' max='5' value="<?= $detailFilm["note"] ?>" required>
    </div>
    <div class="form-group">
      <label for="duree">Durée (en minutes) :</label>
      <input type="number" id="duree" name="duree_film" min='0' max='5000' value="<?= $detailFilm["duree"] ?>" required>
    </div>
    <div>
      <select name="genref[]" multiple required>
        <?php
        while ($nomGenre = $listeGenres->fetch()) {
          echo  "<option value=" . $nomGenre['id'];
          if (in_array($nomGenre['id'], $tableau)) {
            echo " selected ";
          }
          echo  ">" . $nomGenre['nom'] . "</option>";
        }
        ?>
      </select>
    </div>
    <div>
      <select name="realisateur" ?>">
        <?php
        while ($nomReal = $listeRealisateurs->fetch()) {
          echo  "<option value=" . $nomReal['id_realisateur'];
          if ($nomReal['id_realisateur'] == $detailFilm['id_realisateur']) {
            echo " selected ";
          }
          echo  ">" . $nomReal['nom'] . "</option>";
        }
        ?>
      </select>
    </div>
    <!-- Fin -->
    <div>
      <br><button class="btn btn-primary" type="submit">Ajouter le film</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Modifier un film";
$contenu = ob_get_clean();
require "views/template.php";
