<?php

namespace Dsw\Tema6\Controllers;

use Dsw\Tema6\Models\User;

class UserController extends Controller {
  
  public function index() {
    $users = User::all();
    echo $this->blade->view()->make('user.index', compact('users'))->render();
  }

  public function show($params) {
    $id = $params['id'];
    //Busco en base datos:
    $user = User::get($id);
    $data = [
       'user' => $user,
       'title' => 'Usuario'
    ];
    echo $this->blade->view()->make('user.show', $data)->render();
  }
}