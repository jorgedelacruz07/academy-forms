@extends('layouts.admin')

@section('title', 'Confirmar contraseña | Academy Forms')

@section('content')

  <div class="" uk-grid>
    <div class="uk-width-1-2 uk-align-center">
      @if (session('status'))
        <div class="uk-alert-success" uk-alert>
          <p>
            {{ session('status') }}
          </p>
        </div>
      @endif
      <form class="uk-form-horizontal uk-margin-large" role="form" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Correo</label>
          <div class="uk-form-controls">
            <input id="email" type="email" class="uk-input" name="email" value="{{ $email or old('email') }}" required autofocus>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Contraseña</label>
          <div class="uk-form-controls">
            <input id="password" type="password" class="uk-input" name="password" required>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Confirmar contraseña</label>
          <div class="uk-form-controls">
            <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required>
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-text-center">
            <input type="submit" class="uk-button uk-button-primary" value="Recuperar contraseña">
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
