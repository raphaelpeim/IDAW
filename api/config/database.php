<?php
  class Database {
    public function connect() {
      DEFINE('DB_USERNAME', 'raphael.peim');
      DEFINE('DB_PASSWORD', 'xKhAtq96');
      DEFINE('DB_HOST', 'localhost');
      DEFINE('DB_DATABASE', 'raphael_peim');

      $sqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

      if (mysqli_connect_error())
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

      return $sqli;
    }
  }
?>
