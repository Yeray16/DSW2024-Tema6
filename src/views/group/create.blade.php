@extends('layouts.app')

@section('title', "Create Group")

@section('content')
  <form action="/group" method="post">
    <p>
      <input type="text" name="name" placeholder="Nombre...">
    </p>
    <p>
      <input type="submit" value="crear">
    </p>
  </form>
@endsection