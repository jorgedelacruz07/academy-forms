@extends('layouts.admin')

@section('title', 'Recuperar contraseña | Academy Forms')

@section('content')

  <div class="" uk-grid>
    <div class="uk-width-1-2 uk-align-center">
      @if (session('status'))
        <div class="uk-alert-danger" uk-alert>
          <p>
            {{ session('status') }}
          </p>
        </div>
      @endif
      <form class="uk-form-horizontal uk-margin-large" role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Correo</label>
          <div class="uk-form-controls">
            <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required>
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
