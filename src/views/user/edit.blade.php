@extends('layouts.app')

@section('title', "Edit User Id: " .$user->getId())

@section('content')
  <form action="/user/{{ $user->getId() }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <p>
      <input type="text" name="name" placeholder="Nombre..." value="{{ $user->getName() }}">
    </p>
    <p>
      <input type="text" name="surname" placeholder="Apellidos..." value="{{ $user->getSurname() }}">
    </p>
    <p>
      <input type="email" name="email" placeholder="Correo electrónico..." value="{{ $user->getEmail() }}">
    </p>
    <p>
      <input type="submit" value="Guardar">
      <input type="reset" value="restablecer">
    </p>
  </form>
@endsection