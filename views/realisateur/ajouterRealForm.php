<?php

ob_start();


?>


<h2>Ajouter un realisateur</h2>

<div class="content">
  <form action="./index.php?action=ajouterRealisateur" method="post">
    <div class="form-group">
      <label for="nom realisateur">Nom du réalisateur :</label>
      <input class="form-control" type="text" id="nom_realisateur" name="nom_du_realisateur" placeholder="Durand" required>
    </div>
    <div class="form-group">
      <label for="prenom realisateur">Prénom du réalisateur :</label>
      <input class="form-control" type="text" id="prenom_realisateur" name="prenom_du_realisateur" placeholder="Mamadou" required>
    </div>
    <div class="form-group">
      <label for="dateBirth">Date de naissance :</label>
      <input class="form-control" type="date" id="dateBirth" name="date_birth" required>
    </div>
    <div class="form-group">
      <label for="sexe realisateur">Sexe du réalisateur :</label>
      <select class="form-control" id="sexe_realisateur" name="sexe" required>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
      </select>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Ajouter le réalisateur</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Ajouter un realisateur";
$contenu = ob_get_clean();
require "views/template.php";
