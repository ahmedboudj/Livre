<?php

require_once("../services/Autoloader.php");
Autoloader::autoload();

$userManager = new UserManager();

// If a form to add a user has been submitted
if(!empty($_POST["addUser"])) {
  // We create a new book object from the form
  $user = new User($_POST);
  $user->generatePersonnalCode();
  while (!$userManager->checkCode($user)) {
    $user->generatePersonnalCode();
  }
  // We store the user in the database
  $userManager->addUser($user);
}

if(isset($_POST['trie']) && !empty($_POST["userSearch"])) {
  $users = $userManager->getUserSorted($_POST["userSearch"]);
}
else{
  $users = $userManager->getUsers();
}

include "../views/usersView.php";
 ?>
