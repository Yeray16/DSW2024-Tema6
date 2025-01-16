@extends('layouts.app')

@section('title', 'Show-Groups')

@section('content')
@if ($group)
  <h2>Datos del grupo:</h2>
  <p>Id del grupo: {{ $group->getId() }}</p>
  <h3>Nombre: {{ $group->getName() }}</h3>
  <p>
  <button><a href="/group/{{ $group->getId() }}/edit">Editar</a></button>
  <form action="/group/{{ $group->getId() }}" method="post" class="inline">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Eliminar">
  </form>
  </p>
  <h3>Usuarios pertenecientes al grupo:</h3>
  <ul>
    @foreach($group->users() as $user)
      <li><a href="/user/{{$user->getId() }}">{{ $user->getName() }}</a></li>
    @endforeach
  </ul>
  <p>
    <a href="/group/{{ $group->getId() }}/users"><button>Modificar Usuarios</button></a>
  </p>
@else
  <h2>Grupo no encontrado</h2>
@endif
@endsection