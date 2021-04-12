<?php

ob_start();

$detailActor = $acteur->fetch();

?>


<h2>Modifier un acteur</h2>

<div class="content">
  <form action="./index.php?action=modifierActor&id=<?= $detailActor['id'] ?>" method="post">
    <div class="form-group">
      <label for="nom acteur">Nom de l'acteur :</label>
      <input class="form-control" type="text" id="nom_acteur" name="nom_du_acteur" value="<?= $detailActor['nom'] ?>" required>
    </div>
    <div class="form-group">
      <label for="prenom acteur">Prénom de l'acteur :</label>
      <input class="form-control" type="text" id="prenom_acteur" name="prenom_du_acteur" value="<?= $detailActor['prenom'] ?>" required>
    </div>
    <div class="form-group">
      <label for="dateBirth">Date de naissance :</label>
      <input class="form-control" type="date" id="dateBirth" name="date_birth" value="<?= $detailActor['age']; ?>" required>
    </div>
    <div class="form-group">
      <label for="sexe acteur">Sexe de l'acteur :</label>
      <select class="form-control" id="sexe_acteur" name="sexe" required>
        <option value="Homme" <?php if ($detailActor['gender'] == "Homme") {
                                echo "selected";
                              } ?>>Homme</option>
        <option value="Femme" <?php if ($detailActor['gender'] == "Femme") {
                                echo "selected";
                              } ?>>Femme</option>
        <option value="Non Binaire">Non Binaire</option>
      </select>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Modifier l'acteur</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Modifier un acteur";
$contenu = ob_get_clean();
require "views/template.php";
