<?php

namespace Dsw\Tema6\Models;

use Dsw\Tema6\DAO\Userimplement;

class Group {
  private int $id;
  private string $name;

  public function __construct(int $id, string $name)
  {
    $this->id = $id;
    $this->name = $name;
  }

  public function getId() {return $this->id;}
  public function getName() {return $this->name;}
  
  public function users() {
    $userDAO = new Userimplement();
    return $userDAO->findUsersByGroupId($this->id);
  }
}