<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";
require_once "controllers/GenreController.php";
require_once "controllers/ActeurController.php";
require_once "controllers/AgeController.php";
require_once "controllers/CastingController.php";

$ctrlAccueil = new AccueilController;
$ctrlFilm = new FilmController;
$ctrlReal = new RealController;
$ctrlGenre = new GenreController;
$ctrlActeur = new ActeurController;
$ctrlCasting = new CastingController;
$age = new AgeController();

if (isset($_GET['action'])) {

  $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);


  switch ($_GET['action']) {
    case "accueil":
      $ctrlAccueil->pageAccueil();
      break;
    case "listFilms":
      $ctrlFilm->filmsList();
      break;
    case "ajouterFilmForm":
      $ctrlFilm->addFilmForm();
      break;
    case "ajouterFilm":
      $ctrlFilm->addFilm($_POST);
      break;
    case "supprimerFilm":
      $ctrlFilm->deleteFilm($id);
      break;
    case "modifierFilm":
      $ctrlFilm->modifierFilmForm($id);
      break;
    case "modifierFilmSucces":
      $ctrlFilm->editFilm($_POST, $id);
      break;
    case "listReals":
      $ctrlReal->realsList();
      break;
    case "ajouterRealForm":
      $ctrlReal->addRealForm();
      break;
    case "ajouterRealisateur":
      $ctrlReal->addReal($_POST);
      break;
    case "modifierRealisateur":
      $ctrlReal->modifierRealisateurForm($id);
      break;
    case "modifierReal":
      $ctrlReal->editReal($_POST, $id);
      break;
    case "supprimerReal":
      $ctrlReal->deleteReal($id);
      break;
    case "listGenres":
      $ctrlGenre->genresList();
      break;
    case "ajouterGenderForm":
      $ctrlGenre->addGenderForm();
      break;
    case "ajouterGenre":
      $ctrlGenre->addGenre($_POST);
      break;
    case "modifierGenre":
      $ctrlGenre->modifierGenreForm($id);
      break;
    case "editGenre":
      $ctrlGenre->editGenre($_POST, $id);
      break;
    case "supprimerGenre":
      $ctrlGenre->deleteGenre($id);
      break;
    case "listActeurs":
      $ctrlActeur->acteursList();
      break;
    case "ajouterActeurForm":
      $ctrlActeur->addActeurForm();
      break;
    case "ajouterActeur":
      $ctrlActeur->addActor($_POST);
      break;
    case "modifierActeur":
      $ctrlActeur->modifierActeurForm($id);
      break;
    case "modifierActor":
      $ctrlActeur->editActor($_POST, $id);
      break;
    case "supprimerActeur":
      $ctrlActeur->deleteActeur($id);
      break;
    case "detailFilm":
      $ctrlFilm->findOneById($id);
      break;
    case "detailReal":
      $ctrlReal->findOneById($id);
      break;
    case "detailActeur":
      $ctrlActeur->findOneById($id);
      break;
    case "ajouterCastingForm":
      $ctrlCasting->addCastingForm($id);
      break;
    case "ajouterCasting":
      $ctrlCasting->addCasting($_POST, $id);
      break;
  }
} else {
  $ctrlAccueil->pageAccueil();
}
