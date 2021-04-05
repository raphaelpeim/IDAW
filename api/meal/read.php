<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../config/database.php';
  include_once '../ressources/ressources.php';

  $database = new Database();
  $db = $database->connect();

  $return = array();
  
  $meal = new Meal($db);

  $meal->user = $_GET['param'];
  $meal->firstRow = $_POST['firstRow'];
  $meal->rowsNumber = $_POST['rowsNumber'];

  if ($_POST['diary'] && !empty($allMeal = $meal->getAllMealByUser())) {
    http_response_code(200);
    $return["data"] = $allMeal;
  }
  else if (!$_POST['diary'] && !empty($allMeal = $meal->getAllByUser())) {
    http_response_code(200);
    $return["data"] = $allMeal;
  }
  else {
    http_response_code(404);
    $return["error"] = "Non";
  }
  
  echo json_encode($return);
?>