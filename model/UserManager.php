<?php

class UserManager {
  private PDO $_db;

  public function __construct() {
     $this->_db = Database::BD();
  }

  //Function to get all the users at once
  public function getUsers():array {
    $query = $this->_db->query('SELECT * FROM user');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new User($value);
    }
    return $data;
  }

  //function to get one user based on it's ID with the books he borrowed
  public function getUserById(int $id):?User {
    $query = $this->_db->prepare('SELECT
      b.title, b.author, b.releaseDate, b.category,
      u.u_id, u.prenom, u.lastName, u.age, u.Adresse, u.phone, u.mail, u.personnalCode
      FROM user AS u LEFT JOIN book AS b ON b.user = u.personnalCode
      WHERE u.u_id = ?');
    $query->execute([$id]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    $user = new User($data[0]);
    if(isset($data[0]["title"])) {
      foreach ($data as $key => $book) {
        $book = new Book($book);
        $book->setUser($user);
        $user->addBook($book);
      }
    }
    return $user;
  }


  public function getUserSorted(string $research):array {
    $query = $this->_db->prepare('SELECT * FROM user WHERE prenom = :research OR lastName = :research OR personnalCode = :research');
    $query->execute([":research" => $research]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new User($value);
    }
    return $data;
  }

  public function getUser(string $personnalCode): ?User {
    $query = $this->_db->prepare("SELECT * FROM user WHERE personnalCode = ?");
    $query->execute([$personnalCode]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        $user = new User($data);
        return $user;
    }
    return null;
}


  public function checkCode(User $user):bool {
    $query = $this->_db->prepare('SELECT * FROM user WHERE personnalCode = ?');
    $query->execute([$user->getPersonnalCode()]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result)) {
      return false;
    }
    return true;
  }

  public function addUser(User $user):bool {
    $query = $this->_db->prepare("INSERT INTO user (prenom, lastName, age, Adresse, phone, mail, personnalCode) VALUES (:prenom, :lastName, :age, :Adresse, :phone, :mail, :personnalCode)");
    $result = $query->execute([
      ":prenom" => $user->getprenom(),
      ":lastName"=> $user->getLastName(),
      ":age"=> $user->getAge(),
      ":Adresse"=> $user->getAdresse(),
      ":phone"=> $user->getPhone(),
      ":mail"=> $user->getMail(),
      ":personnalCode"=> $user->getPersonnalCode()
    ]);
    return $result;
  }
}

 ?>
