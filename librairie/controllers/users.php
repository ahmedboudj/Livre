<?php

require_once("../services/Autoloader.php");
Autoloader::autoload();

$userManager = new UserManager();

if(!empty($_POST["addUser"])) {
  $user = new User($_POST);
  $user->generatePersonnalCode();
  while (!$userManager->checkCode($user)) {
    $user->generatePersonnalCode();
  }
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
