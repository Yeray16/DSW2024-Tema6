<?php

namespace Dsw\Tema6\DAO;

use Dsw\Tema6\Database\Database;
use Dsw\Tema6\Models\User;
use PDO;

class Userimplement {
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function findAll() : array {
    $query = 'SELECT * FROM users';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();
    $users = [];
    while ($userRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $user = new User($userRecord['id'], $userRecord['name'], $userRecord['surname'], $userRecord['email']);
      $users[] = $user;
    }
    return $users;
  }

  public function findById(int $id) : User | null {
    $query = 'SELECT * FROM users WHERE id = :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $userRecord = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($userRecord == null) {
      return null;
    } else {
      return new User($userRecord['id'], $userRecord['name'], $userRecord['surname'], $userRecord['email']);
    }
  }

  public function create(string $name, string $surname, string $email) {
    $query = "INSERT INTO users (name, surname, email) VALUES (:name, :surname, :email)";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
  }

  public function delete(int $id) {
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  
  public function update(int $id, string $name, string $surname, string $email) {
    $query = "UPDATE users SET name = :name, surname = :surname, email = :email WHERE id = :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
  }
}