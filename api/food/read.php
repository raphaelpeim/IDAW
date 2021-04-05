<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../config/database.php';
  include_once '../ressources/ressources.php';

  $database = new Database();
  $db = $database->connect();

  $return = array();
  
  $food = new Food($db);

  if (isset($_GET['param']))
    $food->name = $_GET['param'];

  if (!empty($_POST)) {
    $food->rowsNumber = $_POST['rowsNumber'];
    $food->firstRow = $_POST['firstRow'];
  }

  if (isset($_GET['param']) && !empty($allFood = $food->getAllByName())) {
    http_response_code(200);
    $return["data"] = $allFood;
  }
  else if (!isset($_GET['param']) && !empty($allFood = $food->getAllByPage())) {
    http_response_code(200);
    $return["data"] = $allFood;
  }
  else {
    http_response_code(404);
    $return["error"] = "Aliment(s) introuvable(s)";
  }
  
  echo json_encode($return);
?>