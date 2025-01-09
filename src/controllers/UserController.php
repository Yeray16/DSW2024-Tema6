<?php

namespace Dsw\Tema6\Controllers;

use Dsw\Tema6\DAO\Userimplement;

class UserController extends Controller {
  
  public function index() {
    $userDAO = new Userimplement();
    $users = $userDAO->findAll();
    echo $this->blade->view()->make('user.index', compact('users'))->render();
  }

  public function show($params) {
  $id = $params['id'];
  //Busco en base datos:
  $userDAO = new UserImplement();
  $user = $userDAO->findById($id);
  $data = [
    'user' => $user,
    'title' => 'Usuario'
  ];
  echo $this->blade->view()->make('user.show', $data)->render();
  }
}