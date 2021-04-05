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

  $user->name_f = $_POST['name_f'];
  $user->name_l = $_POST['name_l'];
  $user->pseudo = $_POST['pseudo'];
  $user->password = sha1($_POST['password']);
  $user->phone = $_POST['phone'];
  $user->mail = $_POST['mail'];
  $user->age = $_POST['age'];
  $user->sex = $_POST['sex'];
  $user->sport = $_POST['sport'];

  if ($response = $user->create()) {
    http_response_code(200);
    $return['data'] = ['id' => $response];
    $return['message'] = "Compte utilisateur crée";
  }
  else{
    http_response_code(503);
    $return['message'] = "Impossible de créer un compte";
  }

  echo json_encode($return);
?>