<!doctype html>
<html lang="en">

@include ('layouts.head')

<body>
  <header>

    @include ('layouts.nav')

  </header>

  <main role="main">

    @yield ('content')

  </main>

  @include ('layouts.scripts')

</body>

</html>
