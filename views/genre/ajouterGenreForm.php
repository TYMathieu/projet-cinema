<?php

ob_start();


?>


<h2>Ajouter un genre</h2>

<div class="content">
  <form action="./index.php?action=ajouterGenre" method="post">
    <div class="form-group">
      <label for="nom genre">Nom :</label>
      <input class="form-control" type="text" id="nom_genre" name="libelle" placeholder="Horreur" required>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Ajouter le genre</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Ajouter un genre";
$contenu = ob_get_clean();
require "views/template.php";
