<?php

ob_start();
$detailFilm = $films->fetch();

?>


<h2>Ajouter un casting</h2>

<div class="content">
  <form action="./index.php?action=ajouterCasting&id=<?= $detailFilm['id'] ?>" method="post">
    <div class="form-group">
      <p>Nom du film : <?= $detailFilm['titre'] ?></p>
    </div>
    <div class="form-group">
      <label for="acteur">Acteur : </label>
      <select class="form-control" type="text" id="acteur" name="acteur" required>
        <?php
        while ($acteur = $acteurs->fetch()) {
          echo "<option value =" . $acteur['id'] . ">" . $acteur['nom'] . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="role">Rôle :</label>
      <input class="form-control" type="text" id="role" name="role" required>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Ajouter le casting</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Ajouter un casting";
$contenu = ob_get_clean();
require "views/template.php";
