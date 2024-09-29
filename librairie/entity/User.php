<?php

class User {
  use Hydrator;


  protected ?int $u_id;
  protected string $prenom;
  protected string $lastName;
  protected int $age;
  protected string $Adresse;
  protected string $phone;
  protected string $mail;
  protected string $personnalCode;
  protected array $books = [];

  //Constructor
  public function __construct(array $array) {
    $this->hydrate($array);
  }

  //ID functions
  public function setU_id(int $id):User {
    $this->u_id = $id;
    return $this;
  }

  public function getU_id():int {
    return $this->u_id;
  }

  //prenom functions
  public function setprenom(string $prenom):User {
    $this->prenom = $prenom;
    return $this;
  }

  public function getprenom():string {
    return $this->prenom;
  }

  //LastName functions
  public function setLastName(string $lastName):User {
    $this->lastName = $lastName;
    return $this;
  }

  public function getLastName():string {
    return $this->lastName;
  }

  //Age functions
  public function setAge(int $age):User {
    $this->age = $age;
    return $this;
  }

  public function getAge():int {
    return $this->age;
  }

  //Adresse functions
  public function setAdresse(string $Adresse):User {
    $this->Adresse = $Adresse;
    return $this;
  }

  public function getAdresse():string {
    return $this->Adresse;
  }

  //Phone functions
  public function setPhone(string $phone):User {
    $this->phone = $phone;
    return $this;
  }

  public function getPhone():string {
    return $this->phone;
  }

  //Mail functions
  public function setMail(string $mail):User {
    $this->mail = $mail;
    return $this;
  }

  public function getMail():string {
    return $this->mail;
  }

  //PersonnalCode functions
  public function setPersonnalCode(string $personnalCode):User {
    $this->personnalCode = $personnalCode;
    return $this;
  }

  public function getPersonnalCode():string {
    return $this->personnalCode;
  }

  //Function to randomly generate a nine digits code
  public function generatePersonnalCode():User {
    $code  = "";
    for ($i=0; $i < 9; $i++) {
      $code .= mt_rand(0,9);
    }
    return $this->setPersonnalCode($code);
  }

  public function getBooks():array {
    return $this->books;
  }

  //Add a book to the books array
  public function addBook(Book $book):User {
    //avoid empty books to be pushed
    if($book->getTitle()){
      array_push($this->books, $book);
    }
    return $this;
  }

}
?>
