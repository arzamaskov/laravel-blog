<!doctype html>
<html lang="en">

@include ('layouts.head')

<body>
  <div id="loader" class="loader d-none"></div>
  <header>

    @include ('layouts.nav')

  </header>

  <main role="main">

    @yield ('content')

  </main>

  @include ('layouts.footer')

  @include ('layouts.scripts')

</body>

</html>
