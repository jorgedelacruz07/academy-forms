<nav class="uk-navbar-container" uk-navbar>
  <div class="uk-navbar-left">
    <ul class="uk-navbar-nav">
      <li class="uk-active"><a href="/admin">Inicio</a></li>
      <li><a href="/admin/form">Formularios</a></li>
      <li><a href="/admin/area">Áreas</a></li>
    </ul>
  </div>
  <div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
      @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <ul class="uk-navbar-nav">
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      @endif
    </ul>
  </div>
</nav>
