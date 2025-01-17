<?php

namespace Dsw\Tema6\Models;

use Dsw\Tema6\DAO\Groupimplement;

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

  public function groups() {
    $groupDAO = new Groupimplement();
    return $groupDAO->findGroupsByUserId($this->id);
  }

  // public function showGroups () {
  //   $groups = $this->groups();
  //   $names = array_map(
  //     fn($group) => $group -> getName(), 
  //     $groups
  //   );
  //   return implode(',' ,$names);
  // }
}