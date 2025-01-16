@extends('layouts.app')

@section('title', 'Modify-Users')

@section('content')
@if ($group)
  <h2>Group: {{ $group->getName() }}</h2>
  <form action="/group/{{ $group->getId() }}/users" method="post">
    <ul>
      @foreach ($users as $user)
        <li>
          @php
            $checked = (in_array($user->getId(), $usersBelongId )) ? 'checked' : '';
          @endphp
          <input type="checkbox" name="usersid[]" id="user_{{$user->getId()}}" value="{{$user->getId()}}" {{$checked}}> 
          <label for="user_{{$user->getId()}}">{{ $user->getName() }}</label> 
        </li>
      @endforeach
    </ul>
    @foreach ($users as $user)

    @endforeach
    <input type="submit" value="Guardar">
  </form>
@else
  <h2>Grupo no encontrado</h2>
@endif
@endsection