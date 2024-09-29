<?php

require_once("../services/Autoloader.php");
Autoloader::autoload();

$bookManager = new BookManager();

if(!empty($_POST["addBook"])) 
{
  $book = new Book($_POST);
  $bookManager->addBook($book);
}

if(!empty($_POST["sortBook"]) && $_POST["category"] != "false") {
  $books = $bookManager->getBooksByCategorie($_POST["category"]);
}
else{
  $books = $bookManager->getBooks();
}

include "../views/indexView.php";
 ?>
