<?php
  include("template/header.php")
 ?>


<h2 class="mb-3">Gestion de l'utilisateur</h2>
<?php

if($user) {
  ?>
  <div class="row">
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header bgBlue text-center">
            <h5 class="card-title">Informations </h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class='list-group-item'><span class="font-weight-bold">Identifiant : </span><?php echo $user->getU_id(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Nom : </span><?php echo $user->getLastName(); ?>:</li>
              <li class='list-group-item'><span class="font-weight-bold">Prénom : </span><?php echo $user->getprenom(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Age : </span><?php echo $user->getAge(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Adresse : </span><?php echo $user->getAdresse(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Téléphone : </span><?php echo $user->getPhone(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Email : </span><?php echo $user->getMail(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Code : </span><?php echo $user->getPersonnalCode(); ?></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header bgBlue text-center">
            <h5 class="card-title">Livres empruntés </h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php
                foreach ($user->getBooks() as $key => $book) {
              ?>
                  <li class='list-group-item'><?php echo $book->getTitle() . " de " . $book->getAuthor(); ?></li>
              <?php
                }
               ?>
            </ul>
          </div>
        </div>
      </div>
  </div>
<?php
}

else{
  echo $message;
}

?>


<?php
  include("template/footer.php")
 ?>
