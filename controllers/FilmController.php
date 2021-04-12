<?php

require_once "bdd/DAO.php";

class FilmController
{

  public function findOneById($id)
  {
    $dao = new DAO();
    // Détail du film
    $sql = "SELECT id, titre, dateSortie, resumeFilm, note, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%Hh%i') AS duree, 
    imgPath as img, concat(r.prenom,' ',r.nom) AS realisateur, f.id_realisateur
    FROM film f
    INNER JOIN realisateur r
    ON r.id_realisateur = f.id_realisateur
    WHERE id = :id
    ";
    $film = $dao->executerRequete($sql, [":id" => $id]);
    $dao = new DAO();
    // Liste des genres
    $genre =
      "SELECT g.libelle as nom
    FROM genre g
    INNER JOIN est_classifié e
    ON e.genre_id = g.id
    AND e.film_id = :id";
    $genres = $dao->executerRequete($genre, [":id" => $id]);
    // Liste des acteurs
    $acteur = "SELECT concat(a.prenom,' ',a.nom) AS nom, a.id
    FROM acteur a
    INNER JOIN casting c
    ON c.film_id = :id
    WHERE c.acteur_id = a.id";
    $acteurs = $dao->executerRequete($acteur, [":id" => $id]);
    require "views/film/detailFilm.php";
  }

  public function filmReal($id)
  {
    $dao = new DAO();
    $sql = "SELECT titre
    FROM film 
    WHERE id = :id
    ";
    $film = $dao->executerRequete($sql, [":id" => $id]);
  }

  public function filmsList()
  {
    $dao = new DAO();
    $sql =
      "SELECT f.id, f.titre, f.dateSortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%Hh%i') AS duree, f.id_realisateur, concat(r.prenom,' ',r.nom) AS nom 
      from film f
      INNER JOIN realisateur r
      ON r.id_realisateur = f.id_realisateur
      ORDER BY f.titre DESC";
    $films = $dao->executerRequete($sql);
    require "views/film/listFilms.php";
  }

  public function addFilmForm()
  {
    $dao = new DAO();
    $sql1 = "SELECT DISTINCT (CONCAT(prenom, ' ', nom)) AS 'nom', id_realisateur FROM realisateur";
    $sql2 = "SELECT id, libelle AS nom FROM genre";
    $listeRealisateurs = $dao->executerRequete($sql1);
    $listeGenres = $dao->executerRequete($sql2);
    require "views/film/ajouterFilmForm.php";
  }

  public function addFilm($array)
  {
    $dao = new DAO();
    $sql = "INSERT INTO film(titre, dateSortie, resumeFilm, note, duree, id_realisateur)
            VALUES (:titre, :sortie, :synopsis, :note, :duree, :id)";
    $titre = filter_var($array["titre"], FILTER_SANITIZE_STRING);
    $sortie = filter_var($array["date"], FILTER_SANITIZE_STRING);
    $resume = filter_var($array["resume"], FILTER_SANITIZE_STRING);
    $note = filter_var($array["note_film"], FILTER_SANITIZE_STRING);
    $duree = filter_var($array["duree_film"], FILTER_SANITIZE_STRING);
    $real = filter_var($array["realisateur"], FILTER_SANITIZE_STRING);
    $add = $dao->executerRequete($sql, [":titre" => $titre, ":sortie" => $sortie, ":synopsis" => $resume, ":note" => $note, ":duree" => $duree, ":id" => $real]);

    $lastID = $dao->getBdd()->lastInsertId();

    $sql2 = "INSERT INTO est_classifié(genre_id, film_id)
    VALUES (:idgenre, :idfilm)";

    $genre = filter_var_array($array['genref'], FILTER_SANITIZE_STRING);

    require "views/film/ajouterFilm.php";

    foreach ($genre as $genreActuel) {
      $addGenre = $dao->executerRequete($sql2, [":idgenre" => $genreActuel, ":idfilm" => $lastID]);
    }
  }

  public function deleteFilm($id)
  {
    $dao = new DAO();
    $sql = "DELETE FROM film 
    WHERE id = :id";
    $film = $dao->executerRequete($sql, [":id" => $id]);
    require "views/film/supprFilm.php";
  }

  public function modifierFilmForm($id)
  {
    $dao = new DAO();
    $sql = "SELECT id, titre, dateSortie AS sortie, resumeFilm AS synopsis, note, duree, id_realisateur
    FROM film 
    WHERE id = :id";
    $film = $dao->executerRequete($sql, [":id" => $id]);
    $sql1 = "SELECT DISTINCT (CONCAT(prenom, ' ', nom)) AS 'nom', id_realisateur FROM realisateur";
    $sql2 = "SELECT id, libelle AS nom FROM genre";
    $sql3 = "SELECT genre_id FROM est_classifié WHERE film_id = :id";
    $listeRealisateurs = $dao->executerRequete($sql1);
    $listeGenres = $dao->executerRequete($sql2);
    $casting = $dao->executerRequete($sql3, [":id" => $id]);
    require "views/film/editFilm.php";
  }

  public function editFilm($array, $id)
  {

    $dao = new DAO();

    $sql = "UPDATE film
    SET titre = :titre, dateSortie = :sortie, resumeFilm = :synopsis, note = :note, duree = :duree, id_realisateur = :id_realisateur
    WHERE id = :id";
    $titre = filter_var($array["titre"], FILTER_SANITIZE_STRING);
    $sortie = filter_var($array["date"], FILTER_SANITIZE_STRING);
    $resume = filter_var($array["resume"], FILTER_SANITIZE_STRING);
    $note = filter_var($array["note_film"], FILTER_SANITIZE_STRING);
    $duree = filter_var($array["duree_film"], FILTER_SANITIZE_STRING);
    $real = filter_var($array["realisateur"], FILTER_SANITIZE_STRING);

    $ajout = $dao->executerRequete($sql, [":titre" => $titre, ":sortie" => $sortie, ":synopsis" => $resume, ":note" => $note, ":duree" => $duree, ":id_realisateur" => $real, ":id" => $id]);

    // Suppression des genres du film en question
    $sql2 = "DELETE FROM est_classifié
    WHERE film_id = :id";
    $delete = $dao->executerRequete($sql2, [":id" => $id]);

    // Ajout des genres du film a nouveau
    $sql3 = "INSERT INTO est_classifié(genre_id, film_id)
    VALUES (:idgenre, :idfilm)";
    $genre = filter_var_array($array['genref'], FILTER_SANITIZE_STRING);
    foreach ($genre as $genreActuel) {
      $addGenre = $dao->executerRequete($sql3, [":idgenre" => $genreActuel, ":idfilm" => $id]);
    }

    require "views/film/modifierFilm.php";
  }
}

// pour avoir seulement l'année pour la dateSortie : DATE_FORMAT(f.dateSortie, ('%Y')) AS dateSortie