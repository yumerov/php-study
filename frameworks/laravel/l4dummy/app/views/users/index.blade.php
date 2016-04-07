<html>
  <head>
    <title>All users</title>
  </head>
  <body>
    <h1>All users</h1>

    <ul>
    @if (!$users->isEmpty())
      @foreach ( $users as $user )
        <li>{{ link_to("/blade/users/{$user->id}", $user->username) }}</li>
      @endforeach
    @else
      <strong>no users</strong>
    @endif
    </ul>
  </body>
</html>
