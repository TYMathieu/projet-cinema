<?php

require_once "bdd/DAO.php";

class RealController
{

  public function findOneById($id, $require = true)
  {
    $dao = new DAO();
    $sql = "SELECT id_realisateur, concat(r.prenom,' ',r.nom) AS nom, r.dateBirth AS age, r.sexe AS gender
    FROM realisateur r
    WHERE r.id_realisateur = :id";
    $realisateur = $dao->executerRequete($sql, [":id" => $id]);
    // filmographie
    $sql2 = "SELECT f.titre
    FROM film f
    WHERE f.id_realisateur = :id";
    $films = $dao->executerRequete($sql2, [":id" => $id]);
    if ($require) {
      require "views/realisateur/detailReal.php";
    }
  }

  public function realsList()
  {
    $dao = new DAO();
    $sql =
      "SELECT concat(r.prenom, ' ', r.nom) AS nom, r.dateBirth AS age, r.sexe AS gender, id_realisateur
      from realisateur r
      ORDER BY nom DESC";
    $reals = $dao->executerRequete($sql);
    require "views/realisateur/listReals.php";
  }

  public function addRealForm()
  {
    require "views/realisateur/ajouterRealForm.php";
  }

  public function addReal($array)
  {

    $dao = new DAO();

    $sql = "INSERT INTO realisateur(nom, prenom, dateBirth, sexe)
      VALUES (:nom, :prenom, :dateBirth, :sexe)";

    $nom_realisateur = filter_var($array['nom_du_realisateur'], FILTER_SANITIZE_STRING);
    $prenom_realisateur = filter_var($array['prenom_du_realisateur'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date = filter_var($array['date_birth'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":nom" => $nom_realisateur, ":prenom" => $prenom_realisateur, ":dateBirth" => $date, ":sexe" => $sexe]);

    require "views/realisateur/ajouterRealisateur.php";
  }

  public function modifierRealisateurForm($id)
  {
    $dao = new DAO();
    $sql = "SELECT id_realisateur, r.prenom, r.nom , r.dateBirth AS age, r.sexe AS gender
    FROM realisateur r
    WHERE r.id_realisateur = :id";
    $realisateur = $dao->executerRequete($sql, [":id" => $id]);
    require "views/realisateur/editReal.php";
  }

  public function editReal($array, $id)
  {

    $dao = new DAO();

    $sql = "UPDATE realisateur r
    SET nom = :nom, prenom = :prenom, dateBirth = :dateBirth, sexe = :sexe
    WHERE r.id_realisateur = :id";

    $nom_realisateur = filter_var($array['nom_du_realisateur'], FILTER_SANITIZE_STRING);
    $prenom_realisateur = filter_var($array['prenom_du_realisateur'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date = filter_var($array['date_birth'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":nom" => $nom_realisateur, ":prenom" => $prenom_realisateur, ":dateBirth" => $date, ":sexe" => $sexe, ':id' => $id]);

    require "views/realisateur/modifierRealisateur.php";
  }

  public function deleteReal($id)
  {
    $dao = new DAO();
    $sql = "DELETE FROM realisateur 
    WHERE id_realisateur = :id";
    $realisateur = $dao->executerRequete($sql, [":id" => $id]);
    require "views/realisateur/supprReal.php";
  }
}

// SELECT f.titre, f.dateSortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%Hh%i') AS duree, f.id_realisateur, concat(r.prenom,' ',r.nom) AS nom 