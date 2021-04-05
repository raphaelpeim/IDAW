<?php
  setcookie('IMMUserId', '', time()-3600, '/IMT/Projet/app');
  header('Location: index.php');
?>