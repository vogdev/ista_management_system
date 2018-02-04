<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <link rel="shortcut icon" href="{{{ asset('img/ofppt.ico') }}}">
    <!-- Styles -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@auth('admin')
    @include('partials.admin._navbar')
    @include('partials.admin._sidebar')
        <section class="section">
            <div id="app" class="main">
                @yield('content')
            </div>
        </section>
    @else
    <section class="section">
        <div id="app">
            @yield('content')
        </div>
    </section>
@endauth

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        $(".dropdown").click(function() {
          $(this).toggleClass("is-active");
        });
    });
    </script>
        <script type="text/javascript">
        // document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        // document.getElementById('darkBg').classList.toggle('is-active');
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
}
    </script>
</body>
</html>
