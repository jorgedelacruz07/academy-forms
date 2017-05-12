@extends('layouts.admin')

@section('title', 'Login | Academy Forms')

@section('content')

  <div class="" uk-grid>
    <div class="uk-width-1-2 uk-align-center">
      <form class="uk-form-horizontal uk-margin-large" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Correo</label>
          <div class="uk-form-controls">
            <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required autofocus>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Contraseña</label>
          <div class="uk-form-controls">
            <input id="password" type="password" class="uk-input" name="password" required>
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-form-controls">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-primary">
                Login
            </button>

            <a class="uk-button uk-button-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection
