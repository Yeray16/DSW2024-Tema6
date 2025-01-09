@extends('layouts.app')

@section('title', $title)

@section('content')
@if ($user)
  <h2>Datos del usuario:</h2>
  <p>Id del usuario: {{ $user->getId() }}</p>
  <h3>{{ $user->getName() }} - {{ $user->getSurname() }}</h3>
  <p>{{ $user->getEmail() }}</p>
@else
  <h2>Usuario no encontrado</h2>
@endif
@endsection