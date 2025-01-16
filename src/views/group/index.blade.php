@extends('layouts.app')

@section('title', 'Grupos')

@section('content')
<p>Hay {{ count($groups) }} grupos</p>
  @if (count($groups))
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($groups as $group)
      <tr>
        <td>{{ $group->getId()}}</td>
        <td>{{ $group->getName() }}</td>
        <td>
          <button><a href="/group/{{ $group->getId() }}">Mostrar</a></button>
          <button><a href="/group/{{ $group->getId() }}/edit">Editar</a></button>
          <form action="/group/{{ $group->getId() }}" method="post" class="inline">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Eliminar">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <h2>No hay grupos</h2>
  @endif
@endsection