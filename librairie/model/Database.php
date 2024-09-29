<?php


class Database
{
const HOST  = "localhost";
const NAME = "librairie";
const LOGIN = "root";
const PASSWORD = "";

static public function BD() {
  $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::NAME , self::LOGIN, self::PASSWORD);
  return $db;
}

}


 ?>
