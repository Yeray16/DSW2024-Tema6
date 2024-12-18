@extends('layouts.app')

@section('title', $title)

@section('content')
@if ($user)
  <h2>Un usuario</h2>
  <p>Id del usuario: {{ $user['id'] }}</p>
  <h3>{{ $user['name'] }} - {{ $user['surname'] }}</h3>
@else
  <h2>Usuario no encontrado</h2>
@endif
@endsection