@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
  <p>Hay {{ count($users) }} usuarios</p>
  @if (count($users))
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->getId()}}</td>
        <td>{{ $user->getName() }}</td>
        <td>{{ $user->getSurname() }}</td>
        <td>
          <a href="/user/{{ $user->getId() }}">Editar</a>
          <form action="/user/{{ $user->getId() }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Eliminar">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay usuarios</h2>
  @endif
@endsection