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
    
  $food = new Food($db);
  
  $food->name = $_POST['name'];
  $food->category = $_POST['category'];
  $food->calories = $_POST['calories'];
  $food->lipids = $_POST['lipids'];
  $food->sodium = $_POST['sodium'];
  $food->potassium = $_POST['potassium'];
  $food->carbohydrates = $_POST['carbohydrates'];
  $food->proteins = $_POST['proteins'];

  if ($food->create()) {
    http_response_code(200);
    $return['message'] = "Aliment ajouté";
  }
  else{
    http_response_code(503);
    $return['message'] = "Impossible d'ajouter l'aliment";
  }

  echo json_encode($return);
?>