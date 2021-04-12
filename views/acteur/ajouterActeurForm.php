<?php

ob_start();


?>


<h2>Ajouter un acteur</h2>

<div class="content">
  <form action="./index.php?action=ajouterActeur" method="post">
    <div class="form-group">
      <label for="nom acteur">Nom de l'acteur :</label>
      <input class="form-control" type="text" id="nom_acteur" name="nom_du_acteur" placeholder="Durand" required>
    </div>
    <div class="form-group">
      <label for="prenom acteur">Prénom de l'acteur :</label>
      <input class="form-control" type="text" id="prenom_acteur" name="prenom_du_acteur" placeholder="Mamadou" required>
    </div>
    <div class="form-group">
      <label for="dateBirth">Date de naissance :</label>
      <input class="form-control" type="date" id="dateBirth" name="date_birth" required>
    </div>
    <div class="form-group">
      <label for="sexe acteur">Sexe de l'acteur :</label>
      <select class="form-control" id="sexe_acteur" name="sexe" required>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
      </select>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Ajouter l'acteur</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";
