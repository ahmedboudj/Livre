<?php
class Autoloader {
  const entities = ["Book", "User"];
  const services= ["Autoloader", "Hydrator"];
  const managers = ["BookManager", "UserManager", "Database"];

  static public function autoload() {
    spl_autoload_register(array(__CLASS__, 'loader'));
  }


  
  static public function loader($class){
    if(in_array($class, self::entities)) {
      require("../entity/" . $class . ".php");
    }
    elseif (in_array($class, self::managers)) {
      require("../model/" . $class . ".php");
    }
    else{
      if(in_array($class, self::services)) {
        require("../services/" . $class . ".php");
      }
    }
  }
}

 ?>
