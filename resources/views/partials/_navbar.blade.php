<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
<a class="navbar-item" href="{{route('home')}}">
      <img src="{{asset('img/logo.png')}}" alt="ISTA" width="112" height="28">
    </a>

    <button class="button navbar-burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
  <div class="navbar-menu" id="navMenu">
    <div class="navbar-start">
        {{--  <a class="navbar-item  is-active" href="#">google</a>
        <a class="navbar-item" href="#">youtube</a>  --}}
    </div>
    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
         {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="navbar-dropdown is-right">
          <a class="navbar-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>