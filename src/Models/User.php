<?php

namespace Dsw\Tema6\Models;

class User {
  static private $users = [
    ['id' => '1', 'name' => 'Pepe', 'surname' => 'García'],
    ['id' => '2', 'name' => 'Ana', 'surname' => 'Marín'],
    ['id' => '3', 'name' => 'Julia', 'surname' => 'Leiva'],
    ['id' => '4', 'name' => 'Roberto', 'surname' => 'Durán']
  ];
  public static function all() {
    return self::$users;
  }

  public static function get($id) {
    return array_first(self::$users, function($user) use($id) {
      return $user['id'] == $id;
    });
  }
}