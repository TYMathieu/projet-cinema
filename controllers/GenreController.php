<?php

require_once "bdd/DAO.php";

class GenreController
{

  public function genresList()
  {
    $dao = new DAO();
    $sql =
      "SELECT libelle as nom, id
      from genre
      ORDER BY libelle DESC";
    $genres = $dao->executerRequete($sql);
    require "views/genre/listGenres.php";
  }

  public function addGenderForm()
  {
    require "views/genre/ajouterGenreForm.php";
  }

  public function addGenre($array)
  {

    $dao = new DAO();

    $sql = "INSERT INTO genre(libelle)
      VALUES (:libelle)";

    $libelle = filter_var($array['libelle'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":libelle" => $libelle]);

    require "views/genre/ajouterGenre.php";
  }

  public function modifierGenreForm($id)
  {
    $dao = new DAO();
    $sql = "SELECT libelle as nom, id
    FROM genre
    WHERE id = :id";
    $genre = $dao->executerRequete($sql, [":id" => $id]);
    require "views/genre/editGenre.php";
  }

  public function editGenre($array, $id)
  {

    $dao = new DAO();

    $sql = "UPDATE genre 
    SET libelle = :nom
    WHERE id = :id";

    $nom = filter_var($array['nom_genre'], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":nom" => $nom, ':id' => $id]);

    require "views/genre/modifierGenre.php";
  }

  public function deleteGenre($id)
  {
    $dao = new DAO();
    $sql = "DELETE FROM genre 
    WHERE id = :id";
    $realisateur = $dao->executerRequete($sql, [":id" => $id]);
    require "views/genre/supprGenre.php";
  }
}

// pour avoir seulement l'année pour la dateSortie : DATE_FORMAT(f.dateSortie, ('%Y')) AS dateSortie