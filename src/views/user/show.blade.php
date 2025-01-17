@extends('layouts.app')

@section('title', $title)

@section('content')
@if ($user)
  <h2>Datos del usuario:</h2>
  <p>Id del usuario: {{ $user->getId() }}</p>
  <h3>{{ $user->getName() }} - {{ $user->getSurname() }}</h3>
  <p>{{ $user->getEmail() }}</p>
  <p>
  <button><a href="/user/{{ $user->getId() }}/edit">Editar</a></button>
  <form action="/user/{{ $user->getId() }}" method="post" class="inline">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Eliminar">
  </form>
  </p>
  <h3>Grupos a los que pertenece:</h3>
  <ul>
    @foreach($user->groups() as $group)
      <li><a href="/group/{{ $group->getId() }}">{{ $group->getName() }}</a></li>
    @endforeach
  </ul>
@else
  <h2>Usuario no encontrado</h2>
@endif
@endsection