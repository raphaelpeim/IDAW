<?php
  DEFINE('DB_USERNAME', 'raphael.peim');
  DEFINE('DB_PASSWORD', 'xKhAtq96');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'raphael_peim');

  $sqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error())
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

  session_start();
  include_once('variables.php');

//  if ($pageName != 'index' && $pageName != 'signup' && !$_COOKIE['IMMUserId'])
//    header('Location: index.php');
//  else if (($pageName == 'index' || $pageName == 'signup') && $_COOKIE['IMMUserId'])
//    header('Location: home.php');

  echo '<title>' . $pagesTitles[$pageName] . '</title>';
?>

<meta charset="utf-8">
<meta name="author" content="Raphaël Peim and Marin Leicknam">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="App to save and see what you eat ans even more...">

<link href="css/style.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/clean-blog.css" rel="stylesheet">
