<?php

namespace Dsw\Tema6\DAO;

use Dsw\Tema6\Database\Database;
use Dsw\Tema6\Models\Group;
use PDO;

class Groupimplement  {
  private Database $db;
  
  public function __construct() {
    $this->db = new Database();
  }

  public function findAll() : array {
    $query = 'SELECT * FROM `groups`';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();
    $groups = [];

    while ($associate = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $group = new Group($associate['id'], $associate['name']);
      $groups[] = $group;
    }
    
    return $groups;
  }

  public function findById(int $id) : Group | null {
    $query = 'SELECT * FROM `groups` WHERE id = :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $groupRecord = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($groupRecord == null) {
      return null;
    } else {
      return new Group($groupRecord['id'], $groupRecord['name']);
    }
  }

  public function create(string $name) {
    $query = "INSERT INTO `groups` (name) VALUES (:name)";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
  }
  public function delete(int $id) {
    $query = "DELETE FROM `groups` WHERE id = :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  
  public function update(int $id, string $name) {
    $query = "UPDATE `groups` SET name = :name WHERE id = :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
  }
}