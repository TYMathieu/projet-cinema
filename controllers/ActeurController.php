<?php

require_once "bdd/DAO.php";

class ActeurController
{
  public function findOneById($id)
  {
    $dao = new DAO();
    $sql = "SELECT id, concat(a.prenom,' ',a.nom) AS nom, a.dateBirth AS age, a.sexe AS gender
    FROM acteur a
    WHERE a.id = :id";
    $acteur = $dao->executerRequete($sql, [":id" => $id]);
    // filmographie
    $sql2 = "SELECT f.titre, r.nom, f.id
    FROM film f
    INNER JOIN casting c
    ON c.acteur_id = :id
    INNER JOIN roles r
    ON r.id = c.role_id
    WHERE f.id = c.film_id";
    $films = $dao->executerRequete($sql2, [":id" => $id]);
    require "views/acteur/detailActeur.php";
  }

  public function acteursList()
  {
    $dao = new DAO();
    $sql =
      "SELECT concat(a.prenom, ' ', a.nom) AS nom , a.dateBirth, a.sexe, id
      from acteur a
      ORDER BY nom DESC";
    $acteurs = $dao->executerRequete($sql);
    require "views/acteur/listActeurs.php";
  }

  public function addActeurForm()
  {
    require "views/acteur/ajouterActeurForm.php";
  }

  public function addActor($array)
  {

    $dao = new DAO();

    $sql = "INSERT INTO acteur(nom, prenom, dateBirth, sexe)
      VALUES (:nom, :prenom, :dateBirth, :sexe)";

    $nom_acteur = filter_var($array['nom_du_acteur'], FILTER_SANITIZE_STRING);
    $prenom_acteur = filter_var($array['prenom_du_acteur'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date = filter_var($array['date_birth'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":nom" => $nom_acteur, ":prenom" => $prenom_acteur, ":dateBirth" => $date, ":sexe" => $sexe]);

    require "views/acteur/ajouterActeur.php";
  }

  public function modifierActeurForm($id)
  {
    $dao = new DAO();
    $sql = "SELECT id, prenom, nom , dateBirth AS age, sexe AS gender
    FROM acteur 
    WHERE id = :id";
    $acteur = $dao->executerRequete($sql, [":id" => $id]);
    require "views/acteur/editActor.php";
  }

  public function editActor($array, $id)
  {

    $dao = new DAO();

    $sql = "UPDATE acteur a
    SET nom = :nom, prenom = :prenom, dateBirth = :dateBirth, sexe = :sexe
    WHERE a.id = :id";

    $nom_acteur = filter_var($array['nom_du_acteur'], FILTER_SANITIZE_STRING);
    $prenom_acteur = filter_var($array['prenom_du_acteur'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date = filter_var($array['date_birth'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":nom" => $nom_acteur, ":prenom" => $prenom_acteur, ":dateBirth" => $date, ":sexe" => $sexe, ':id' => $id]);

    require "views/acteur/modifierActeur.php";
  }

  public function deleteActeur($id)
  {
    $dao = new DAO();
    $sql = "DELETE FROM acteur 
    WHERE id = :id";
    $acteur = $dao->executerRequete($sql, [":id" => $id]);
    require "views/acteur/supprActeur.php";
  }
}

// pour avoir seulement l'année pour la dateSortie : DATE_FORMAT(f.dateSortie, ('%Y')) AS dateSortie