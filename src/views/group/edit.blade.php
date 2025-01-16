@extends('layouts.app')

@section('title', "Edit Group Id: " .$group->getId())

@section('content')
  <form action="/group/{{ $group->getId() }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <p>
      <input type="text" name="name" placeholder="Nombre..." value="{{ $group->getName() }}">
    </p>
    <p>
      <input type="submit" value="Guardar">
      <input type="reset" value="restablecer">
    </p>
  </form>
@endsection