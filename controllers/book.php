<?php

require_once("../services/Autoloader.php");
Autoloader::autoload();

$bookManager = new BookManager();
$userManager = new UserManager();

//No default book selected
$book = false;

//If there is a book id in the url
if(isset($_GET["book"]) && !empty($_GET["book"])) {
  // Get the info on the book and an eventual user
  $book = $bookManager->getBookAndUser($_GET["book"]);
}
//Otherwise we make an error message
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}

if(isset($_POST["deleteBook"])) {
  if($bookManager->deleteBook($_POST["bookId"])){
    header("Location: index.php");
    exit();
  }
}

if(!empty($_POST["borrowBook"])) {
  $user = $userManager->getUser($_POST["personnalCode"]);
  if($user) {
    $book->setUser($user);
    $bookManager->updateBookStatus($book, $book->getUser()->getPersonnalCode());
  }
}

if(!empty($_POST["returnBook"])) {
  $book->unsetUser();
  $bookManager->updateBookStatus($book, $book->getUser());
}


include "../views/bookView.php";
 ?>
