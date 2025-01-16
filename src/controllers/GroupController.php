<?php

namespace Dsw\Tema6\Controllers;

use Dsw\Tema6\Dao\GroupImplement;

class GroupController extends Controller{

  public function index() {
    $groupDAO = new GroupImplement();
    $groups = $groupDAO->findAll();
    echo $this->blade->view()->make('group.index', ['groups' => $groups])->render();

  }

  public function show($param) {
    $id = $param['id'];
    // Busco en base datos:
    $groupDAO = new GroupImplement();
    $group = $groupDAO->findById($id);
    echo $this->blade->view()->make('group.show', compact('group'))->render();
  }

  public function create() {
    echo $this->blade->view()->make('group.create')->render();
  }

  public function post() {
    $name = $_POST['name'];
    $groupDAO = new GroupImplement();
    $groupDAO->create($name);
    $this->index();
  }

  public function delete($param) {
    $id = $param['id'];
    $groupDAO = new GroupImplement();
    $groupDAO->delete($id);
    $this->index();
  }

  public function edit($param) {
    $id = $param['id'];
    $groupDAO = new GroupImplement();
    $group = $groupDAO->findById($id);
    echo $this->blade->view()->make('group.edit', compact("group"))->render();
  }

  public function put($param) {
    $id = $param['id'];
    $name = $_POST['name'];
    $groupDAO = new GroupImplement();
    $groupDAO->update($id, $name);
    $this->index();
  }
}