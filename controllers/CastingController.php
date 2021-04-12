<?php

require_once "bdd/DAO.php";

class CastingController
{
  public function addCastingForm($id)
  {
    $dao = new DAO();
    $sql = "SELECT id, titre
    FROM film
    WHERE id = :id";
    $films = $dao->executerRequete($sql, [":id" => $id]);
    $sql2 = "SELECT id, concat(prenom, ' ', nom) AS nom
    FROM acteur";
    $acteurs = $dao->executerRequete($sql2);
    require "views/casting/ajouterCastingForm.php";
  }

  public function addCasting($array, $id)
  {
    $dao = new DAO();
    $acteur = filter_var($array['acteur'], FILTER_SANITIZE_STRING);
    $role = filter_var($array['role'], FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO roles(nom)
      VALUES (:nom)";
    $ajout = $dao->executerRequete($sql, ["nom" => $role]);
    $sql2 = "INSERT INTO casting(film_id, acteur_id, role_id)
    VALUES (:film, :acteur, :roles)";
    $lastid = $dao->getBdd()->lastInsertId();
    $ajout2 = $dao->executerRequete($sql2, [
      ":film" => $id,
      ":acteur" => $acteur,
      ":roles" => $lastid
    ]);
    require "views/casting/ajouterCasting.php";
  }
}
