<?php

require_once("../services/Autoloader.php");
Autoloader::autoload();

$bookManager = new BookManager();
$utilisateurManager = new UserManager();

$user = false;

if(isset($_GET["user"]) && !empty($_GET["user"])) {
  $user = $utilisateurManager->getUserById($_GET["user"]);
}
else {
  $message = "Vous n'avez pas sélectionné d'utilisateur";
}

include "../views/userView.php";
 ?>
