<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App - @yield('title')</title>
</head>
<body>
  <nav>
    <ul>
      @include('layouts.menu')
    </ul>
  </nav>
  <h1>@yield('title')</h1>
  <main>
    @section('content')
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, nihil placeat fugiat reprehenderit ratione nostrum tenetur sapiente tempora necessitatibus consectetur, vitae officia vel sit maxime, recusandae praesentium doloremque corrupti voluptatum.</p>
    @show
  </main>
</body>
</html>