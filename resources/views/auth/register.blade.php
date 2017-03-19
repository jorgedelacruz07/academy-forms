@extends('layouts.admin')

@section('title', 'Registrar | Academy Forms')

@section('content')

  <div class="" uk-grid>
    <div class="uk-width-1-2 uk-align-center">
      <form class="uk-form-horizontal uk-margin-large" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Nombre</label>
          <div class="uk-form-controls">
            <input id="name" type="text" class="uk-input" name="name" value="{{ old('name') }}" required autofocus>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Correo</label>
          <div class="uk-form-controls">
            <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Contraseña</label>
          <div class="uk-form-controls">
            <input id="password" type="password" class="uk-input" name="password" required>
          </div>
        </div>

        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Repetir contraseña</label>
          <div class="uk-form-controls">
            <input id="password" type="password" class="uk-input" name="password_confirmation" required>
          </div>
        </div>

        <div class="uk-margin">
          <div class="uk-text-center">
            <input type="submit" class="uk-button uk-button-primary" value="Registrar">
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
