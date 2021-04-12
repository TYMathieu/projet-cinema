<?php

ob_start();


?>


<h2>Ajouter le film</h2>

<div class="content">
  <form action="./index.php?action=ajouterFilm" method="post">
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input class="form-control" type="text" id="titre_film" name="titre" placeholder="La planète des singes" required>
    </div>
    <div class="form-group">
      <label for="date">Date de sortie :</label>
      <input class="form-control" type="date" id="date_sortie" name="date" required>
    </div>
    <div class="form-group">
      <label for="resume">Résumé :</label>
      <textarea class="form-control" type="text" id="resume_film" name="resume" placeholder="Il était une fois..." required></textarea>
    </div>
    <div class="form-group">
      <label for="notes">Note :</label>
      <input type="number" id="notes" name="note_film" min='0' max='5' required>
    </div>
    <div class="form-group">
      <label for="duree">Durée (en minutes) :</label>
      <input type="number" id="duree" name="duree_film" min='0' max='5000' required>
    </div>
    <div>
      <select name="genref[]" multiple required>
        <?php
        while ($nomGenre = $listeGenres->fetch()) {
          echo  "<option value=" . $nomGenre['id'] . ">" . $nomGenre['nom'] . "</option>";
        }
        ?>
      </select>
    </div>
    <div>
      <select name="realisateur">
        <?php
        while ($nomReal = $listeRealisateurs->fetch()) {
          echo  "<option value=" . $nomReal['id_realisateur'] . ">" . $nomReal['nom'] . "</option>";
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
$titreOnglet = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";
