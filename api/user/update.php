<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
  include_once '../config/database.php';
  include_once '../ressources/ressources.php';
    
  $database = new Database();
  $db = $database->connect();

  $return = array();
    
  $user = new User($db);

  $user->id = $_GET['param'];
  $user->name_f = $_POST['name_f'];
  $user->name_l = $_POST['name_l'];
  $user->pseudo = $_POST['pseudo'];
  $user->phone = $_POST['phone'];
  $user->mail = $_POST['mail'];
  $user->age = $_POST['age'];
  $user->sex = $_POST['sex'];
  $user->sport = $_POST['sport'];

  if ($_POST['password'] != "") {
    $user->password = sha1($_POST['password']);

    $user->updatePassword();
    http_response_code(201);
    $return['Password'] = "Mot de passe modifié";
  }

  if ($user->update($_GET['param'])) {
      http_response_code(201);
      $return['message'] = "Informations modifiées";
  }
  else{
      http_response_code(503);
      $return['message'] = "Impossible de modifier les informations";
  }

  echo json_encode($return);
?>