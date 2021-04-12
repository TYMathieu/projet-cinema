<?php

require_once "./bdd/DAO.php";

class AgeController
{

  public function toAge($date)
  {
    $date2 = new DateTime();
    $diff = $date->diff($date2);
    return $diff->y;
  }
}
