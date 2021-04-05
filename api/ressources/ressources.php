<?php
  abstract class Ressource {
    private $conn;
    private $table;

    public $id;

    public function __construct($db, $table){
      $this->conn = $db;
      $this->table = $table;
    }

    public function getConn() {
      return $this->conn;
    }

    public function getTable() {
      return $this->table;
    }

    public function getAll() {
      $all = $this->getConn()->query("SELECT * FROM " . $this->getTable());

      return $all->fetch_all(MYSQLI_ASSOC);
    }
  }

  class User extends Ressource {
    public $name_f;
    public $name_l;
    public $pseudo;
    public $password;
    public $phone;
    public $mail;
    public $age;
    public $sex;
    public $sport;

    public function __construct($db){
      parent::__construct($db, "users");
    }

    public function getById() {
      $user = $this->getConn()->query("SELECT * FROM `users` WHERE `id` = '" . $this->id . "'");
      return $user->fetch_assoc();
    }

    public function getByPseudo() {
      $user = $this->getConn()->query("SELECT * FROM `users` WHERE `pseudo` = '" . $this->pseudo . "'");
      return $user->fetch_assoc();
    }

    public function create() {
      $query = $this->getConn()->query(
        " INSERT INTO `" . $this->getTable() . "` (
            `name_f`, 
            `name_l`, 
            `pseudo`, 
            `password`, 
            `phone`, 
            `mail`, 
            `age`, 
            `sex`, 
            `sport`
          )
          VALUES (
            '" . $this->name_f . "',
            '" . $this->name_l . "',
            '" . $this->pseudo . "',
            '" . $this->password . "',
            '" . $this->phone . "',
            '" . $this->mail . "',
            '" . $this->age . "',
            '" . $this->sex . "',
            '" . $this->sport . "'
          ) "
      );

      $id = $this->getConn()->query("SELECT `id` FROM `users` WHERE `pseudo` = '" . $this->pseudo . "'");

      return $id->fetch_assoc()['id'];
    }

    public function update() {
      $update = $this->getConn()->query(
        " UPDATE `users`
          SET
            `name_l` = '" . $this->name_l . "',
            `name_f` = '" . $this->name_f . "',
            `pseudo` = '" . $this->pseudo . "',
            `phone` = '" . $this->phone . "',
            `mail` = '" . $this->mail . "',
            `age` = '" . $this->age . "',
            `sex` = '" . $this->sex . "',
            `sport` = '" . $this->sport . "'
          WHERE `users`.`id` = " . $this->id . "; "
      );

      return $update;
    }

    public function updatePassword() {
      $update = $this->getConn()->query(
        "UPDATE `users` SET `password` = '" . $this->password . "' WHERE `users`.`id` = " . $this->id . ";"
      );

      return $update;
    }
  }

  class Food extends Ressource {
    public $firstRow;
    public $rowsNumber;

    public $name;
    public $category;
    public $calories;
    public $lipids;
    public $sodium;
    public $potassium;
    public $carbohydrates;
    public $proteins;

    public function __construct($db){
      parent::__construct($db, "food");
    }

    public function getAllByPage() {
      $food = $this->getConn()->query(
        " SELECT `name` as img, `name`, `category`
          FROM `food` 
          ORDER BY `category`, `name`
          LIMIT " . $this->firstRow . "," . $this->rowsNumber
      );

      return $food->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllByName() {
      $food = $this->getConn()->query("SELECT * FROM `food` WHERE `name` = '" . $this->name . "'");

      return $food->fetch_all(MYSQLI_ASSOC);
    }

    public function create() {
      $food = $this->getConn()->query(
        " INSERT INTO `food`(
            `name`, 
            `category`, 
            `calories`,
            `lipids`, 
            `sodium`, 
            `potassium`, 
            `carbohydrates`, 
            `proteins`
          ) 
          VALUES (
            '" . $this->name . "',
            '" . $this->category . "',
            '" . $this->calories . "',
            '" . $this->lipids . "',
            '" . $this->sodium . "',
            '" . $this->potassium . "',
            '" . $this->carbohydrates . "',
            '" . $this->proteins . "'
          ) "
      );

      return $food;
    }
  }

  class Meal extends Ressource {
    public $firstRow;
    public $rowsNumber;

    public $user;
    public $food;
    public $quantity;
    public $date;
    
    public function __construct($db){
      parent::__construct($db, "meal");
    }

    public function getAllByUser() {
      $home = $this->getConn()->query(
        " SELECT 
            f.`category`, 
            SUM(m.`quantity`) AS quantity, 
            SUM(f.`calories`) AS allCalories,
            SUM(f.`lipids`) AS allLpids,
            SUM(f.`sodium`) AS allSodium,
            SUM(f.`potassium`) AS allPotassium,
            SUM(f.`carbohydrates`) AS allCarbohydrates,
            SUM(f.`proteins`) AS allProteins
          FROM `" . $this->getTable() . "` AS m, `food` AS f
          WHERE f.`id` = m.`food` AND m.`user` = '" . $this->user . "'
          GROUP BY f.`category` "
      );

      return $home->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllMealByUser() {
      $diary = $this->getConn()->query(
        " SELECT f.`name` as img, f.`name`, m.`date`
          FROM `" . $this->getTable() . "` as m, `food` as f
          WHERE `user` = '" . $this->user . "' AND m.`food` = f.`id`
          ORDER BY `date`
          LIMIT " . $this->firstRow . ", " . $this->rowsNumber
      );

      return $diary->fetch_all(MYSQLI_ASSOC);

      // SELECT `name`, `calories` FROM `food` WHERE `id` = " . $item['food']
    }

    public function create() {
      $meal = $this->getConn()->query(
        " INSERT INTO `" . $this->getTable() . "` (`user`, `food`, `quantity`, `date`)
          VALUES (
            '" . $this->user . "',
            '" . $this->food . "',
            '" . $this->quantity . "',
            '" . $this->date . "'
          ) "
      );

      return $meal;
    }
  }

  class Dish extends Ressource {
    public $food;
    public $composed_by;

    public function __construct($db){
      parent::__construct($db, "dish");
    }
  }
?>