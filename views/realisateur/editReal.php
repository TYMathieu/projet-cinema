<?php

ob_start();

$detailReal = $realisateur->fetch();

?>


<h2>Modifier un realisateur</h2>

<div class="content">
  <form action="./index.php?action=modifierReal&id=<?= $detailReal['id_realisateur'] ?>" method="post">
    <div class="form-group">
      <label for="nom realisateur">Nom du réalisateur :</label>
      <input class="form-control" type="text" id="nom_realisateur" name="nom_du_realisateur" value="<?= $detailReal['nom'] ?>" required>
    </div>
    <div class="form-group">
      <label for="prenom realisateur">Prénom du réalisateur :</label>
      <input class="form-control" type="text" id="prenom_realisateur" name="prenom_du_realisateur" value="<?= $detailReal['prenom'] ?>" required>
    </div>
    <div class="form-group">
      <label for="dateBirth">Date de naissance :</label>
      <input class="form-control" type="date" id="dateBirth" name="date_birth" value="<?= $detailReal['age']; ?>" required>
    </div>
    <div class="form-group">
      <label for="sexe realisateur">Sexe du réalisateur :</label>
      <select class="form-control" id="sexe_realisateur" name="sexe" required>
        <option value="Homme" <?php if ($detailReal['gender'] == "Homme") {
                                echo "selected";
                              } ?>>Homme</option>
        <option value="Femme" <?php if ($detailReal['gender'] == "Femme") {
                                echo "selected";
                              } ?>>Femme</option>
      </select>
    </div>
    <div>
      <br><button class="btn btn-primary" type="submit">Modifier le réalisateur</button>
    </div>
  </form>
</div>

<?php
$titreOnglet = "Modifier un realisateur";
$contenu = ob_get_clean();
require "views/template.php";
