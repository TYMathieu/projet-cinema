<?php

ob_start();

$detailGenre = $genre->fetch();

?>


<h2>Modifier un genre</h2>

<div class="content">
  <form action="./index.php?action=editGenre&id=<?= $detailGenre['id'] ?>" method="post">
    <div class="form-group">
      <label for="nom genre">Nom :</label>
      <input class="form-control" type="text" id="genre" name="nom_genre" value="<?= $detailGenre['nom'] ?>" required>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Modifier le genre</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Modifier un genre";
$contenu = ob_get_clean();
require "views/template.php";
