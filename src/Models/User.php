<?php

namespace Dsw\Tema6\Models;

class User {
  private int $id;
  private string $name;
  private string $surname;
  private string $email;

  public function __construct(int $id, string $name, string $surname, string $email)
  {
    $this->id = $id;
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
    
  }

  public function getId() {return $this->id;}

  public function getName() {return $this->name;}

  public function getSurname() {return $this->surname;}
  
  public function getEmail() {return $this->email;}

}