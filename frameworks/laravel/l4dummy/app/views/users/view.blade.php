<html>
  <head>
    <title>{{ $user->username }}</title>
  </head>
  <body>
    <h1>{{ $user->username }}</h1>

    <ul>
      <li><strong>id:</strong> {{ $user->id }}</li>
      <li><strong>username:</strong> {{ $user->username }}</li>
      <li><strong>password:</strong> {{ $user->password }}</li>
    </ul>
  </body>
</html>
