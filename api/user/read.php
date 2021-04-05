<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../config/database.php';
  include_once '../ressources/ressources.php';

  $database = new Database();
  $db = $database->connect();

  $return = array();
  
  $user = new User($db);

  if ($_GET['param'])
    if (intval($_GET['param']))
      $user->id = $_GET['param'];
    else
      $user->pseudo = $_GET['param'];

  if ($_GET['param'] && intval($_GET['param']) && !empty($users = $user->getById())) {
    http_response_code(200);
    $return["data"] = $users;
  }
  else if ($_GET['param'] && !intval($_GET['param']) && !empty($users = $user->getByPseudo())) {
    http_response_code(200);
    $return["data"] = $users;
  }
  else if (!$_GET['param'] && !empty($users = $user->getAll())) {
    http_response_code(200);
    $return["data"] = $users;
  }
  else {
    http_response_code(404);
    $return["error"] = "Utilisateur(s) introuvable(s)";
  }
  
  echo json_encode($return);
?>