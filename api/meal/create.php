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
    
  $meal = new Meal($db);
  
  $meal->user = $_GET['param'];
  $meal->food = $_POST['food'];
  $meal->quantity = $_POST['quantity'];
  $meal->date = $_POST['date'];

  if ($meal->create()) {
    http_response_code(200);
    $return['message'] = "Repas ajouté";
  }
  else{
    http_response_code(503);
    $return['message'] = "Impossible d'ajouter le repas";
  }

  echo json_encode($return);
?>